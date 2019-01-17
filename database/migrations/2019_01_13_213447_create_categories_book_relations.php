<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesBookRelations extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_book_relations', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('category_id')->unsigned()->nullable();

            $table->foreign('category_id')->references('id')
                ->on('categories_book')->onDelete('cascade');

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
        Schema::dropIfExists('categories_book_relations');
    }
}
