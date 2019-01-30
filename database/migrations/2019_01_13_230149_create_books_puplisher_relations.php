<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksPuplisherRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_puplisher_relations', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('puplisher_id')->unsigned()->nullable();

            $table->foreign('puplisher_id')->references('id')
                ->on('puplishing_house')->onDelete('cascade');

            $table->integer('book_id')->unsigned()->nullable();

            $table->foreign('book_id')->references('id')
                ->on('a_books')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_author_relations');
    }
}
