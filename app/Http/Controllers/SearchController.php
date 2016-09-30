<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

/**
 * Class SearchController
 * @package App\Http\Controllers
 */
class SearchController extends Controller
{

    /**
     * @param Request $request
     * @param Article $article
     * @param Category $filterCategory
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request,Article $article,Category $filterCategory)
    {

        //build query
        $builder = $article->search($request->input('query'))->where('published',1);

        //set category filter
        if($filterCategory->exists)
        {
            $builder->where('category_id',$filterCategory->id);
        }

        //execute query
        $articles = $builder->paginate();

        $categories = Category::all();

        return view('articles',compact('articles','categories','filterCategory'));

    }
}
