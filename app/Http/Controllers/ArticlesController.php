<?php

namespace App\Http\Controllers;

use App\Article;
use App\Elastic\ArticleQuery;
use App\Category;
use ElasticBuilder\Eb;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tag;
use Carbon\Carbon;

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
     * @var Request
     */
    protected $request;

    /**
     * ArticlesController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->categories = Category::all();
    }

    /**
     * @param Article $article
     * @param ArticleQuery $query
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Article $article,ArticleQuery $query){
        $search = [];
        $size=10;
        $categoryFilterID = $this->request->get('category',false);
        $search['string'] = $this->request->get('search');
        
        if($categoryFilterID){
            $categoryFilter = Category::findOrFail($categoryFilterID)->name;
        }


        /**
         * 
         * EXAMPLES
         * 
         */

//        $temp = Eb::boolean()
//            ->must(Eb::term('category_id',1))
//            ->filter(Eb::range('published_at',['lte' => Carbon::now()->toIso8601String(),'gte' => Carbon::now()->subDay(10)->toIso8601String()]))->get();

//        $query = $query->get();

//        $match = \Eb::multi_match(['title^3','summary^1','body','userName^2','categoryName^2','tag_string^1'],'lorim ipsum','and','cross_fields');
        
//        $temp = $article->boolean()
//            ->must(Eb::match('body','keyword search string'))
//            ->aggregate(Eb::agg()->terms('categories','category_id'))->get();

//        $query = Article::agg()
//            ->terms('categories','category_id');

//        dump($temp);

//        $mysql = $article->where('user_id',11)->paginate();
//
//        dump($mysql);

        /**
         * 
         * END EXAMPLES
         * 
         */

        //perform elasticsearch query
        $results = $article->searchByQuery($query->get(),$query->aggregations(),$source=null,$query->size(),$query->offset(),$query->sort());

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

        $articles = $results->paginate($size);
        
        $page = $this->request->get('page');
        
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
    public function category(Category $category, Article $article){

        $categories = $this->categories;

        $search = collect([]);
        $categoryFilterID = false;

        $page = $this->request->get('search');

        $perPage = 10;
        $article->load('user');
        $article->load('category');
        $article->load('tags');
        
        $articles = $article->latest('published_at')->published()->where('category_id','=',$category->id)->paginate($perPage);

        return view('category',compact('articles','category','categories','search','page','categoryFilterID'));
    }

    /**
     * @param Tag $tag
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tag(Tag $tag, Article $article){

        $categories = $this->categories;
        $search = collect([]);
        $categoryFilterID = false;

        $page = $this->request->get('search');

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
