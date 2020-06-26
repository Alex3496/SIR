<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
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
            'city'      => 'required|string|max:50',
            'state'     => 'required|string|max:3',
            'country'   => 'required|string|max:3',
            'status'    => 'required|in:ACCEPTED,PENDING,REJECTED'     
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
            'in'            => 'Valor inválido.',
            'city.max'      => 'Máximo 50 caracteres.'
        ];
    }
}
