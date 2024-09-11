<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function productDetail()
    {
        return $this->hasOne(ProductDetail::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function weights()
    {
        return $this->hasMany(Weight::class);
    }

    public function colors()
    {
        return $this->hasMany(Color::class);

    }

    public function sizes()
    {
        return $this->hasMany(Size::class);

    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function activeReviews()
    {
        return $this->hasMany(Review::class)->active();
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_products');
    }
    
    

   


}
