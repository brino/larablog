<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
//use Illuminate\Support\Facades\Storage;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index();
            $table->string('title')->unique();
            $table->string('banner');
            $table->string('thumbnail');
            //$table->string('tag_list');
            $table->text('script');
            $table->text('summary');
            $table->longText('body');
            $table->string('slug')->unique();
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('articles');
        Storage::disk('public')->deleteDirectory('banners');
        Storage::disk('public')->deleteDirectory('thumbnails');
    }
}
