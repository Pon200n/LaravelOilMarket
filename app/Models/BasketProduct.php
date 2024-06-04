<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasketProduct extends Model
{
    use HasFactory;
    protected $guarded = false;

    // public function products()
    // {
    //     return $this->hasOne(Product::class, 'id');
    // }
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
