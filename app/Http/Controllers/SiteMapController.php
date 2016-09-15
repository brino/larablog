<?php

namespace App\Http\Controllers;

use App\Article;
use App\Photo;
use Watson\Sitemap\Facades\Sitemap;

/**
 * Class SiteMapController
 * @package App\Http\Controllers
 */
class SiteMapController extends Controller
{

    /**
     * @return mixed
     */
    public function index()
    {

        // You can use the route helpers too.
        Sitemap::addSitemap(route('sitemap.general'));
        Sitemap::addSitemap(route('sitemap.articles'));
        Sitemap::addSitemap(route('sitemap.photos'));

        // Return the sitemap to the client.
        return Sitemap::index()->header('Content-Type','application/xml');
    }

    public function general()
    {
        Sitemap::addTag(route('home'), Article::latest('updated_at')->published()->first()->updated_at, 'weekly', '5');
        Sitemap::addTag(route('about'), '2016-05-28T19:00:43+00:00', 'yearly', '0.6');

        return Sitemap::render()->header('Content-Type','text/xml');
    }

    public function articles()
    {
        $articles = Article::published()->get();

        foreach ($articles as $article) {
            Sitemap::addTag(route('article', $article->slug), $article, 'weekly', '0.9');
        }

        return Sitemap::render();
    }

    public function photos()
    {
        $photos = Photo::published()->get();

        foreach ($photos as $photo) {
            Sitemap::addTag(route('photo', $photo->slug), $photo, 'never', '0.2');
        }

        return Sitemap::render();
    }

}
