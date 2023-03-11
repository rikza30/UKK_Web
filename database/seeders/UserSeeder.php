<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        users::create([
            'name' => "Admin",
            'email' => "admin@gmail.com",
            'password' => bcrypt('12345678')
        ]);
    }
}
