<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest\CategoryCreateRequest;
use App\Http\Requests\CategoryRequest\CategoryUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use App\Http\Middleware\AdminPanelMiddleware;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin_panel')->except('index','show');
    }    

    public function index()
    {
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }


    // public function store(CategoryCreateRequest $request)
    // {   
    //     // dd($request->input());
    //     // $category_name = $request->input();
    //     // $category_name = $request->input('category_name');
    //     // $createCategory = Category::firstOrCreate($request->validate(['category_name' => 'required|max:255']));
            //     $data = $request->validated();
    //     $createCategory = Category::firstOrCreate($data);
    //     // $createCategory = Category::create($request->validate(['category_name' => 'required|unique:categories|max:255']));
    //     // $createCategory = Category::firstOrCreate(['category_name' => $category_name]);
    //     // $createCategory = Category::firstOrCreate( $category_name);
    //     $categories = Category::all();
    //     return CategoryResource::collection($categories);
    // }

    public function store(CategoryCreateRequest $request)
    {   
        $data = $request->validated();
        $createCategory = Category::firstOrCreate($data);
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    public function show(Category $category,string $id)
    {
        //
        $category = Category::findOrFail($id);
        return new CategoryResource($category);
    }


    public function update(CategoryUpdateRequest $request, Category $category,string $id)
    {

        $updateCategory = Category::findOrFail($id);
        $updateCategory -> update($request->validated());
        return CategoryResource::collection(Category::all());
    }


    public function destroy(Category $category,string $id)
    {

        Category::destroy($id);
        return CategoryResource::collection(Category::all());

    }
}
