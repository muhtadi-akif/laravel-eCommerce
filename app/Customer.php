<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class)->latest();
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
