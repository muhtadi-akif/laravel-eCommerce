<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AranozUser extends Model
{
    const TYPE_ADMIN = "admin";
    const TYPE_CUSTOMER = "customer";
    const SESSION_ADMIN_LOGIN = "session_admin";
    const SESSION_CUSTOMER_LOGIN = "session_customer";


    public function customer()
    {
        return $this->hasOne(Customer::class);
    }
}
