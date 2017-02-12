<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

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

        if (Gate::denies('super')) {
            return redirect()->route('admin')->withErrors(['User does not have permission to list users.']);
        }

        $info = false;

        if(Session::has('info'))
            $info = Session::get('info');

        //show list of tags
        $users = User::orderBy('created_at','asc')->paginate();

        $users->load('articles','media');

        return view('admin.users',compact('users','info'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(User $user)
    {
        return redirect()->route('user.edit',[$user]);
    }

    /**
     * @param User $user
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(User $user)
    {

        if (Gate::denies('super')) {
            return redirect()->route('admin')->withErrors(['User does not have permission to create users.']);
        }

        return view('admin.user.create',compact('user'));
        
    }

    /**
     * @param CreateUserRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(CreateUserRequest $request)
    {

        if (Gate::denies('super')) {
            abort(403);
        }

        if($user = User::create($request->all())){

            return redirect()->route('user.index')->with('info','User Created');

        }

        return back()->withErrors(['Failed to Create User']);
    }

    /**
     * @param User $user
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        if (Gate::denies('update-user',$user)) {
            return redirect()->route('admin')->withErrors(['User does not have permission to edit this user.']);
        }

        return view('admin.user.edit',compact('user'));
    }

    /**
     * @param User $user
     * @param UpdateUserRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(User $user, UpdateUserRequest $request)
    {
        if($request->has('new_password')) {
            $user->password = $request->input('new_password');
            $user->save();
        }

        if($user->update($request->except('new_password'))) {

            $route = 'profile';

            if(Auth::user()->super) {
                $route = 'user.index';
            }

            return redirect()->route($route)->with('info','Saved User Successfully!');

        } else {

            return back()->withErrors(['Save Failed!']);

        }
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {

        if (Gate::denies('update-user',$user)) {
            abort(403);
        }

        $user->delete();

        return redirect()->route('user.index')->with('info','User Deleted!');
    }

}
