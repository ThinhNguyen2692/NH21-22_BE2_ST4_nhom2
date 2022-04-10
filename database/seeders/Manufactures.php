<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Manufactures extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manufactures')->insert([
            'manu_name' => 'Apple'
            
        ]);
        DB::table('manufactures')->insert([
            'manu_name' => 'SamSung'
            
        ]);
        DB::table('manufactures')->insert([
            'manu_name' => 'Oppo'
            
        ]);
        DB::table('manufactures')->insert([
            'manu_name' => 'HP'
            
        ]);
        DB::table('manufactures')->insert([
            'manu_name' => 'ASUS'
            
        ]);
    }
}
