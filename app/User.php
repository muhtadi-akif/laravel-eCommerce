<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    const TYPE_ADMIN = "admin";
    const TYPE_CUSTOMER = "customer";
    const SESSION_ADMIN_LOGIN = "session_admin";
    const SESSION_CUSTOMER_LOGIN = "session_customer";
    public $timestamps = false;

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }
}
