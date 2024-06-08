<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\OrderProduct;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth_user_ID = Auth::id();

        // $user = User::with([
        //     'orders.order_products.product.category',
        //     'orders.order_products.product.brand',
        //     'orders.order_products.product.info',
        //     'orders.order_products.product.image',
        // ])->findOrFail($auth_user_ID);

        $orders = Order::with('status')->with([
            'order_products.product.category',
            'order_products.product.brand',
            'order_products.product.info',
            'order_products.product.image',
        ])->where('user_id', $auth_user_ID)->get();
        return $orders;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $auth_user_ID = Auth::id();
        $user = User::find($auth_user_ID);
        $basket_products = $user->basket->basket_products;

        $data_order = $request->validated();
        $data_order["user_id"] = $auth_user_ID;
        $data_order["status_id"] = 1;

        $order =  Order::create($data_order);
        $order_id = $order->id;

        foreach ($basket_products as $basket_product) {
            OrderProduct::create([
                'user_id' => $auth_user_ID,
                'order_id' => $order_id,
                'product_id' => $basket_product->product_id,
                'count' => $basket_product->product_count,
                'fixed_price' => $basket_product->fixed_price,
            ]);
        }

        $orders = Order::with('status')->with([
            'order_products.product.category',
            'order_products.product.brand',
            'order_products.product.info',
            'order_products.product.image',
        ])->where('user_id', $auth_user_ID)->get();
        return $orders;
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
