<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookAuthorRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_author_relations', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('author_id')->unsigned()->nullable();

            $table->foreign('author_id')->references('id')
                ->on('a_authors')->onDelete('cascade');

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
        //
    }
}
