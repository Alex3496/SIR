<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use CountryState;

class PetitionRequest extends FormRequest
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
        $countries = CountryState::getCountries();
        $countries = array_keys($countries);

        $rules = [
            'origin'            => 'required|regex:/^[\pL\s\-]+$/u|max:50',
            'origin_country'    => ['required',Rule::in($countries)],
            'origin_state'      => 'required|string|max:3',
            'destiny'           => 'required|regex:/^[\pL\s\-]+$/u|max:50',
            'destiny_country'   => ['required',Rule::in($countries)],
            'destiny_state'     => 'required|string|max:3',
            'approx_weight'     => ['required','numeric','min:1','max:80000'],
            'type_weight'       => ['required','in:kg,lb'],
            'rate'              => ['required','numeric','max:10000000','min:1'],
            'currency'          => ['required','in:USD,MXN'],
            'type_equipment'    => ['required','in:Dry Box 48 ft,Dry Box 53 ft,Refrigerated Box 53 ft,Plataform 48 ft,Plataform 53 ft,Container 20 ft,Container 40 ft,Container 40 ft High cube,Box,Package,Pallet'],
            'extra'             => ['required','string','max:25'],

        ];
                           
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

            'required'              => 'Este campo es requerido.',
            'origin.regex'          => 'Solo caracteres alfabéticos.',
            'destiny.regex'         => 'Solo caracteres alfabéticos.',
            'in'                    => 'Valor inválido.',
            'origin.max'            => 'Máximo 50 caracteres',
            'destiny.max'           => 'Máximo 50 caracteres',
            'distance.max'          => 'Máximo 10,000,000 (campo opcional)',
            'rate.max'              => 'Excede limite permitido',
            'approx_weight.max'     => 'El peso máximo es de 80,000',
            'extra.max'             => 'Máximo 25 caracteres'
        ];
    }
}
