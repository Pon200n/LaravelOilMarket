<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CategoryChar extends Model
{
    use HasFactory;
    protected $guarded = false;
    // protected $fillale = [];
    protected $table = 'category_chars';

    public function categoryCharValues()
    {
        return $this->hasMany(CategoryCharValue::class, 'char_id');
    }
}
