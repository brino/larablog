<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Tag;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\TagRequest;

/**
 * Class TagController
 * @package App\Http\Controllers\Admin
 */
class TagController extends Controller
{
    /**
     * TagController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        //show list of articles (to edit)

        $info = false;

        if(Session::has('info'))
            $info = Session::get('info');

        //show list of tags
        $tags = Tag::orderBy('created_at','asc')->paginate();

        $tags->load('articles');

        $title = 'tags';

        return view('admin.tags',compact('title','tags','info'));

    }

    /**
     * @param Tag $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(Tag $tag)
    {
        //shows article
        return redirect()->route('tag.show',[$tag->slug]);
    }

    /**
     * @param Tag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Tag $tag)
    {
        if (Gate::denies('contributor')) {
            return redirect()->route('tag.index')->withErrors(['User does not have permission to create articles.']);
        }

        //shows create form
        //submits to store

        $title = 'Create Tag';

        return view('admin.tag.create',compact('title','tag'));
    }

    /**
     * @param TagRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(TagRequest $request)
    {

        if (Gate::denies('contributor')) {
            abort(403);
        }

        if($tag = Tag::create($request->all())){

            return redirect()->route('tag.index')->with('info','Tag Created');

        }

        return back()->withErrors(['Failed to Create Tag']);

    }

    /**
     * @param Tag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Tag $tag)
    {
        //show filled form for editing existing article
        //submits to update

        if (Gate::denies('contributor')) {
            return redirect()->route('tag.index')->withErrors(['User does not have permission to edit this tag.']);
        }

        $title = 'Edit Tag';

        return view('admin.tag.edit',compact('title','tag'));
    }

    /**
     * @param Tag $tag
     * @param TagRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Tag $tag, TagRequest $request)
    {
        //use submitted data to update article in db

        if (Gate::denies('contributor')) {
            abort(403);
        }

        if($tag->update($request->all())){

            return redirect()->route('tag.index')->with('info','Saved Tag Successfully!');

        } else {

            return back()->withErrors(['Save Failed!']);

        }
    }

    /**
     * @param Tag $tag
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Tag $tag)
    {

        if (Gate::denies('super')) {
            abort(403);
        }

        $tag->delete();

        return redirect()->route('tag.index')->with('info','Tag Deleted!');
    }

}
