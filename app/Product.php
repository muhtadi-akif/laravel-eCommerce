<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function property(){
        return $this->hasOne(Property::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
