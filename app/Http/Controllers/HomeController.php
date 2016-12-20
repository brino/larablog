<?php

namespace App\Http\Controllers;

use App\Article;
use App\Photo;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{

    /**
     * @param Article $article
     * @param Photo $photo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Article $article,Photo $photo)
    {

        $articles = $article->latest('published_at')->published()->limit(7)->get();

        $photos = $photo->latest('published_at')->published()->limit(3)->get();

        if($articles->count()){
            return view('home',compact('articles','photos'));
        }

        return view('about');

    }
}
