<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'published_at' => 'required',
            'title' => 'required',
            'content' => 'required'
        ];
    }
}
