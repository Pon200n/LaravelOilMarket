<?php

namespace App\Http\Controllers\FavoriteProduct;

use App\Http\Controllers\Controller;
use App\Models\FavoriteProduct;
use App\Http\Requests\FavoriteProduct\StoreFavoriteProductRequest;
use App\Http\Requests\UpdateFavoriteProductRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $auth_user_ID = Auth::id();
        $user = User::with([
            'favorite.favorite_products.products.category',
            'favorite.favorite_products.products.brand',
            'favorite.favorite_products.products.info',
            'favorite.favorite_products.products.image'
        ])->findOrFail($auth_user_ID);
        return $user;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFavoriteProductRequest $request)
    {
        $data = $request->validated();
        $user = Auth::user();
        $favorite_id = $user->favorite->id;
        $data["favorite_id"] = $favorite_id;
        FavoriteProduct::firstOrCreate($data);

        $auth_user_ID = Auth::id();
        $user = User::with([
            'favorite.favorite_products.products.category',
            'favorite.favorite_products.products.brand',
            'favorite.favorite_products.products.info',
            'favorite.favorite_products.products.image'
        ])->findOrFail($auth_user_ID);
        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(FavoriteProduct $favoriteProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFavoriteProductRequest $request, FavoriteProduct $favoriteProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    // public function destroy(FavoriteProduct $favoriteProduct)
    {
        FavoriteProduct::destroy($id);
        $auth_user_ID = Auth::id();
        $user = User::with([
            'favorite.favorite_products.products.category',
            'favorite.favorite_products.products.brand',
            'favorite.favorite_products.products.info',
            'favorite.favorite_products.products.image'
        ])->findOrFail($auth_user_ID);
        return $user;
    }
}
