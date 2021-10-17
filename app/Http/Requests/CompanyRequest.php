<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'company_name'    => ['required', 'string', 'max:60','min:3'],
            'company_address' => ['required', 'string', 'max:250','min:4'],
            'zip_code'        => ['required', 'string', 'max:10'],
            'city'            => ['required', 'string', 'max:50'],
            'state'           => ['required', 'string', 'max:3'],
            'country'         => ['required', 'string', 'max:2'],
            'usdot'         => ['string', 'max:50'],
            'mc_mx'         => ['string', 'max:50'],
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
            'required'              => 'Este campo es requerido.',
            'company_name.max'      => 'Máximo 60 caracteres.',
            'company_address.max'   => 'Máximo 250 caracteres.',
            'zip_code.max'          => 'Máximo 10 caracteres.',
            'city.max'              => 'Máximo 50 caracteres.',
            'state.max'             => 'Máximo 3 caracteres.',
            'country.max'           => 'Máximo 2 caracteres.',
            'company_name.min'      => 'Mínimo 3 caracteres.',
            'company_address.min'   => 'Mínimo 4 caracteres.',
            'usdot.max'             => 'Máximo 50 caracteres.',
            'mc_mx.max'             => 'Máximo 50 caracteres.',
        ];
    }
}
