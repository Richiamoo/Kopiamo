<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->get();
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $order = new Order();
    //     $order->user_id = auth()->id();
    //     $order->fullname = $request->input('fullName');
    //     $order->email = $request->input('Email');
    //     $order->phone = $request->input('phoneNumber');
    //     $order->notes = $request->input('note');
    //     $order->orderStatus = 'Pending';
    //     $order->totalPrice = $request->input('total');
    //     $order->paymentType = 'Cash on pick up';
    //     $order->paymentStatus = '0';
    //     $order->save();

    //     if($request->input('ordertype') == 'cart'){
    //         foreach (Cart::content() as $item){
    //             OrderItem::create([
    //                 'order_id'  =>  $order->id,
    //                 'prod_id'   =>  $item->id,
    //                 'price'     =>  $item->priceTotal(),
    //                 'qty'       =>  $item->qty,
    //             ]);
    //         }
    //     }else{
    //         OrderItem::create([
    //             'order_id'  =>  $order->id,
    //             'prod_id'   =>  $request->input('prodID'),
    //             'price'     =>  $request->input('itemprice'),
    //             'qty'       =>  $request->input('qty'),
    //         ]);
    //     }

    //     return redirect()->route('order.index')->with('success', 'Order placed successfully!');
    // }
    public function store(Request $request)
    {
        $order = new Order();
        $order->user_id = auth()->id();

        $user = auth()->user(); // Get the authenticated user

        // Set the user data using the Order model's setUserData method
        $order->setUserData($user);

        $order->notes = $request->input('note');
        $order->orderStatus = 'Pending';
        $order->totalPrice = $request->input('total');
        $order->paymentType = 'Cash on pick up';
        $order->paymentStatus = '0';
        $order->save();

        if ($request->input('ordertype') === 'cart') {
            foreach (Cart::content() as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'prod_id' => $item->id,
                    'price' => $item->priceTotal(),
                    'qty' => $item->qty,
                ]);
            }
        } else {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $request->input('prodID'),
                'price' => $request->input('itemprice'),
                'qty' => $request->input('qty'),
            ]);
        }

        return redirect()->route('order.index')->with('success', 'Order placed successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        
    }

    public function show($id, Request $request)
    {
        Order::where('id', $id)->update([
            'orderStatus' => $request->input('status'),
        ]);
        return redirect()->route('order.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        
    }

    public function details($orderid)
    {
        $orders = Order::where('id', $orderid)->get();
        $orderitems = OrderItem::where('order_id', $orderid)->get();
        return view('order.details')->with([
            'orders' => $orders,
            'orderitems' => $orderitems,
        ]);
    }

    public function storepaypal(Request $request)
    {
        $order = new Order();
        $order->user_id = auth()->id();
        $order->fullname = $request['fullName'];
        $order->email = $request['Email'];
        $order->phone = $request['phoneNumber'];
        $order->notes = $request['note'];
        $order->orderStatus = 'Pending';
        $order->totalPrice = $request['total'];
        $order->paymentType = 'Paid with PayPal';
        $order->paymentStatus = '1';
        $order->save();

        if ($request->input('ordertype') === 'cart') {
            foreach (Cart::content() as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'prod_id' => $item->id,
                    'price' => $item->priceTotal(),
                    'qty' => $item->qty,
                ]);
            }
        } else {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $request['prodID'],
                'price' => $request['itemprice'],
                'qty' => $request['qty'],
            ]);
        }

        return response()->json(['status' => 'Order placed successfully!']);
    }
}
