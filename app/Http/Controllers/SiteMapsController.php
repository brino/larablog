<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Photo;
use Watson\Sitemap\Facades\Sitemap;

use App\Http\Requests;

/**
 * Class SiteMapController
 * @package App\Http\Controllers
 */
class SiteMapsController extends Controller
{

    /**
     * @return mixed
     */
    public function index()
    {
        // Get a general sitemap.
        //Sitemap::addSitemap('/sitemaps');

        // You can use the route helpers too.
        Sitemap::addSitemap(route('sitemaps.general'));
        Sitemap::addSitemap(route('sitemaps.articles'));
        Sitemap::addSitemap(route('sitemaps.photos'));

        // Return the sitemap to the client.
        return Sitemap::index()->header('Content-Type','application/xml');
    }

    public function general()
    {
        Sitemap::addTag(route('home'), Article::latest('updated_at')->published()->first()->updated_at, 'weekly', '1');
        Sitemap::addTag(route('about'), '2016-05-28T19:00:43+00:00', 'yearly', '0.9');

        return Sitemap::render()->header('Content-Type','text/xml');
    }

    public function articles()
    {
        $articles = Article::all();

        foreach ($articles as $article) {
            Sitemap::addTag(route('article', $article->slug), $article, 'never', '0.7');
        }

        return Sitemap::render()->header('Content-Type','application/xml');
    }

    public function photos()
    {
        $photos = Photo::all();

        foreach ($photos as $photo) {
            Sitemap::addTag(route('photo', $photo->slug), $photo, 'never', '0.7');
        }

        return Sitemap::render()->header('Content-Type','application/xml');
    }

}
