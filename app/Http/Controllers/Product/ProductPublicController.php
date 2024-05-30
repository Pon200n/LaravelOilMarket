<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductPublicController extends Controller
{

    public function index()
    {
        // $products = Product::with('category')->with('brand')->with('values.characteristic')->with('info')->get();
        $products = Product::with('category', 'brand', 'values.characteristic', 'info')->paginate(2);
        return ProductResource::collection($products);
    }

    public function show(string $id)
    {
        $product = Product::with('category')->with('brand')->with('values.characteristic')->with('info')->findOrFail($id);
        return $product;
    }
}

        // $values = $product->values;
        // $char_id = $product->values[0]->char_id;
        // dd($char_id);