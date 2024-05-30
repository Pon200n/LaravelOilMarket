<?php

namespace App\Http\Controllers\CategoryCharValue;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCharValueResource;
use App\Models\CategoryCharValue;
use Illuminate\Http\Request;

class CategoryCharValuePublicController extends Controller
{
    public function index()
    {
        // return CategoryCharValue::all();
        return CategoryCharValueResource::collection(CategoryCharValue::all());
    }
    public function show(CategoryCharValue $categoryCharValue, string $id)
    {
        return new CategoryCharValueResource(CategoryCharValue::findOrFail($id));
    }
}
