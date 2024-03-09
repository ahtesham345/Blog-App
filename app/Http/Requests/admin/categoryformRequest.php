<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class categoryformRequest extends FormRequest
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
            'name' => [
                'string',
                'max:200'
            ],
            'name' => [
                'required',
                'string',
                'max:200'
            ],
            'slug' => [
                'required',
                'string',
                'max:200'
            ],
            'description' => [
              'required',
            ],
            'image' => [
              'required',
              'mimes:jpg,jpeg,png'
            ],
            'meta-title' => [
              'required',
              'string',
              'max:200'
            ],
            'meta-keyword' => [
              'required',
              'string'
            ],
            'meta-description' => [
              'required',
              'string'
            ],
            'navbar-status' => [
              'nullable'

            ],
            'status' => [
              'nullable'

            ],
        ];
        return $rules;
    }
}
