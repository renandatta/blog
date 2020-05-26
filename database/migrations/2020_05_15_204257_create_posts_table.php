<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('post_category_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('media_id')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->text('tags')->nullable();
            $table->date('date_published');
            $table->longText('content');
            $table->text('meta_tags')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);

            $table->foreign('post_category_id')->references('id')->on('post_categories');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('media_id')->references('id')->on('media');
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
