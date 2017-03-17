<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelPoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *                        
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_policies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id')->unsigned();
            $table->string('check_in');
            $table->string('check_out');
            $table->string('cancellation');
            $table->string('children_beds');
            $table->string('pets');
            $table->string('groups');
            $table->string('payment');
            $table->timestamps();
        });
        
        Schema::table('hotel_policies', function (Blueprint $table) {
	       $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropForeign(['hotel_id']);
        Schema::drop('hotel_policies');
    }
}
