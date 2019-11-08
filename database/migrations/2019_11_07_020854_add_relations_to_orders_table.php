<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('orders_products', function(Blueprint $table){

            $table->integer('product_id')->unsigned()->change();
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('order_id')->unsigned()->change();
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
        public function down()
    {
         //Schema::drop('orders_products');
    }
}
