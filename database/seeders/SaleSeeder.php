<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sale')->insert([
            'id_product' => 1,
            'sale_price' => 10
        ]);
        DB::table('sale')->insert([
            'id_product' => 3,
            'sale_price' => 10
        ]);
        DB::table('sale')->insert([
            'id_product' => 2,
            'sale_price' => 10
        ]);
        DB::table('sale')->insert([
            'id_product' => 5,
            'sale_price' => 10
        ]);
        DB::table('sale')->insert([
            'id_product' => 4,
            'sale_price' => 10
        ]);
        DB::table('sale')->insert([
            'id_product' => 6,
            'sale_price' => 10
        ]);
    }
}
