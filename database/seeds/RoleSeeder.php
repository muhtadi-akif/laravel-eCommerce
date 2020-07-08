<?php

use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sentinel::getRoleRepository()->createModel()->create([
            'name' => User::ROLE_ADMIN,
            'slug' => 'administrator',
        ]);

        Sentinel::getRoleRepository()->createModel()->create([
            'name' => User::ROLE_CUSTOMER,
            'slug' => 'customer',
        ]);

    }
}
