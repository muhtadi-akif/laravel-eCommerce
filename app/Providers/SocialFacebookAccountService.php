<?php


namespace App\Providers;
use App\SocialFacebookAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialFacebookAccountService
{
    public function getProviderUser(ProviderUser $providerUser)
    {
            return $providerUser;
    }
}
