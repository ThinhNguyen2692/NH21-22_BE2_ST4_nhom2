<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


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
            'id' => 0,
            'name' => 'Customer',
            'email' => '',
            'role_id' => "0",
            'password' =>  Hash::make("123456789")
        ]);
        DB::table('users')->insert([
            'name' => 'thinh',
            'email' => 'nndthinh2802@gmail.com',
            'role_id' => "1",
            'password' =>  Hash::make("123456789")
        ]);
        DB::table('users')->insert([
            'name' => 'Huy',
            'email' => 'thinh48691953@gmail.com',
            'role_id' => "0",
            'password' =>  Hash::make("123456789")
        ]);
        DB::table('users')->insert([
            'name' => 'Bac',
            'email' => 'bbuon709@gmail.com',
            'role_id' => "0",
            'password' =>  Hash::make("123456789")
        ]);
    }
}
