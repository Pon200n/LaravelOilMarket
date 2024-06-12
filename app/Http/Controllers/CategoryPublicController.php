<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest\CategoryCreateRequest;
use App\Http\Requests\CategoryRequest\CategoryUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use App\Http\Middleware\AdminPanelMiddleware;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;

class CategoryPublicController extends Controller

{


    public function index()
    {
        // $categoriesWithBrands = DB::table('categories')
        //     ->select('categories.id', 'categories.category_name')
        //     ->leftJoin('products', 'products.category_id', '=', 'categories.id')
        //     ->selectRaw('categories.*, group_concat(distinct products.brand_id) as brand_ids')
        //     ->groupBy('categories.id')
        //     ->get();

        $categoriesWithBrands = Category::with('char.categoryCharValues')->with(['product' => function ($query) {
            $query->select('category_id', 'brand_id')
                // ->with('brand')
                ->distinct('brand_id');
        }])->get();

        // return $categoriesWithBrands;
        return CategoryResource::collection($categoriesWithBrands);
    }

    public function show(Category $category, string $id)
    {
        $category = Category::findOrFail($id);
        return new CategoryResource($category);
    }
}
