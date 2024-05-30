<?php

namespace App\Http\Controllers\CategoryCharValue;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCharValueRequest\StoreCategoryCharValueRequest;
use App\Http\Requests\CategoryCharValueRequest\UpdateCategoryCharValueRequest;
use App\Http\Resources\CategoryCharValueResource;
use Illuminate\Http\Request;
use App\Models\CategoryCharValue;


class CategoryCharValueAdminController extends Controller
{
    // public function store(Request $request)
    // {
    //     dd('sd');
    //     dd($request->input());
    //     $data = $request->validated();
    //     CategoryCharValue::create($data);
    // return CategoryCharValueResource::collection(CategoryCharValue::all());
    // }
    public function store(StoreCategoryCharValueRequest $request)
    {
        $data = $request->validated();
        CategoryCharValue::firstOrCreate($data);
        return CategoryCharValueResource::collection(CategoryCharValue::all());
    }
    public function update(UpdateCategoryCharValueRequest $request, CategoryCharValue $categoryCharValue, string $id)
    {
        $data = $request->validated();
        $categoryCharValue = CategoryCharValue::findOrFail($id);
        $categoryCharValue->update($data);
        return CategoryCharValueResource::collection(CategoryCharValue::all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryCharValue $categoryCharValue, string $id)
    {
        $categoryCharValue = CategoryCharValue::findOrFail($id);
        $categoryCharValue->delete();
        return CategoryCharValueResource::collection(CategoryCharValue::all());
    }
}
