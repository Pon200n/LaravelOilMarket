<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;
    protected $guarded = false;
    protected $fillable = ['user_id'];

    public function basket_products()
    {
        return $this->hasMany(BasketProduct::class, 'basket_id');
    }
}
