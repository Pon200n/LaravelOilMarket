<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest\ProductCreateRequest;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // return $values[0]['char_id'];

    public function store(ProductCreateRequest $request)
    {
        $data = $request->validated();
        $product = Product::firstOrCreate($data);
        $product_id = $product->id;

        // *$product = new Product();
        // *$product->Name = "12";
        // *$product->save();

        $values = $request->input('values');
        if (is_array($values)) {
            for ($i = 0; $i < count($values); $i++) {
                DB::insert('insert into product_char_values(char_id,value_id,product_id) values (?,?,?)', [$values[$i]['char_id'], $values[$i]['value'], $product_id]);
                // Вставка данных
            }
        }
        $description = $request->input('description');
        DB::insert('insert into product_infos(product_id,description) values (?,?)', [$product_id, $description]);

        $image = request()->file('file');
        $description = request()->get('description');
        $name = md5(Carbon::now() . "_" . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
        $filePath = Storage::disk('public')->putFileAs('/images', $image, $name);
        Image::create([
            "path" => $filePath,
            "url" => url('/storage/' . $filePath),
            "product_id" => $product_id,
        ]);

        $products = Product::with('category')->with('brand')->with('values.characteristic')->with('info')->with('image')->get();

        return $products;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $products = Product::with('category')->with('brand')->with('values.characteristic')->with('info')->with('image')->get();
        $product = Product::findOrFail($id);

        $path = optional($product->image)->path;
        if ($path !== null) {
            Storage::disk('public')->delete($path);
        }
        Product::destroy($id);
        return $products;
    }
}
