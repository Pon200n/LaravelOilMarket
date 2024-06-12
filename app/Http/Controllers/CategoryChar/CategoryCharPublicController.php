<?php

namespace App\Http\Controllers\CategoryChar;

use App\Http\Resources\CategoryCharResource;
use App\Models\CategoryChar;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryCharPublicController extends Controller
{
    public function index()
    {
        $chars = CategoryChar::with('categoryCharValues')->get();
        return CategoryCharResource::collection($chars);
    }
    public function show(CategoryChar $categoryChar, string $id)
    {
        $categoryChar = CategoryChar::findOrFail($id);
        return new CategoryCharResource($categoryChar);
    }
}
