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
            $table->string('banner')->nullable();
            $table->string('thumbnail')->nullable();
            $table->text('script')->nullable();
            $table->text('summary');
            $table->longText('body');
            $table->string('slug')->unique();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        app('Elasticsearch\Client')->indices()->putTemplate([
            'name' => 'articles',
            'order' => 1,
            'body' => [
                'template' => 'articles',
                'mappings' => [
                    'doc' => [
                        'properties' => [
                            'title' => [
                                'type' => 'text',
                                'fields' => [
                                    'keyword' => [
                                        'type' => 'keyword',
                                    ],
                                    'autocomplete' => [
                                        'type' => 'text',
                                        'analyzer' => 'autocomplete',
                                        'search_analyzer' => 'autocomplete_search',
                                    ],
                                ],
                            ],
                            'published_at' => [
                                'type' => 'date',
                                'format' => 'yyyy-MM-dd HH:mm:ss',
                            ]
                        ],
                    ],
                ],
                'settings' =>[
                    'index' => [
                        'analysis' => [
                            'analyzer' => [
                                'autocomplete' => [
                                    'tokenizer' => 'autocomplete',
                                    'filter' => [
                                        'lowercase',
                                    ],
                                ],
                                'autocomplete_search' => [
                                    'tokenizer' => 'lowercase',
                                ],
                            ],
                            'tokenizer' => [
                                'autocomplete' => [
                                    'type' => 'edge_ngram',
                                    'min_gram' => 1,
                                    'max_gram' => 15,
                                    'token_chars' => [
                                        'letter'
                                    ]
                                ]
                            ]
                        ],
                    ],
                ],
            ],
        ]);
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
        app('Elasticsearch\Client')->indices()->deleteTemplate([
            'name' => 'articles'
        ]);

        app('Elasticsearch\Client')->indices()->delete([
            'index' => 'articles'
        ]);

    }
}
