<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Protype extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('protypes')->insert([
            'type_name' => 'Laptop'
            
        ]);
        DB::table('protypes')->insert([
            'type_name' => 'Smartphone'
            
        ]);
        DB::table('protypes')->insert([
            'type_name' => 'Smart watch'
            
        ]);
        DB::table('protypes')->insert([
            'type_name' => 'Taplet'
            
        ]);
        DB::table('protypes')->insert([
            'type_name' => 'Accessory'
            
        ]);
    }
}
