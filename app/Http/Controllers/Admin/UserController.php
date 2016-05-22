<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Gate;

/**
 * Class UserController
 * @package App\Http\Controllers\Admin
 */
class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $info = false;

        if(Session::has('info'))
            $info = Session::get('info');

        //show list of tags
        $users = User::orderBy('created_at','asc')->paginate();

        return view('admin.users',compact('users','info'));
    }

    public function show(User $user)
    {
        return redirect()->route('admin.user.edit',[$user]);
    }
    
    public function create(User $user)
    {

        if (Gate::denies('create-user')) {
            return redirect()->route('admin')->withErrors(['User does not have permission to create users.']);
        }

        return view('admin.user.create',compact('user'));
        
    }

    public function store(UserRequest $request)
    {

        if (Gate::denies('create-user')) {
            abort(403);
        }

        if($user = User::create($request->all())){

            return redirect()->route('admin.user.index')->with('info','User Created');

        }

        return back()->withErrors(['Failed to Create User']);
    }

    public function edit(User $user)
    {
        if (Gate::denies('update-user',$user)) {
            return redirect()->route('admin')->withErrors(['User does not have permission to edit this user.']);
        }

        return view('admin.user.edit',compact('user'));
    }

    public function update(User $user, UserRequest $request)
    {
        if (Gate::denies('update-user',$user)) {
            abort(403);
        }

        if($request->input('password')->isEmpty()){
            $requestVars = $request->except('password');
        } else {
            $requestVars = $request->all();
        }

        if($user->update($requestVars)){

            return redirect()->route('admin.user.index')->with('info','Saved User Successfully!');

        } else {

            return back()->withErrors(['Save Failed!']);

        }
    }

    public function destroy(User $user)
    {

        if (Gate::denies('update-user',$user)) {
            abort(403);
        }

        $user->delete();

        return redirect()->route('admin.user.index')->with('info','User Deleted!');
    }

}
