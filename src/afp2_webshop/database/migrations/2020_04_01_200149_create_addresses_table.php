<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('country');
            $table->string('tin')->nullable();
            $table->string('postal_code');
            $table->string('city');
            $table->string('street');
            $table->string('house');
            $table->string('note')->nullable();
            $table->timestamp('created_at')->useCurrent(); //Kötelező Laravel miatt
            $table->timestamp('updated_at')->useCurrent(); //Kötelező Laravel miatt


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
