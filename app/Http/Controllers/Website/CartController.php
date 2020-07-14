<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   $items = [];
        if($request->session()->has(Product::CART_SESSION)){
            $items = array_reverse($request->session()->get(Product::CART_SESSION));
        }
        return view('cart', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $request->session()->forget(Product::CART_SESSION);
        return Redirect::to('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $total = 0;
        $address = $request->input('address');
        $user = Sentinel::check();
        $order_detail = new OrderDetail();
        $order_detail->customer_id = $user->customer->id;
        $order_detail->delivery_address = $address;
        $order_detail->total_price = $total;
        $order_detail->save();

        $items = array_reverse($request->session()->get(Product::CART_SESSION));

        foreach ($items as $item) {
            $total += $item['quantity'] * $item['product']->price;
            $order = new Order();
            $order->order_detail_id = $order_detail->id;
            $order->product_id = $item['product']->id;
            $order->price = $item['product']->price;
            $order->quantity = $item['quantity'];
            $order->save();
        }
        $order_detail->total_price = $total;
        $order_detail->save();
        $request->session()->forget(Product::CART_SESSION);
        return Redirect::to('/')->with(User::SUCCESS_MESSAGE, "You have successfully completed your order.");

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $items = array_reverse($request->session()->get(Product::CART_SESSION));
        $total = 0;
        foreach ($items as $item) {
            $total += $item['quantity'] * $item['product']->price;
        }
        return view('checkout', compact('items', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        $quantity = $request->input('quantity');
        $temp_order = [
            'quantity' => $quantity,
            'product' => $product,
        ];
        $request->session()->push(Product::CART_SESSION, $temp_order);
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
