<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest\CategoryCreateRequest;
use App\Http\Requests\CategoryRequest\CategoryUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use App\Http\Middleware\AdminPanelMiddleware;

class CategoryPublicController extends Controller

{


    public function index()
    {

        $categories = Category::all();
        return CategoryResource::collection($categories);
    }


    public function show(Category $category, string $id)
    {

        //* $cat = Category::findOrFail($id);
        //* $c = Category::find($id)->char;
        //* $c2 = Category::with('char')->find(1);
        //* return $c2;
        //* return $cat->char;
        $category = Category::findOrFail($id);
        return new CategoryResource($category);
    }
}
