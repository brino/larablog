<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Gate;

class ArticleRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('contributor');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'summary' => 'required',
            'category_id' => 'required',
            'slug' => 'required',
            'published_at' => 'required',
            'body' => 'required'
        ];
    }

    public function forbiddenResponse()
    {
        //return parent::forbiddenResponse(); // Change the autogenerated stub

        return response()->view('errors.403');
    }
}
