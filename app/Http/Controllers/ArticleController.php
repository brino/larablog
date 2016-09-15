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
    public function index(Article $article)
    {

        $articles = $article->latest('published_at')->published()->paginate();

        $categories = Category::all();

        return view('articles',compact('articles','categories'));

    }


    /**
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Article $article)
    {

        $article->viewed();

        return view('article.show',compact('article'));

    }
}
