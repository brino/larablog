<?php

namespace App\Http\Controllers;

use App\Media;

/**
 * Class MediaController
 * @package App\Http\Controllers
 */
class MediaController extends Controller
{
    
    /**
     * @param Media $media
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Media $media)
    {
        $medias = $media->paginate(12);

        $title = 'Media';

        return view('media',compact('title','medias'));
    }

    /**
     * @param Media $media
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Media $media)
    {
        $media->viewed();
        return view('media.show',compact('media'));
    }
}
