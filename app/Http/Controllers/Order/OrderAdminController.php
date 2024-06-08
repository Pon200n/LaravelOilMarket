<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $orders = Order::with('user')->with('status')->with([
            'order_products.product.category',
            'order_products.product.brand',
            'order_products.product.info',
            'order_products.product.image',
        ])->get();



        $orderGridData = $orders->map(function ($order) {
            $formattedDate = Carbon::parse($order->created_at)->format('Y-m-d H:i:s');

            return [
                'id' => $order->id,
                'created_at' => $formattedDate,
                'delivery_place' => $order->delivery_place,
                'user_name' => $order->user->name,
                'user_second_name' => $order->user->second_name,
                'user_patronymic' => $order->user->patronymic,
                'user_phone' => $order->user->phone,
                'user_email' => $order->user->email,
                'order_status' => $order->status->status_name,
                'order_products' => $order->order_products,

            ];
        });

        return response()->json($orderGridData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orders = Order::with('user')->with('status')->with([
            'order_products.product.category',
            'order_products.product.brand',
            'order_products.product.info',
            'order_products.product.image',
        ])->findOrFail($id);
        return response()->json($orders);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $status_id = $request->input('status_id');

        Order::findOrFail($id)->update(['status_id' => $status_id]);

        $order = Order::with('user')->with('status')->with([
            'order_products.product.category',
            'order_products.product.brand',
            'order_products.product.info',
            'order_products.product.image',
        ])->findOrFail($id);

        // $order->update(['status_id' => $status_id]);

        return response()->json($order);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
