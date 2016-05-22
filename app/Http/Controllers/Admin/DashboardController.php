<?php

namespace App\Http\Controllers\Admin;

use App\Photo;
use App\User;
use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
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
     * @param Article $article
     * @param Photo $photo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index(Article $article, Photo $photo)
    {
        $info = false;
        $user = Auth::user();

        if($user->super) {
            $articles = $article->latest('published_at')->paginate(20);
            $photos = $photo->latest('published_at')->limit(20)->get();
        } elseif($user->contributor) {
            $articles = $user->articles()->latest('published_at')->paginate(20);
            $photos = $user->photos()->latest('published_at')->limit(20)->get();
        } else {
            return redirect()->route('home');
        }



        if(Session::has('info'))
            $info = Session::get('info');

        return view('admin.dashboard',compact('articles','photos','user','info'));
    }
}
