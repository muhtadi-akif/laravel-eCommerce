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
        $adminRole = Sentinel::getRoleRepository()->createModel()->create([
            'name' => User::ROLE_ADMIN,
            'slug' => 'administrator',
        ]);

        $customerRole = Sentinel::getRoleRepository()->createModel()->create([
            'name' => User::ROLE_CUSTOMER,
            'slug' => 'customer',
        ]);

        $adminRole->permissions = [
            User::ADMIN_PERMISSION => true,
        ];

        $customerRole->permissions = [
            User::ADMIN_PERMISSION => false,
        ];

        $adminRole->save();
        $customerRole->save();

    }
}
