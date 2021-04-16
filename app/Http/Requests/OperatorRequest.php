<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OperatorRequest extends FormRequest
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
        return [
            'name'          => 'required|string|max:50',
            'last_name'     => 'required|string|max:25',
            'license'       => 'required|string|max:15',
            'visa'          => 'required|string|max:15',
            'fast'          => 'required|string|max:15',
            'unique_badge'  => 'required|string|max:15',
            'r_control'     => 'required|string|max:15',

        ];
    }

     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required'          => 'Este campo es requerido.',
            'last_name.max'     => 'Máximo 25 caracteres.',
            'license.max'       => 'Máximo 15 caracteres.',
            'visa.max'          => 'Máximo 15 caracteres.',
            'fast.max'          => 'Máximo 15 caracteres.',
            'unique_badge.max'  => 'Máximo 15 caracteres.',
            'r_control.max'     => 'Máximo 15 caracteres.',
            'name.max'          => 'Máximo 50 caracteres.',
        ];
    }
}
