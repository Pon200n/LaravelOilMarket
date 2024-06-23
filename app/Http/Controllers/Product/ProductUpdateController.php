<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductCharValues;
use App\Models\ProductInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class ProductUpdateController extends Controller
{
    public function method(Request $request)
    {
        // return response()->json([
        //     'all' => $request->all(),
        //     'files' => $request->allFiles(),
        //     'input' => $request->input(),
        //     'raw' => file_get_contents('php://input')
        // ]);
        $id = $request->input('id');
        $imageFile = request()->file('file');

        $product = Product::with('info')
            ->find($id);

        $product_id = $product->id;

        $product->update(
            [
                'name' => $request->input('name'),
                'category_id' => $request->input('category_id'),
                'brand_id' => $request->input('brand_id'),
                'price' => $request->input('price'),
            ]
        );
        ProductInfo::where('product_id', $id)->update(
            [
                "description" => $request->input('description')
            ]
        );

        $values = json_decode($request->input('values'), true);

        if ($values) {
            $productValues = ProductCharValues::where('product_id', $id)->delete();
            ProductCharValues::insert($values);
        }


        if ($imageFile) {
            $image = optional($product)->image;
            //* $imagePath = $product->image->path;
            //? $image = optional($product->image)->path;

            if ($image) {

                $imagePath = $product->image->path;
                $imageName = basename($imagePath);
                Storage::delete($imagePath);
                Storage::disk('public')->putFileAs('/images', $imageFile, $imageName);
            } else {
                $name = md5(Carbon::now() . "_" . $imageFile->getClientOriginalName()) . '.' . $imageFile->getClientOriginalExtension();
                $filePath = Storage::disk('public')->putFileAs('/images', $imageFile, $name);
                Image::create([
                    "path" => $filePath,
                    "url" => url('/storage/' . $filePath),
                    "product_id" => $product_id,
                ]);
            }
        }

        return $product;
    }
}
