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
        return [
            'type_tariff' => 'required|in:TRUCK,TRAIN,MARITIME,AERIAL',
            'location_origin' => 'required|string|max:100',
            'location_destiny' =>'required|string|max:100',
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
            'type_tariff.required' => 'Selecciona una opción',
            'type_tariff.in' => 'Selecciona una opción valida',
            'location_origin.required' => 'No dejes el campo vacio',
            'location_destiny.required' => 'No dejes el campo vacio',

        ];
    }
}
