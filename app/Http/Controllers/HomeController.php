<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        // Первыми выводим последние товары
        $products = Product::orderBy('id', 'desc')->paginate(6);
        $contentTitle = 'Последние товары';
        return view('pages.index', [
            'products' => $products,
            'contentTitle' => $contentTitle
        ]);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return view('errors.404');
        }

        return view('pages.show', ['product' => $product]);
    }

    public function category($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return view('errors.404');
        }

        $contentTitle = "Товары из категории: {$category->name}";
        $categories = Category::all();
        $products = $category->products()->paginate(6);
        return view('pages.index', [
            'products' => $products,
            'contentTitle' => $contentTitle,
            'categories' => $categories]);
    }

    public function example()
    {
        return view('pages.login');
    }
}
