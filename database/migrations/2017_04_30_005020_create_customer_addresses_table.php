<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->string('address_line_1');
            $table->string('address_line_2');
            $table->string('address_line_3');
            $table->string('city');
            $table->string('zip_code');
            $table->integer('country_id')->unsigned();
            $table->timestamps();
        });
        
        Schema::table('customer_addresses', function (Blueprint $table) {
           $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropForeign(['customer_id']);
        Schema::drop('customer_addresses');
    }
}
