<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id')->unsigned();
            $table->text('hotel_address');
            $table->string('hotel_phone_number');
            $table->string('hotel_email_address');
            $table->string('hotel_website');
            $table->decimal('longitude', 10, 7);
            $table->decimal('latitude', 10, 7);
            $table->timestamps();
        });

         Schema::table('hotel_addresses', function (Blueprint $table) {
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
        Schema::drop('hotel_addresses');
    }
}
