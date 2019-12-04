<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('box', 10)->nullable();
            $table->unsignedBigInteger('city_id'); 
            $table->string('city_name', 100)->nullable();           
            $table->unsignedBigInteger('country_id'); 
            $table->string('number', 20);           
            $table->string('postal_code', 20)->nullable();           
            $table->string('street', 100);           
            $table->timestamps();
            $table->softDeletes(0);

            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
