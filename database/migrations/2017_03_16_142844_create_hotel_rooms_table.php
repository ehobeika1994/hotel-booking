<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id')->unsigned();
            $table->string('room_type');
            $table->integer('room_capacity');
            $table->double('room_price', 15, 2);
            $table->text('room_facilities');
            $table->string('room_image');
            $table->timestamps();
        });
        
        Schema::table('hotel_rooms', function (Blueprint $table) {
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
        Schema::drop('hotel_rooms');
    }
}
