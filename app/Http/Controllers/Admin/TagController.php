<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
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

        return view('admin.tags',compact('tags','info'));

    }

    /**
     * @param Tag $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(Tag $tag)
    {
        //shows article
        return redirect()->route('tag',[$tag->slug]);
    }

    /**
     * @param Tag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Tag $tag)
    {
        if (Gate::denies('create-tag')) {
            return redirect()->route('admin')->withErrors(['User does not have permission to create articles.']);
        }

        //shows create form
        //submits to store

        return view('admin.tag.create',compact('tag'));
    }

    /**
     * @param TagRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(TagRequest $request)
    {

        if (Gate::denies('create-tag')) {
            abort(403);
        }

        if($tag = Tag::create($request->all())){

            return redirect()->route('admin')->with('info','Tag Created');

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

        if (Gate::denies('update-tag',$tag)) {
            return redirect()->route('admin')->withErrors(['User does not have permission to edit this tag.']);
        }

        return view('admin.tag.edit',compact('tag'));
    }

    /**
     * @param Tag $tag
     * @param TagRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Tag $tag, TagRequest $request)
    {
        //use submitted data to update article in db

        if (Gate::denies('update-tag',$tag)) {
            abort(403);
        }

        if($tag->update($request->all())){

            return redirect()->route('admin.tag.list')->with('info','Saved Tag Successfully!');

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

        if (Gate::denies('update-tag',$tag)) {
            abort(403);
        }

        $tag->delete();

        return redirect()->route('admin.tag.index')->with('info','Tag Deleted!');
    }

}
