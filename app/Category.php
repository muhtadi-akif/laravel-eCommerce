<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const TYPE_PRODUCT = "product";
    const TYPE_POST = "post";

    public function products(){
        return $this->hasMany(Product::class);
    }
}
