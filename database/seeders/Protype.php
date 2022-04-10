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
            'type_name' => 'laptop'
            
        ]);
        DB::table('protypes')->insert([
            'type_name' => 'Điện thoại'
            
        ]);
        DB::table('protypes')->insert([
            'type_name' => 'Đồng hồ thông minh'
            
        ]);
        DB::table('protypes')->insert([
            'type_name' => 'taplet'
            
        ]);
        DB::table('protypes')->insert([
            'type_name' => 'Phụ kiện'
            
        ]);
    }
}
