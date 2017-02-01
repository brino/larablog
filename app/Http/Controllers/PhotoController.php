<?php

namespace App\Http\Controllers;

use App\Photo;

/**
 * Class PhotoController
 * @package App\Http\Controllers
 */
class PhotoController extends Controller
{
    
    /**
     * @param Photo $photo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Photo $photo)
    {
        $photos = $photo->paginate(16);

        return view('photos',compact('photos'));
    }

    /**
     * @param Photo $photo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Photo $photo)
    {
        $photo->viewed();
        return view('photo.show',compact('photo'));
    }
}
