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
            $builder = $article->search($request->input('query'))->where('published', 1);

            if($request->has('tags')) {
                $tags = collect($request->input('tags'))->values()->toArray();
                $builder->where('tags.slug',(Array) $tags);
            }

            //set category filter
            if($category->exists) {
                $builder->where('category.id',$category->id);
            }

            //execute query
            $articles = $builder->paginate();

        } catch (Missing404Exception $e) {
            $articles = collect([]);
        }

        $categories = Category::all()->filter(function($category) {
            return $category->articles->count();
        });

        return view('articles',compact('articles','categories','category'));
    }

    public function autocomplete(Request $request,Article $article)
    {

        if($request->has('q'))
        {
            try
            {
                $results = app('Elasticsearch\Client')->search([
                    '_source' => ['title', 'slug', 'summary'],
                    'index' => $article->searchableAs(),
                    'type' => 'doc',
                    'body' => [
                        'query' => [
                            'match' => [
                                'title.autocomplete' => [
                                    'query' => $request->input('q'),
                                    'operator' => 'and',
                                ]
                            ]
                        ]
                    ],
                    'size' => 5,
                ]);

                return collect($results['hits']['hits'])->map(function ($result)
                {
                    return [
                        'title' => $result['_source']['title'],
                        'slug' => $result['_source']['slug'],
                        'summary' => strip_tags($result['_source']['summary'])
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
