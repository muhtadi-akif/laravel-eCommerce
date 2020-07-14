<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    const STATUS_PENDING = 0;
    const STATUS_CANCELLED = 1;
    const STATUS_ACCEPTED = 2;

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
