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
            'manu_name' => 'Apple',
            'image' => 'Apple.png'          
        ]);
        DB::table('manufactures')->insert([
            'manu_name' => 'SamSung',
            'image' => 'samsung.png'          
        ]);
        DB::table('manufactures')->insert([
            'manu_name' => 'Oppo',
            'image' => 'oppo.png'
            
        ]);
        DB::table('manufactures')->insert([
            'manu_name' => 'HP',
            'image' => 'hp.jpeg'
            
        ]);
        DB::table('manufactures')->insert([
            'manu_name' => 'ASUS',
            'image' => 'asus.png'
            
        ]);
    }
}
