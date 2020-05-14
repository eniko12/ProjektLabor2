<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_id');
            $table->integer('billing')->nullable();
            $table->integer('shipping')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
