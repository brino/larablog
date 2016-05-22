<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class PhotosController
 * @package App\Http\Controllers
 */
class PhotosController extends Controller
{
    
    /**
     * @param Photo $photo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Photo $photo)
    {
        $photos = $photo->all();

        return view('photos',compact('photos'));
    }

    /**
     * @param Photo $photo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Photo $photo)
    {
        return view('photo.show',compact('photo'));
    }
}
