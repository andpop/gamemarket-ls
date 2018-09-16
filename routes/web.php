<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('/product/{id}', 'HomeController@show')->name('product.show');
Route::get('/category/{id}', 'HomeController@category')->name('category.show');

Route::group(['middleware'	=>	'auth'], function(){
    Route::get('/logout', 'AuthController@logout');
    Route::get('/buy/{id}', 'PurchaseController@buyForm')->name('buy');
});

Route::group(['middleware'	=>	'guest'], function(){
    Route::get('/register','AuthController@registerForm');
    Route::post('/register', 'AuthController@register');
    Route::get('/login','AuthController@loginForm')->name('login');
    Route::post('/login', 'AuthController@login');
});


//Auth::routes();

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'],
    function () {
    Route::get('/', 'DashboardController@index');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/products', 'ProductsController');

});
