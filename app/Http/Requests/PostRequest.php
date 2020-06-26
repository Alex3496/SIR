<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'category_id'   => 'required|integer',
            'title'         => 'required',
            'excerpt'       => 'required', 
            'body'          => 'required',
            'tags'          => 'required|array',
        ];

        if ($this->request->get('image')) {
            $rules['image'] = ['mimes:jpg,jpeg,png'];                            
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required'      => 'Este campo es requerido.',
        ];
    }
}
