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
            // ->with('image')
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
                // Изображение существует, и вы можете работать с путем к изображению
                // return 'изображение есть';

                $imagePath = $product->image->path;
                $imageName = basename($imagePath);
                Storage::delete($imagePath);
                Storage::disk('public')->putFileAs('/images', $imageFile, $imageName);
            } else {
                // Изображения нет, и вы можете обработать этот случай соответствующим образом

                // return 'изображения нет';
                $name = md5(Carbon::now() . "_" . $imageFile->getClientOriginalName()) . '.' . $imageFile->getClientOriginalExtension();
                $filePath = Storage::disk('public')->putFileAs('/images', $imageFile, $name);
                Image::create([
                    "path" => $filePath,
                    "url" => url('/storage/' . $filePath),
                    "product_id" => $product_id,
                ]);
            }
        }
        //     //* $imageName = basename($imagePath);
        //     Storage::delete($imagePath);
        //     //* Storage::disk('public')->putFileAs('/images', $imageFile, $imageName);
        //     $image->delete();
        //     $name = md5(Carbon::now() . "_" . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
        //     $filePath = Storage::disk('public')->putFileAs('/images', $image, $name);
        //     Image::create([
        //         "path" => $filePath,
        //         "url" => url('/storage/' . $filePath),
        //         "product_id" => $product_id,
        //     ]);
        // }
        return $product;
    }
}
