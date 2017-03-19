<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;

/**
 * Class ArticleController
 * @package App\Http\Controllers
 */
class ArticleController extends Controller
{

    /**
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Article $article)
    {

        $article->viewed();

        $title = $article->title;

        return view('article.show',compact('title','article'));

    }
}
