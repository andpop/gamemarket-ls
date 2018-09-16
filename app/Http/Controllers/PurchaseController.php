<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function buyForm($id) {
        $product = Product::find($id);
        return view('pages.buy', ['product' => $product]);
    }
}
