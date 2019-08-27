<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Role::create([
            'slug'  => 'admin',
            'name'  =>  'Admin'
        ]);

        \App\Role::create([
            'slug'  => 'human-resources',
            'name'  =>  'Human Resources'
        ]);

        \App\Role::create([
            'slug'  => 'employee',
            'name'  =>  'Employee'
        ]);
    }
}
