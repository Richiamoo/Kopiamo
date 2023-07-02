<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('order.checkout');
    }

    public function buynow($currMenu)
    {
        $menus = Menu::where('id', $currMenu)->get();
        $orders = Order::with('user')->get();
        return view('order.checkout')->with([
            'menus' => $menus,
            'orders' => $orders,
        ]);
    }

    public function pagetocheckout(Request $request)
    {
        //Source of page
        $source = $request->input('from');
        if ($source === 'cartpage') {
            // return $this->index()->with('fromCart', 'Items from cart');
            return redirect()->route('checkout.index')->with('fromCart', 'Items from cart');
        }

            // return redirect()->route('menu.index')->with('fromBuyNow', 'Items from menu');
        echo $source;

    
    }
}
