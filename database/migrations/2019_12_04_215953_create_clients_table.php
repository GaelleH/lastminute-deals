<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('address_id'); 
            $table->tinyInteger('client_type');
            $table->string('company_name', 100)->nullable();
            $table->string('email', 200);
            $table->string('first_name', 100);
            $table->unsignedBigInteger('invoice_address_id'); 
            $table->string('last_name', 100);
            $table->unsignedBigInteger('user_id'); 
            $table->string('vat_number', 20)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('invoice_address_id')->references('id')->on('addresses');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
