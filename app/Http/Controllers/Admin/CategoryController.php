<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

/**
 * Class CategoryController
 * @package App\Http\Controllers\Admin
 */
class CategoryController extends Controller
{

    /**
     * CategoryController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $info = false;

        if(Session::has('info'))
            $info = Session::get('info');

        //show list of categories
        $categories = Category::orderBy('created_at','asc')->paginate();

        $categories->load('articles','media');

        $title = 'Categories';

        return view('admin.categories',compact('title','categories','info'));
    }

    /**
     * @param Category $category
     */
    public function show(Category $category)
    {
        //show a single category
        dd($category);
    }

    /**
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        if (Gate::denies('super')) {
            return redirect()->route('category.index')->withErrors(['User does not have permission to create categories.']);
        }

        //show the creation form and post to store()
        
        $info = false;

        $title = 'Create Category';

        return view('admin.category.create',compact('title','info'));
    }

    /**
     * @param CreateCategoryRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(CreateCategoryRequest $request)
    {
        //process the create form ... and store in db
        if($article = Category::create($request->all())){
            return redirect()->route('category.index')->with('info','Category Created');
        }

        return back()->withErrors(['Failed to Create Article']);
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category)
    {
        if (Gate::denies('super')) {
            return redirect()->route('category.index')->withErrors(['User does not have permission to edit categories.']);
        }

        $info = false;

        if(Session::has('info'))
            $info = Session::get('info');

        $title = 'Edit Category';

        //show edit form and post to update()
        return view('admin.category.edit',compact('title','info','category'));
    }

    /**
     * @param Category $category
     * @param UpdateCategoryRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Category $category, UpdateCategoryRequest $request)
    {
        if($request->hasFile('thumbnail') && !empty($category->thumbnail)) {
            //must delete old image
            $category->destroyThumbnail();
        }

        //process edit form ... and update db
        if($category->update($request->all())){
            return redirect()->route('category.index')->with('info','Saved Category Successfully!');
        } else {
            return back()->withErrors(['Save Failed!']);
        }
    }

    /**
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        //nuke the model
        if (Gate::denies('super')) {
            abort(403);
        }

        $category->delete();

        return redirect()->route('category.index')->with('message','Category Deleted!');
    }
}
