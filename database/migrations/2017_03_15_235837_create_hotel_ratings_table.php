<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_rating');
            $table->integer('hotel_id')->unsigned();
            $table->timestamps();
        });
        
        Schema::table('hotel_ratings', function (Blueprint $table) {
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
        Schema::drop('hotel_ratings');
    }
}
