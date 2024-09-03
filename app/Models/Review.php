<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
