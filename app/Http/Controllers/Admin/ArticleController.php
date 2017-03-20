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
     * @param Article $article
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Article $article)
    {
        $info = false;
        $user = Auth::user();

        if(Session::has('info'))
            $info = Session::get('info');

        if($user->super) {
            $articles = $article->latest('created_at')->paginate();
        } elseif($user->contributor) {
            $articles = $user->articles()->latest('created_at')->paginate();
        } else {
            return redirect()->route('admin')->withErrors(['User does not have permission to view articles']);
        }

        $title = 'Articles';

        return view('admin.articles',compact('title','articles','info'));

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
        if (Gate::denies('contributor')) {
            return redirect()->route('admin')->withErrors(['User does not have permission to create articles.']);
        }
        
        //shows create form
        //submits to store
        $categories = $this->categories;
        $tags = $this->tags;

        $title = 'Create Article';

        return view('admin.article.create',compact('title','article','categories','tags'));
    }

    /**
     * @param ArticleRequest $request
     * @param Article $article
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(ArticleRequest $request, Article $article)
    {
        if($article = Auth::user()->articles()->create($request->except('tag_list'))){

            $article->tags()->attach($request->input('tag_list'));

            $article->load('user');
            $article->load('category');
            $article->load('tags');
            $article->searchable(); //so that scout indexes the relations

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

        $title = 'Edit Article';

        return view('admin.article.edit',compact('title','article','categories','tags'));
    }

    /**
     * @param Article $article
     * @param ArticleRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Article $article, ArticleRequest $request)
    {

        try {
            $article->update($request->all());
            $article->tags()->sync($request->input('tag_list'));

            $article->load('user');
            $article->load('category');
            $article->load('tags');
            $article->searchable(); //so that scout indexes the relations


        } catch (\Exception $e) {
            return back()->withErrors(['Save Failed!']);
        }

        return redirect()->route('article.index')->with('info','Saved Article Successfully!');
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

    /**
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeBanner(Article $article)
    {
        $article->destroyBanner();

        return back()->with('info','Banner Removed');
    }

    /**
     * @param Article $article
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function removeThumbnail(Article $article)
    {
        if(!empty($article->thumbnail))
        {
            $article->destroyThumbnail();
            $article->thumbnail = null;

            if ($article->save())
            {
                return back()->with('info', 'Thumbnail Removed');
            }
        }

        return back()->withErrors(['thubnail'=>'Failed to remove thumbnail']);
    }
}
