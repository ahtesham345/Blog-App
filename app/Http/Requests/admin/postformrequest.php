<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class postformrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'category_id' => [
                'integer',
                'required'
            ],
            'name' => [
                'required',
                'string'
            ],
            'slug' => [
                'required',
                'string',
                'max:200'
            ],
            'description' => [
              'required',
            ],
            'yt_iframe' => [
              'nullable',
              'string'

            ],
            'meta_title' => [
              'required',
              'string',
              'max:200'
            ],
            'meta_keyword' => [
              'nullable',
              'string'
            ],
            'meta_description' => [
              'nullable',
              'string'
            ],
            'status' => [
              'nullable'

            ],
        ];
        return $rules;
    }
}
