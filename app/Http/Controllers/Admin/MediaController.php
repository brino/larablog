<?php

namespace App\Http\Controllers\Admin;

use App\Media;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\mediaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/**
 * Class MediaController
 * @package App\Http\Controllers\Admin
 */
class MediaController extends Controller
{
    /**
     * @var array
     */
    protected $categories = [];

    /**
     * MediaController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');

        Category::all()->each(function($category){
            $this->categories[$category->id] = $category->name;
        });

    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {

        if (Gate::denies('contributor')) {
            return redirect()->route('admin')->withErrors(['User does not have permission to view medias.']);
        }

        //show list of articles (to edit)

        $info = false;

        if(Session::has('info'))
            $info = Session::get('info');

        if(Auth::user()->super) {
            $medias = Media::orderBy('created_at','asc')->paginate();
        } else {
            //show list of categories
            $medias = Auth::user()->media()->orderBy('created_at','asc')->paginate();
        }

        return view('admin.media',compact('medias','info'));

    }

    /**
     * @param Media $media
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(Media $media)
    {
        //shows article
        return redirect()->route('media',[$media->slug]);
    }

    /**
     * @param Media $media
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Media $media)
    {
        if (Gate::denies('contributor')) {
            return redirect()->route('media.index')->withErrors(['User does not have permission to create medias.']);
        }

        //shows create form
        //submits to store
        $categories = $this->categories;

        return view('admin.media.create',compact('media','categories'));
    }

    /**
     * @param mediaRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(MediaRequest $request)
    {

        if (Gate::denies('contributor')) {
            abort(403);
        }

        if($media = Media::create(array_merge($request->all(),['user_id'=>Auth::user()->id]))){

            return redirect()->route('media.index')->with('info','media Created');

        }

        return back()->withErrors(['Failed to Create media']);

    }

    /**
     * @param Media $media
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Media $media)
    {
        //show filled form for editing existing article
        //submits to update

        if (Gate::denies('update-media',$media)) {
            return redirect()->route('admin')->withErrors(['User does not have permission to edit this media.']);
        }

        $categories = $this->categories;

        return view('admin.media.edit',compact('media','categories'));
    }

    /**
     * @param Media $media
     * @param MediaRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Media $media, MediaRequest $request)
    {
        //use submitted data to update article in db

        if($media->update($request->all())){

            return redirect()->route('media.index')->with('info','Saved media Successfully!');
            
        } else {
            
            return back()->withErrors(['Save Failed!']);
            
        }
    }

    /**
     * @param Media $media
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Media $media)
    {

        if (Gate::denies('update-media',$media)) {
            abort(403);
        }
        
        $media->delete();

        return redirect()->route('media.index')->with('info','media Deleted!');
    }

    public function removeMedia(Media $media)
    {
        if(!empty($media->url))
        {
            $media->destroyFile();
            $media->url = null;

            if ($media->save())
            {
                return back()->with('info', 'Thumbnail Removed');
            }
        }

        return back()->withErrors(['thubnail'=>'Failed to remove thumbnail']);
    }

}
