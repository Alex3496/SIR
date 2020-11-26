<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchTeariffsRequest extends FormRequest
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
            'location_origin'   => 'required|string|max:100',
            'location_destiny'  => 'required|string|max:100|different:location_origin',
            'tpye_equipment'    => 'required|in:Any,Dry Box,Refrigerated,Plataform,Container,Box,Package,Pallet'
        ];

        if(!$this->request->get('Peticion')){
            $rules['type_tariff'] = 'required|in:TRUCK,TRAIN,MARITIME,AERIAL';
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
            'in'            => 'Valor inválido.',
            'max'           => 'Máximo 100 caracteres',
            'different'     => 'No pueden ser iguales'

        ];
    }
}
