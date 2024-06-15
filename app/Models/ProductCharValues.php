<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCharValues extends Model
{
    use HasFactory;
    protected $table = 'product_char_values';
    protected $guarded = false;
}
