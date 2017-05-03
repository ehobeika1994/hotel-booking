<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomAvailabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_availabilities', function (Blueprint $table) {
	       $table->increments('id');
	       $table->integer('hotel_room_id')->unsigned();
	       $table->integer('availability'); 
        });
        
        Schema::table('room_availabilities', function (Blueprint $table) {
	       $table->foreign('hotel_room_id')->references('id')->on('hotel_rooms')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropForeign(['hotel_room_id']);
        Schema::drop('room_availabilities');
    }
}
