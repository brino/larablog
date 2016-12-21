<?php

namespace App\Http\Controllers\Api;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserArticleController extends Controller
{
    public function index(Article $article, Request $request)
    {
        $user = Auth::guard('api')->user();

        $articles = $article->search($request->input('query'))->where('user.id',$user->id)->where('published',1)->paginate();

        $articles->transform(function ($item) {
            unset($item->id);
            unset($item->user->id);
            unset($item->category->id);
            return $item;
        });

        return $articles;
    }
}
