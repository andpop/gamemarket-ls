<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name'	=>	'required|unique:users',
            'email'	=>	'required|email|unique:users',
            'password'	=>	'required'
        ]);

        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));
        if ($request->get('is_admin')) {
            $user->makeAdmin();
        }

        return redirect('/login');
    }

    public function loginForm()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'	=>	'required|email',
            'password'	=>	'required'
        ]);

        if (Auth::attempt([
            'email'	=>	$request->get('email'),
            'password'	=>	$request->get('password')
        ])) {
            return redirect('/');
        }

        return redirect()->back()->with('status', 'Неправильный логин или пароль');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
