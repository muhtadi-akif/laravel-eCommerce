<?php

namespace App;

use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Database\Eloquent\Model;

class User extends EloquentUser
{
    const ROLE_CUSTOMER = "Customer";
    const ROLE_ADMIN = "Administrator";
    const ADMIN_PERMISSION = "admin";
    const CUSTOMER_PERMISSION = "customer";
    const SUCCESS_MESSAGE = "message";


    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function facebookAccount()
    {
        return $this->hasOne(SocialFacebookAccount::class);
    }
}
