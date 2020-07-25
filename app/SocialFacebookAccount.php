<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialFacebookAccount extends Model
{
    const PROVIDER_SESSION = "provider_session";
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
