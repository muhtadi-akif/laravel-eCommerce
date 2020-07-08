<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    const ROLE_CUSTOMER = "Customer";
    const ROLE_ADMIN = "Administrator";
    const SESSION_ADMIN_LOGIN = "session_admin";
    const SESSION_CUSTOMER_LOGIN = "session_customer";



    public function customer()
    {
        return $this->hasOne(Customer::class);
    }
}
