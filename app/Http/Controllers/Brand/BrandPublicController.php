<?php

namespace App\Http\Controllers\Brand;

use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BrandResource;
use App\Http\Requests\BrandRequest\BrandCreateRequest;
use App\Http\Requests\BrandRequest\BrandUpdateRequest;

class BrandPublicController extends Controller
{

    public function index()
    {        
        return BrandResource::collection(Brand::all());
    }
    
    public function show(string $id)
    {
        return new BrandResource(Brand::findOrFail($id));
    }

}
