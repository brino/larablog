<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;

class ProfileController extends Controller
{
    public function show(User $user)
    {

        $info = false;

        if(Session::has('info'))
            $info = Session::get('info');


        if(!$user->exists) {
            $user = Auth::user();
        }

        $title = 'Profile';

        return view('profile',compact('title','user','info'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function requestApiToken() {
        $user = Auth::user();

        if(Gate::denies('contributor')) {
            return redirect()->route('profile')->withErrors(['User must be a given contributor rights to request an Api Token.']);
        }

        $user->api_token = str_random(60);
        $user->save();

        return redirect()->route('profile')->with('info','Api Token Created');
    }
}
