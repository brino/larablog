<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index(Article $article, Request $request)
    {

        //build query
        $articles = $article->search($request->input('query'))->where('published',1)->paginate();

        $articles->transform(function ($item) {
            unset($item->id);
            return $item;
        });

        return $articles;
    }
}
