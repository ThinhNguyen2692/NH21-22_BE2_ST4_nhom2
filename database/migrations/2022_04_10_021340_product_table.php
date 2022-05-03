<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->integer('sale_price');
            $table->integer('manu_id');
            $table->integer('type_id');
            $table->integer('price');
            $table->string('image', 150);
            $table->text('description');
            $table->integer('feature');
            $table->integer('quantity');
            $table->integer('status');
            $table->string('Gam', 100);
            $table->string('Dung_Luong', 150);
            $table->string('HDH', 100);
            $table->string('chip', 100);
            $table->string('origin', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
