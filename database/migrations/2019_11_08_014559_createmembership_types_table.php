<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatemembershipTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_types', function(Blueprint $table){
            $table->increment('id');
            $table->string('type');
            $table->integer('discount');
            $table->integer('yearly->fee');
        });

        Schema::table('customers',function(Blueprint $table)
        {
            $table->integer('membership_types_id')->unsigned()->nullabel();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer', function(Blueprint $table)
        {
            $table->dropColumn('membership_types_id');
        });

        Schema::drop('membership_types');
    }
}
