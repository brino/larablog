<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;


class CreateUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('update-user',Auth::user());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.request()->route('user')->id,
            'bio' => 'string',
            'password' => 'string',
            'avatar' => 'image',
            'old_password' => 'string',
        ];
    }
}
