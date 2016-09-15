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

    public function index(Request $request,Article $article,Category $filterCategory)
    {

        $query = $request->input('query');


        if($request->has('query'))
        {
            $builder = $article->search($query)->where('published',1);
        }

        else
        {
            $builder = $article->published();
        }


        if($filterCategory->exists)
        {
            $builder->where('category_id',$filterCategory->id);
        }


        $articles = $builder->paginate();

        $categories = Category::all();

        return view('search',compact('articles','categories','filterCategory'));

    }
}
