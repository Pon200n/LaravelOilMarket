<?php

namespace App\Http\Controllers;

use App\Models\ProductInfo;
use App\Http\Requests\StoreProductInfoRequest;
use App\Http\Requests\UpdateProductInfoRequest;

class ProductInfoController extends Controller
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
    public function store(StoreProductInfoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductInfo $productInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductInfoRequest $request, ProductInfo $productInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductInfo $productInfo)
    {
        //
    }
}
