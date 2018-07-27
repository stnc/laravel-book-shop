<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_author');
            $table->longText('post_content')->nullable();;
            $table->text('post_title')->nullable();;
            $table->text('post_excerpts')->nullable();;
            $table->char('post_status');
            $table->char('comment_status')->nullable();;
            $table->char('media_picture')->nullable();;
            $table->integer('post_order');
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
        Schema::dropIfExists('posts');
    }
}
