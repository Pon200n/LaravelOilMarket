<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductPublicController extends Controller
{

    public function index()
    {
        $products = Product::with('category')->with('brand')->with('values.characteristic')->with('info')->get();
        return $products;
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