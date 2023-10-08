<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        DB::table('users')->insert([
            'name'  => 'admin', 
            'email' => 'admin@gmail.com',
            'password'  => Hash::make('password'),
            'role'  => 'Admin'
        ]);
    }
}
