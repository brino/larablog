<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests;
use Carbon\Carbon;
use App\Tag;

/**
 * Class ArticlesController
 * @package App\Http\Controllers
 */
class ArticlesController extends Controller
{

    /**
     * @var
     */
    protected $categories;

    /**
     * ArticlesController constructor.
     */
    public function __construct()
    {

        $this->categories = Category::all();

    }

    /**
     * @param Article $article
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Article $article,Request $request){
        $perPage = 10;
        $search = [];
        $categoryFilterID = false;

        $aggregations =
            [
                'categories' => [
                    'terms' => [
                        'field' => 'category_id'
                    ]
                ]
            ];

        $sort =
            [
                '_score',
                [ 'published_at'=>'desc'],
                [ 'updated_at'=>'desc'],
                [ 'created_at'=>'desc'],
            ];

        if($request->has('search')){
            $search['string'] = $request->get('search');

            $match = [
                'multi_match'=>[
                    'query' => $search['string'],
                    'fields' => ['title^3','summary^1','body','userName^2','categoryName^2','tag_string^1'],
                    'type' => 'cross_fields',
                    'operator' => 'and'
                ]
            ];

        } else {

            $match = [
                'match_all' => []
            ];
        }

        $query =
            [
                'bool' =>[
                    'must' => $match,
                    'filter' => [
                        'range' => [
                            'published_at' => [
                                'lte' => Carbon::now()->toIso8601String()
                            ]
                        ]
                    ]
                ]
            ];


        if(!empty($request->get('category'))){
            $categoryFilterID  = $request->get('category');

            $categoryFilter = Category::findOrFail($categoryFilterID)->name;

            $query['bool']['filter']['category']['term'] = ['category_id' => $categoryFilterID];
        }

        $offset = ($request->get('page',1)-1)*$perPage;
        $results = $article->searchByQuery($query,$aggregations,$source=null,$perPage,$offset,$sort);

        $search['took'] = $results->took();
        $search['hits'] = $results->totalHits();
        if(isset($results->getAggregations()['categories'])){
            $this->aggs = collect($results->getAggregations()['categories']['buckets']);
        }

        $categories = $this->categories->filter(function ($category) {
            if(isset($this->aggs) && $this->aggs->count()) {
                foreach ($this->aggs as $rawCat) {
                    if ($category->id == $rawCat['key']) {
                        $category->count = $rawCat['doc_count'];
                    }
                }
            }

            return true;
        });

        $articles = $results->paginate($perPage);
        $page = $request->get('search');
        $search = collect($search); //make search a collection

        $article->load('user');
        $article->load('category');
        $article->load('tags');

        return view('articles',compact('articles','categories','search','page','categoryFilter','categoryFilterID'));
    }

    /**
     * @param Category $category
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category(Category $category, Article $article, Request $request){

        $categories = $this->categories;

        $search = collect([]);
        $categoryFilterID = false;

        $page = $request->get('search');

        $perPage = 10;
        $article->load('user');
        $article->load('category');
        $article->load('tags');
        
        $articles = $article->latest('published_at')->published()->where('category_id','=',$category->id)->paginate($perPage);

        return view('category',compact('articles','category','categories','search','page','categoryFilterID'));
    }

    public function tag(Tag $tag, Article $article, Request $request){

        $categories = $this->categories;
        $search = collect([]);
        $categoryFilterID = false;

        $page = $request->get('search');

        $perPage = 10;
        $article->load('user');
        $article->load('category');
        $article->load('tags');
        
        $articles = $tag->articles()->latest('published_at')->published()->paginate($perPage);

        return view('tag',compact('articles','tag','categories','search','page','categoryFilterID'));
    }

    /**
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Article $article)
    {

        return view('article.show',compact('article'));
    }
}
