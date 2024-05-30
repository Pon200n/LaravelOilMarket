<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryCharResource;
use App\Models\CategoryChar;
use Illuminate\Http\Request;

class CategoryCharController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chars = CategoryChar::all();
        // return $chars;
        return CategoryCharResource::collection($chars);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryChar $categoryChar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoryChar $categoryChar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryChar $categoryChar)
    {
        //
    }
}
