<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Media;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{

    /**
     * @param Article $article
     * @param Media $media
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Article $article, Media $media)
    {

        $latest = $article->latest('published_at')->published()->limit(5)->get();

        $popular = $article->popular()->published()->orderBy('views','desc')->limit(5)->get();

        $medias = $media->latest('published_at')->published()->limit(5)->get();

        $categories = Category::all()->filter(function($category) {
            return $category->articles->count();
        });

        $title = 'Latest';

        return view('home',compact('title','latest','medias','popular','categories'));

    }
}
