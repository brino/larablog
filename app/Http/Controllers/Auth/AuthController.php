<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

//    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    use AuthenticatesAndRegistersUsers {showRegistrationForm as traitShowRegistrationForm;}
    use ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);

    }

    public function showRegistrationForm(){
        if(env('APP_REGISTER',false)==false){
            return redirect('/')->withErrors(['User Registration Disabled']);
        }
        return $this->traitShowRegistrationForm();
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * @param array $data
     * @return static
     * @throws AuthorizationException
     */
    protected function create(array $data)
    {
        if(env('APP_REGISTER',false)){
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
            ]);
        } else {
            //throw new AuthorizationException('User Registration Disabled');
            abort(403);
        }
    }
}
