<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
     * if user injects fields in html, apply rules
     * @return array
     */
    public function rules()
    {
        $rules = [];

        if ($this->request->has('name') ) {
            $rules['name'] = ['required','string','max:50'];                           
        }

        if ($this->request->has('phone')) {
            $rules['phone'] = ['required','numeric','digits_between :7,12'];                           
        }

        if ($this->request->has('email')) {
            $rules['email'] = ['required','email','unique:users'];                           
        }

        if ($this->request->has('position')) {
            $rules['position'] = ['required', 'string', 'max:120'];                          
        }

        //dd($rules);

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
            'required'                => 'Este campo es requerido.',
            'numeric'                 => 'El valor debe ser numérico.',
            'phone.digits_between'    => 'El campo teléfono debe de tener de 7 a 12 dígitos.',
            'email.unique'            => 'El email ya está registrado.',
            'name.max'                => 'Máximo 50 caracteres',
            'position.max'            => 'Máximo 120 caracteres',
        ];
    }
}
