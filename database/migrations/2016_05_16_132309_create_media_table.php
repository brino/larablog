<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
//use Illuminate\Support\Facades\Storage;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->integer('category_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->string('url')->indexed();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('media_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('media_id')->unsigned()->index();
            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
            $table->integer('tag_id')->unsigned()->index();
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_tag');
        Schema::drop('media');
        Storage::disk('public')->deleteDirectory('media');
    }
}
