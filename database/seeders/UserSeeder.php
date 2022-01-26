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
            'email' => 'craig219@comcast.net',
            'password' => Hash::make('UPsidedown666!'),
            'created_at' => NOW(),
            'updated_at' => NOW(),
            'is_admin' => 1,
            'email_verified_at' => NOW(),
        ]);
    }
}
