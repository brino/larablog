<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
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

    public function index()
    {
        $info = false;

        if(Session::has('info'))
            $info = Session::get('info');

        //show list of categories
        $categories = Category::orderBy('created_at','asc')->paginate();

        return view('admin.categories',compact('categories','info'));
    }

    public function show(Category $category)
    {
        //show a single category
        dd($category);
    }

    public function create()
    {
        //show the creation form and post to store()
        
        $info = false;
        
        return view('admin.category.create',compact('info'));
    }

    public function store(CategoryRequest $request)
    {
        //process the create form ... and store in db

        if (Gate::denies('create-category')) {
            abort(403);
        }

        if($article = Category::create($request->all())){

            return redirect()->route('admin.category.index')->with('info','Category Created');

        }

        return back()->withErrors(['Failed to Create Article']);
    }

    public function edit(Category $category)
    {
        $info = false;

        //show edit form and post to update()
        return view('admin.category.edit',compact('info','category'));
    }

    public function update(Category $category, CategoryRequest $request)
    {
        //process edit form ... and update db

        if (Gate::denies('update-category')) {
            abort(403);
        }

        if($category->update($request->all())){

            return redirect()->route('admin.category.index')->with('info','Saved Category Successfully!');

        } else {

            return back()->withErrors(['Save Failed!']);

        }

    }

    public function destroy(Category $category)
    {
        //nuke the model
        if (Gate::denies('update-category')) {
            abort(403);
        }

        $category->delete();

        return redirect()->route('admin.category.index')->with('info','Category Deleted!');
    }
}
