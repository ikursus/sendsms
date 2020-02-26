<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User 1
        DB::table('users')->insert([
            'name' => 'Ahmad',
            'email' => 'ahmad@gmail.com',
            'password' => bcrypt('pass123'),
            'phone' => '0123456789',
            'status' => 'active',
            'role' => 'admin',
            'jantina' => 'lelaki'
        ]);

        // User 2
        DB::table('users')->insert([
            'name' => 'Ali',
            'email' => 'ali@gmail.com',
            'password' => bcrypt('pass123'),
            'phone' => '0123456789',
            'status' => 'active',
            'role' => 'staff',
            'jantina' => 'lelaki'
        ]);
    }
}
