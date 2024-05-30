<?php

namespace App\Http\Controllers\Brand;

use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BrandResource;
use App\Http\Requests\BrandRequest\BrandCreateRequest;
use App\Http\Requests\BrandRequest\BrandUpdateRequest;
use App\Http\Middleware\AdminPanelMiddleware;


class BrandAdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('admin_panel')->except('index', 'show');
    // }

    public function index()
    {
        return BrandResource::collection(Brand::all());
    }

    public function store(BrandCreateRequest $request)
    {
        // dd($request);
        Brand::firstOrCreate($request->validated());
        return BrandResource::collection(Brand::all());
    }

    public function show(string $id)
    {
        return new BrandResource(Brand::findOrFail($id));
    }

    public function update(BrandUpdateRequest $request, string $id)
    {
        $brand = Brand::find($id);
        $brand->update($request->validated());
        return BrandResource::collection(Brand::all());
    }


    public function destroy(string $id)
    {
        Brand::destroy($id);
        return BrandResource::collection(Brand::all());
    }
}
