<?php

namespace App\Http\Controllers\Admin;

use App\Photo;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\PhotoRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/**
 * Class PhotoController
 * @package App\Http\Controllers\Admin
 */
class PhotoController extends Controller
{
    /**
     * @var array
     */
    protected $categories = [];

    /**
     * PhotoController constructor.
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
        //show list of articles (to edit)

        $info = false;

        if(Session::has('info'))
            $info = Session::get('info');

        //show list of categories
        $photos = Photo::orderBy('created_at','asc')->paginate();

        return view('admin.photos',compact('photos','info'));

    }

    /**
     * @param Photo $photo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(Photo $photo)
    {
        //shows article
        return redirect()->route('photo',[$photo->slug]);
    }

    /**
     * @param Photo $photo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Photo $photo)
    {
        if (Gate::denies('create-photo')) {
            return redirect()->route('admin')->withErrors(['User does not have permission to create articles.']);
        }

        //shows create form
        //submits to store
        $categories = $this->categories;

        return view('admin.photo.create',compact('photo','categories'));
    }

    /**
     * @param PhotoRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(PhotoRequest $request)
    {

        if (Gate::denies('create-photo')) {
            abort(403);
        }

        if($photo = Photo::create(array_merge($request->all(),['user_id'=>Auth::user()->id]))){

            return redirect()->route('admin')->with('info','Photo Created');

        }

        return back()->withErrors(['Failed to Create Photo']);

    }

    /**
     * @param Photo $photo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Photo $photo)
    {
        //show filled form for editing existing article
        //submits to update

        if (Gate::denies('update-photo',$photo)) {
            return redirect()->route('admin')->withErrors(['User does not have permission to edit this photo.']);
        }

        $categories = $this->categories;

        return view('admin.photo.edit',compact('photo','categories'));
    }

    /**
     * @param Photo $photo
     * @param PhotoRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Photo $photo, PhotoRequest $request)
    {
        //use submitted data to update article in db

        if (Gate::denies('update-photo',$photo)) {
            abort(403);
        }

        if($photo->update($request->all())){

            if ($request->hasFile('url')) {

                $photo->url = $this->uploadImage($request->file('url'));
                if(!empty($photo->url)) {
                    $photo->save();
                }
            }

            return redirect()->route('photo.index')->with('info','Saved Photo Successfully!');
            
        } else {
            
            return back()->withErrors(['Save Failed!']);
            
        }
    }

    /**
     * @param Photo $photo
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Photo $photo)
    {

        if (Gate::denies('update-photo',$photo)) {
            abort(403);
        }
        
        $photo->delete();

        return redirect()->route('photo.index')->with('info','Photo Deleted!');
    }

}
