<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateABookAuthorLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_book_author_likes', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('liketable'); // Adds unsigned INTEGER upvoteable_id and STRING upvoteable_type
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
        Schema::dropIfExists('a_book_author_likes');
    }
}
