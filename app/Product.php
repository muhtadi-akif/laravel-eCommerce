<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const CART_SESSION = "cart";
    public function property()
    {
        return $this->hasOne(Property::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
