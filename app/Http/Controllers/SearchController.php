<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Elasticsearch\Common\Exceptions\Missing404Exception;

/**
 * Class SearchController
 * @package App\Http\Controllers
 */
class SearchController extends Controller
{

    /**
     * @param Request $request
     * @param Article $article
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request,Article $article,Category $category)
    {
        try
        {
            //build query
            $builder = $article->search()
                ->boolean()
                ->should($article->match('title',$request->input('query'), 'and', 'boolean', 1, 2))
                ->should($article->match('summary',$request->input('query')))
                ->should($article->match('body',$request->input('query')))
                ->filter($article->term('published', 1))
//                ->aggregate($article->agg()->terms('categories', 'category.name.keyword'))
            ;

            if($request->has('tags')) {
                $builder->filter($article->terms('tags.name.keyword', $request->input('tags')));
            }

            //set category filter
            if($category->exists) {
                $builder->filter($article->term('category.id', $category->id));
            }

            //execute query
            $articles = $builder->paginate();

        } catch (Missing404Exception $e) {
            $articles = collect([]);
        }

        $categories = Category::all()->filter(function($category) {
            return $category->articles()->published()->get()->count();
        });

        $title = "Articles $category->name ".request('query');

        return view('articles',compact('title','articles','categories','category'));
    }

    /**
     * @param Request $request
     * @param Article $article
     * @return array|\Illuminate\Http\JsonResponse|static
     */
    public function autocomplete(Request $request,Article $article)
    {
        if($request->has('q'))
        {
            try
            {
                return $article->search()->query($article->match('title.autocomplete',$request->input('q')))->take(5)->get()
                    ->map(function ($article) {
                    return [
                        'title' => $article->title,
                        'slug' => $article->slug,
                        'summary' => $article->summary
                    ];
                });
            } catch(\Exception $e) {
                return response()->json(['error' => $e->getMessage()],500);
            }

        } else {
            return [];
        }

    }
}
