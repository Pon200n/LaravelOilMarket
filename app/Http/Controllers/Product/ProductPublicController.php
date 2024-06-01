<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductPublicController extends Controller
{

    // public function index()
    public function index(Request $request)
    {
        $query_perPage = $request->get('perPage');
        $products = Product::with('category', 'brand', 'image', 'values.characteristic', 'info')->paginate($query_perPage);
        //* return new ProductCollection($products);
        return ProductResource::collection($products);
    }

    public function show(string $id)
    {
        $product = Product::with('category')->with('brand')->with('values.characteristic')->with('info')->with('image')->findOrFail($id);
        return $product;
    }
}

        // $values = $product->values;
        // $char_id = $product->values[0]->char_id;
        // dd($char_id);