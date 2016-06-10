<?php
/**
 * Created by PhpStorm.
 * User: bmix
 * Date: 6/8/16
 * Time: 6:26 AM
 */

namespace App\Elastic;

use Carbon\Carbon;
use Illuminate\Http\Request;
use ElasticBuilder\Eb;
use ElasticBuilder\Query\Boolean;

/**
 * Class ArticleQuery
 * @package App
 */
class ArticleQuery extends Boolean
{
    /**
     * @var Request
     */
    protected $request;
    
    /**
     * ArticleQuery constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct();
        $this->request = $request;
        $this->page = $this->request->get('page',1);
        $this->search();
        $this->category();
        $this->published();
        $this->categoryAgg();
    }

    /**
     * gather search string and apply it to match query
     */
    private function search()
    {
        if($this->request->has('search')){
            $search = $this->request->get('search');
            
            $match = Eb::multi_match(['title^3','summary^1','body','userName^2','categoryName^2','tag_string^1'],$search,'and','cross_fields');

        } else {
            $match = Eb::match_all();
        }

        $this->must($match);
    }

    /**
     * get category ID from filters and create term filter
     */
    private function category()
    {
        if(!empty($this->request->get('category'))){
            $categoryFilterID  = $this->request->get('category');
            
            $filter = Eb::term('category_id',$categoryFilterID);

            $this->filter($filter);
        }
    }

    /**
     * use timestamp NOW() to create range filter
     */
    private function published()
    {
        $filter = Eb::range('published_at',['lte' => Carbon::now()->toIso8601String()]);
        
        $this->filter($filter);
    }

    /**
     * build categories terms aggregation
     */
    private function categoryAgg()
    {
        $aggregation = Eb::agg()->terms('categories','category_id');
        $this->aggregate($aggregation);
    }
}