<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_comments', function (Blueprint $table) {
            $table->increments('CommentId');
            // $table->unsignedBigInteger('todolist_id');
            $table->integer('post_id')->unsigned()->nullable();
            $table->string('comment_author')->nullable();
            $table->text('comment_author_email')->nullable();
            $table->text('comment_author_url')->nullable();
            $table->text('comment_content')->nullable();
            $table->char('comment_approved')->nullable();
            $table->integer('user_id')->nullable();

            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
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
        Schema::dropIfExists('posts_comments');
    }
}
