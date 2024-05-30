<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CategoryCharValue extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function characteristic(): BelongsTo
    {
        return $this->belongsTo(CategoryChar::class, 'char_id');
    }
}
