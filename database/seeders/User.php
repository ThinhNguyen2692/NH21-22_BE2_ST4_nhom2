<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'name' => 'thinh',
            'address' => 'An Giang',
            'email' => Str::random(10).'@gmail.com',
            'phone_number' => '0123456789',
            'role_id' => 1,
            'pass_word' => Hash::make('password'),
        ]);
        DB::table('user')->insert([
            'name' => 'thinh',
            'address' => 'An Giang',
            'email' => Str::random(10).'@gmail.com',
            'phone_number' => '0123456789',
            'role_id' => 1,
            'pass_word' => Hash::make('password'),
        ]);
    }
}
