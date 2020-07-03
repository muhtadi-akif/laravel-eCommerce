<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    const TYPE_ADMIN = "admin";
    const TYPE_CUSTOMER = "customer";
    const SESSION_ADMIN_LOGIN = "session_admin";
    public $timestamps = false;
}
