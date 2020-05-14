<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_genres', function (Blueprint $table) {
            $table->bigInteger('book_id');
            $table->bigInteger('genre_id');
            $table->bigIncrements('id');
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
        Schema::dropIfExists('book_genres');
    }
}
