<?php

use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $credentials = [
            'email'    => 'admin@aranoz.com',
            'password' => 'Hello1234',
        ];

        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleByName(User::ROLE_ADMIN);
        $role->users()->attach($user);
    }
}
