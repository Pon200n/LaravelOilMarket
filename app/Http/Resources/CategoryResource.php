<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "category_name" => $this->category_name,
            "chars" => $this->char->map(function ($char) {
                return [
                    "id" => $char->id,
                    "char_name" => $char->char_name,
                    "category_id" => $char->category_id,
                    "values" => $char->categoryCharValues,

                ];
            }),
            "exist_brands" => $this->product->map(function ($product) {
                return [
                    "category_id" => $product->category_id,
                    "brand_id" => $product->brand_id,
                    "brand" => [
                        "id" => $product->brand->id,
                        "brand_name" => $product->brand->brand_name,
                        "brand_country" => $product->brand->brand_country,
                    ]
                ];
            }),
        ];
    }
}
