<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/**
 * Class AdminController
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{
    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Category $category)
    {
        $info = false;

        $user = Auth::user();

        $articles = $user->articles();

        $photos = $user->photos();

        $popular = $user->articles()->orderBy('views','desc')->limit('5')->get();

        $categories = Cache::remember('user-categories-'.$user->id,'30', function () use($category,$user) {
            return $category->orderBy('name','asc')->get()->mapWithKeys(function($category) use ($user){
                $articleCount = $category->articles()->where('user_id','=',$user->id)->get()->count();
                $categoryCount = $category->photos()->where('user_id','=',$user->id)->get()->count();
                return [$category->name => $articleCount + $categoryCount];
            });
        });
        
        if(Session::has('info'))
            $info = Session::get('info');

        return view('admin.dashboard',compact('articles','photos','user','popular','info','categories'));
    }
}
