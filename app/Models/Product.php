<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    //* public $Name;


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function values()
    {
        return $this->belongsToMany(CategoryCharValue::class, 'product_char_values', 'product_id', 'value_id');
    }
    public function info()
    {
        return $this->hasOne(ProductInfo::class, 'product_id');
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'product_id');
    }
}
