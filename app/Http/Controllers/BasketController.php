<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Http\Requests\StoreBasketRequest;
use App\Http\Requests\UpdateBasketRequest;

class BasketController extends Controller
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
    public function store(StoreBasketRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Basket $basket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBasketRequest $request, Basket $basket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Basket $basket)
    {
        //
    }
}
