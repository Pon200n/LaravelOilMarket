<?php

namespace App\Http\Resources;

use App\Models\CategoryCharValue;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // 'data' => $this->collection,
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,

            'brand' => new BrandResource($this->brand),
            'category' => new CategoryResource($this->category),
            'values' => CategoryCharValueResource::collection($this->values),

        ];
    }
}
