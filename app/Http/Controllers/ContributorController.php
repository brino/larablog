<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;

/**
 * Class ContributorController
 * @package App\Http\Controllers
 */
class ContributorController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $contributors = User::where('contributor',true)->orderBy('name','asc')->paginate(10);

        $categories = Category::all()->filter(function($category) {
            return $category->articles->count() > 0;
        });

        $contributors->load('media');
        $contributors->load('articles');
        $title = 'Contributors';

        return view('contributors',compact('title','contributors','categories'));
    }

}
