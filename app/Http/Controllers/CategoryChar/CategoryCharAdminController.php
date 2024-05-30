<?php

namespace App\Http\Controllers\CategoryChar;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCharRequest\CategoryCharCreateRequest;
use App\Http\Requests\CategoryCharRequest\CategoryCharUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryCharResource;
use App\Models\CategoryChar;

class CategoryCharAdminController extends Controller
{
    public function store(CategoryCharCreateRequest $request)
    {
        CategoryChar::firstOrCreate($request->validated());
        $chars = CategoryChar::all();
        return CategoryCharResource::collection($chars);
    }

    public function update(CategoryCharUpdateRequest $request, CategoryChar $categoryChar, string $id)
    {
        $categoryChar = CategoryChar::findOrFail($id);
        $data = $request->validated();
        $categoryChar->update($data);
        return CategoryCharResource::collection(CategoryChar::all());
    }
    public function destroy(CategoryChar $categoryChar, string $id)
    {
        $categoryChar = CategoryChar::findOrFail($id);
        $categoryChar->delete();
        return CategoryCharResource::collection(CategoryChar::all());
    }
}
