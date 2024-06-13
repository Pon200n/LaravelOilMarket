<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductPublicController extends Controller
{

    // public function index(Request $request)
    // {
    //     $query_perPage = $request->get('perPage');
    //     $category_id = $request->get('category_id');
    //     $brand_id = $request->get('brand_id');
    //     $reqvest_values = $request->get('values');
    //     $values = explode(',', $reqvest_values);

    //     // $products = Product::with('category', 'brand', 'image', 'values.characteristic', 'info')
    //     //     ->when($category_id, function ($query) use ($category_id) {
    //     //         return $query->where('category_id', $category_id);
    //     //     })
    //     //     ->when($brand_id, function ($query) use ($brand_id) {
    //     //         return $query->where('brand_id', $brand_id);
    //     //     })
    //     //     ->whereHas('values', function ($query) use ($values) {
    //     //         $query->when(!empty($reqvest_values), function ($q) use ($values) {
    //     //             $q->whereIn('value_id', $values);
    //     //         });
    //     //     })
    //     //     ->paginate($query_perPage);
    //     // //* return new ProductCollection($products);
    //     // return ProductResource::collection($products);

    //     $products = Product::with('category', 'brand', 'image', 'values.characteristic', 'info')
    //         ->whereHas('values', function ($query) use ($values) {
    //             $query->when(!empty($reqvest_values), function ($q) use ($values) {
    //                 $q->whereIn('value_id', $values);
    //             });
    //         })
    //         // Добавляем дополнительное условие для товаров без значений
    //         ->when(!empty($reqvest_values), function ($query) {
    //             return $query;
    //         }, function ($query) {
    //             return $query->has('values', '=', 0);
    //         })
    //         ->when($category_id, function ($query) use ($category_id) {
    //             return $query->where('category_id', $category_id);
    //         })
    //         ->when($brand_id, function ($query) use ($brand_id) {
    //             return $query->where('brand_id', $brand_id);
    //         })
    //         ->paginate($query_perPage);

    //     return ProductResource::collection($products);
    // }


    // public function index(Request $request)
    // {
    //     $query_perPage = $request->get('perPage');
    //     $category_id = $request->get('category_id');
    //     $brand_id = $request->get('brand_id');
    //     $reqvest_values = $request->get('values');

    //     $values = $reqvest_values ? explode(',', $reqvest_values) : [];

    //     $products = Product::with('category', 'brand', 'image', 'values.characteristic', 'info')
    //         ->where(function ($query) use ($values, $reqvest_values) {
    //             $query->when(!empty($values), function ($q) use ($values) {
    //                 $q->whereHas('values', function ($subQuery) use ($values) {
    //                     $subQuery->whereIn('value_id', $values);
    //                 });
    //             });

    //             $query->when(empty($reqvest_values), function ($q) {
    //                 $q->doesntHave('values');
    //             });
    //         })
    //         ->when($category_id, function ($query) use ($category_id) {
    //             return $query->where('category_id', $category_id);
    //         })
    //         ->when($brand_id, function ($query) use ($brand_id) {
    //             return $query->where('brand_id', $brand_id);
    //         })
    //         ->paginate($query_perPage);
    //     //* return new ProductCollection($products);
    //     return ProductResource::collection($products);
    // }
    public function index(Request $request)
    {
        $query_perPage = $request->get('perPage');
        $category_id = $request->get('category_id');
        $brand_id = $request->get('brand_id');
        $reqvest_values = $request->get('values');
        $values = $reqvest_values ? explode(',', $reqvest_values) : [];
        $sortByPrice = $request->get('sortByPrice');

        $products = Product::with('category', 'brand', 'image', 'values.characteristic', 'info')
            ->where(function ($query) use ($values) {
                if (!empty($values)) {
                    $query->whereHas('values', function ($subQuery) use ($values) {
                        $subQuery->whereIn('value_id', $values);
                    });
                }
            })
            ->when($category_id, function ($query) use ($category_id) {
                return $query->where('category_id', $category_id);
            })
            ->when($brand_id, function ($query) use ($brand_id) {
                return $query->where('brand_id', $brand_id);
            })
            ->orderBy('price',  $sortByPrice)
            ->paginate($query_perPage);

        return ProductResource::collection($products);
    }

    public function show(string $id)
    {
        $product = Product::with('category')->with('brand')->with('values.characteristic')->with('info')->with('image')->findOrFail($id);
        return $product;
    }
}
