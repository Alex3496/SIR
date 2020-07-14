<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformationRequest extends FormRequest
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
            'name'      => 'required|string|max:25',
            'lastName'  => 'required|string|max:25',
            'email'     => 'required|email|max:35',
            'phone'     => 'nullable|numeric|digits_between :7,12',
            'message'   => 'required|string|max:300',
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
            'required'      => 'Este campo es requerido.',
            'name.max'      => 'Máximo 25 caracteres.',
            'lastName.max'  => 'Máximo 25 caracteres.',
            'email.max'     => 'Máximo 35 caracteres.',
            'phone.max'     => 'Máximo 12 dígitos.',
            'message.max'   => 'Máximo 300 caracteres.',
            'digits_between'=> 'El numero telefonico debe de tener entre 7 y 12 digitos',
        ];
    }
}
