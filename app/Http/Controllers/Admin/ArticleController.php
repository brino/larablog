<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use App\Tag;

/**
 * Class ArticleController
 * @package App\Http\Controllers\Admin
 */
class ArticleController extends Controller
{
    /**
     * @var array
     */
    protected $categories = [];

    /**
     * @var array
     */
    protected $tags = [];

    /**
     * ArticleController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->categories = Category::all()->pluck('name','id');

        $this->tags = Tag::pluck('name','id');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index(Article $article)
    {
        //show list of articles (to edit)
//        return redirect()->route('articles');

        $info = false;
        $user = Auth::user();
//        $user->load('articles');

        if(Session::has('info'))
            $info = Session::get('info');

        if($user->super) {
            $articles = $article->latest('created_at')->paginate();
        } elseif($user->contributor) {
            $articles = $user->articles()->latest('created_at')->paginate();
        } else {
            return redirect()->route('home');
        }

        return view('admin.articles',compact('articles','info'));

    }

    /**
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(Article $article)
    {
        //shows article
        return redirect()->route('article',[$article->slug]);
    }


    /**
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Article $article)
    {

        if (Gate::denies('create-article')) {
            return redirect()->route('admin')->withErrors(['User does not have permission to create articles.']);
        }
        
        //shows create form
        //submits to store
        $categories = $this->categories;
        $tags = $this->tags;

        return view('admin.article.create',compact('article','categories','tags'));
    }

    /**
     * @param ArticleRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(ArticleRequest $request)
    {

        if (Gate::denies('create-article')) {
            abort(403);
        }
        
        if($article = Auth::user()->articles()->create($request->except('tag_list'))){

            $article->tags()->attach($request->input('tag_list'));

            return redirect()->route('article.index')->with('info','Article Created');

        }

        return back()->withErrors(['Failed to Create Article']);

    
    }

    /**
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Article $article)
    {
        //show filled form for editing existing article
        //submits to update

        $article->load('tags');
        $article->load('category');
        $article->load('user');
        
        if (Gate::denies('update-article',$article)) {
            return redirect()->route('admin')->withErrors(['User does not have permission to edit this article.']);
        }

        $categories = $this->categories;
        $tags = $this->tags;

        return view('admin.article.edit',compact('article','categories','tags'));
    }

    /**
     * @param Article $article
     * @param ArticleRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(Article $article, ArticleRequest $request)
    {
        //use submitted data to update article in db

        if (Gate::denies('update-article',$article)) {
            abort(403);
        }
        
        if($article->update($request->all())){

            return redirect()->route('article.index')->with('info','Saved Article Successfully!');

        } else {

            return back()->withErrors(['Save Failed!']);

        }
    }

    /**
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Article $article)
    {

        if (Gate::denies('update-article',$article)) {
            abort(403);
        }
        
        $article->delete();

        return redirect()->route('article.index')->with('info','Article Deleted!');
    }


}
