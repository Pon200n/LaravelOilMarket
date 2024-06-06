<?php

namespace App\Http\Controllers;

use App\Models\BasketProduct;
use App\Http\Requests\BasketProductRequest\StoreBasketProductRequest;
use App\Http\Requests\BasketProductRequest\UpdateBasketProductRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketProductController extends Controller
{

    public function index()
    {
        $auth_user_ID = Auth::id();
        $user = User::with([
            'basket.basket_products.products.category',
            'basket.basket_products.products.brand',
            'basket.basket_products.products.info',
            'basket.basket_products.products.image'
        ])->findOrFail($auth_user_ID);
        return $user;
    }


    public function store(StoreBasketProductRequest $request)
    {
        $data = $request->validated();
        $auth_user = Auth::user();
        $auth_user_ID = Auth::id();
        $user = User::findOrFail($auth_user_ID);
        $basketID = $user->basket->id;
        $data["basket_id"] = $basketID;
        BasketProduct::firstOrCreate($data);
        $user = User::with([
            'basket.basket_products.products.category',
            'basket.basket_products.products.brand',
            'basket.basket_products.products.info',
            'basket.basket_products.products.image'
        ])->findOrFail($auth_user_ID);
        return $user;
    }


    public function show(BasketProduct $basketProduct)
    {
        //
    }


    public function update(Request $request, string $product_id)
    {
        $new_product_count = $request->input('product_count');

        $basket_product = BasketProduct::findOrFail($product_id);
        $basket_product->update([
            'product_count' => $new_product_count,
        ]);

        $auth_user_ID = Auth::id();
        $user = User::with([
            'basket.basket_products.products.category',
            'basket.basket_products.products.brand',
            'basket.basket_products.products.info',
            'basket.basket_products.products.image'
        ])->findOrFail($auth_user_ID);

        return $user;
    }


    public function destroy(string $id)
    {

        BasketProduct::destroy($id);

        $auth_user_ID = Auth::id();
        $user = User::with([
            'basket.basket_products.products.category',
            'basket.basket_products.products.brand',
            'basket.basket_products.products.info',
            'basket.basket_products.products.image'
        ])->findOrFail($auth_user_ID);

        return $user;
    }
}
