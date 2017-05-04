<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('booking_number');
            $table->integer('user_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('hotel_room_id')->unsigned();
            $table->date('from_date');
            $table->date('till_date');
            $table->integer('number_of_rooms');
            $table->integer('number_of_adults');
            $table->integer('number_of_children');
            $table->boolean('active_booking');
            $table->timestamps();
        });
        
        Schema::table('bookings', function (Blueprint $table) {
	       $table->foreign('user_id')->references('id')->on('users');
		   $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
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
	    Schema::dropForeign(['user_id']);
	    Schema::dropForeign(['customer_id']);
	    Schema::dropForeign(['hotel_room_id']);
        Schema::drop('bookings');
    }
}
