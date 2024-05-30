<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use HasFactory;

    protected $table = "brands";
    protected $guarded = false;
    // protected $fillable = [
    //     'brand_name',
    //     'brand_country',
    // ];
    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }
}
