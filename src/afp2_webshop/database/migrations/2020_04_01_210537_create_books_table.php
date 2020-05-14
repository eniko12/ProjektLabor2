<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('created_at')->useCurrent();
            $table->string('ISBN')->unique();
            $table->string('title');
            $table->string('thumbnail')->nullable();
            //$table->integer('author_id');
            $table->year('publish_year');
            $table->integer('publisher_id');
            //$table->integer('genre_id');
            $table->string('language');
            $table->integer('page_count');
            $table->text('description');
            $table->tinyInteger('can_order');
            $table->tinyInteger('can_preorder');
            $table->integer('in_stock');
            $table->integer('price');
            $table->timestamp('updated_at')->useCurrent();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
