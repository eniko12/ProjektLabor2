<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('date_of_birth');
            $table->string('email')->unique();
            $table->tinyInteger('gender')->default(0);
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->tinyInteger('user_auth')->default(0);
            $table->integer('billing')->nullable();
            $table->integer('shipping')->nullable();
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
        Schema::dropIfExists('users');
    }
}
