<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hotel_facility');
            $table->integer('hotel_id')->unsigned();
            $table->timestamps();
        });
        
        Schema::table('facilities', function (Blueprint $table) {
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
        Schema::drop('facilities');
    }
}
