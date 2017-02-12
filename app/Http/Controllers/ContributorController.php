<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;

class ContributorController extends Controller
{
    public function index()
    {
        $contributors = User::where('contributor',true)->orderBy('name','asc')->paginate(10);

        $categories = Category::all();

        $contributors->load('media');
        $contributors->load('articles');

        return view('contributors',compact('contributors','categories'));
    }

}
