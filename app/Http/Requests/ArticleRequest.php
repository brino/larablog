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
            'title' => 'required|string',
            'summary' => 'required|string',
            'category_id' => 'required|integer',
//            'slug' => 'required|string',
            'published_at' => 'required|date',
            'body' => 'required|string',
            'banner' => 'image',
            'thumbnail' => 'image',
        ];
    }
}
