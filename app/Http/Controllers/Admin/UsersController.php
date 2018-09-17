<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);

    }

}
