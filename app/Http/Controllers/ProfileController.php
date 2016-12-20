<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        if(!$user->exists) {
            $user = Auth::user();
        }

//        $user = Auth::user();
        return view('profile',compact('user'));
    }
}
