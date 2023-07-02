<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;

class DashboardController extends Controller
{
    public function index()
    {
        Cart::restore(auth()->id());
        Cart::setGlobalTax(0);
        return view('dashboard');
    }
}
