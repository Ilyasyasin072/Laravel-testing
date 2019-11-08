<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //membuat table products
        Schema::create('products', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullabel();
            $table->integer('   ')->unsigned();
            $table->integer('stock')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::drop('products');
    }
}
