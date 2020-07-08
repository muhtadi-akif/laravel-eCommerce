<?php

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
            'name' => 'Administrator',
            'slug' => 'administrator',
        ]);

    }
}
