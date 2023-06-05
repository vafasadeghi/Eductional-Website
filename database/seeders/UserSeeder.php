<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'created_at' => new \DateTime,
            'updated_at' => new \DateTime,
            'name' => "وفا صادقی ",
            'email' => "hh.ss.136720@gmail.com",
            'email_verified_at' => new \DateTime,
            'phone' => "09171808303",
            'phone_verified_at' => new \DateTime,
            'password' => Hash::make("123456789")
        ]);
    }
}
