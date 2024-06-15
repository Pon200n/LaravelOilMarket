<?php

namespace App\Http\Controllers;

use App\Models\FavoriteProduct;
use App\Http\Requests\StoreFavoriteProductRequest;
use App\Http\Requests\UpdateFavoriteProductRequest;

class FavoriteProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFavoriteProductRequest $request)
    {
        //
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
    public function destroy(FavoriteProduct $favoriteProduct)
    {
        //
    }
}
