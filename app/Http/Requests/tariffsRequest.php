<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use CountryState;

class tariffsRequest extends FormRequest
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
            'type_tariff'       => ['required','in:TRUCK,TRAIN,MARITIME,AERIAL'],
            'origin'            => 'required|regex:/^[\pL\s\-]+$/u|max:50',
            'origin_country'    => ['required',Rule::in($countries)],
            'origin_state'      => 'required|string|max:3',
            'destiny'           => 'required|regex:/^[\pL\s\-]+$/u|max:50',
            'destiny_country'   => ['required',Rule::in($countries)],
            'destiny_state'     => 'required|string|max:3',
            'approx_weight'     => ['required','numeric','min:1','max:500000'],
            'type_weight'       => ['required','in:kg,lb'],
            'distance'          => ['numeric','nullable','max:10000000','min:0'],
            'rate'              => ['required','numeric','max:10000000','min:1'],
            'currency'          => ['required','in:USD,MXN'],
            'extra'             => ['required','string','max:25'],
            'end_date'        => 'required|date|after:yesterday'

        ];

        if ($this->request->get('type_tariff') == 'TRUCK') {
            $rules['type_equipment'] = ['required','in:Dry Box 48 ft,Dry Box 53 ft,Refrigerated Box 53 ft,Plataform 48 ft,Plataform 53 ft,Container 20 ft,Container 40 ft,Container 40 ft High cube'];                            
        }

        if ($this->request->get('type_tariff') == 'TRAIN') {
            $rules['type_equipment'] = 
            ['required','in:Dry Box 53 ft,Container 20 ft,Container 40 ft,Container 40 ft High cube'];                            
        }

        if ($this->request->get('type_tariff') == 'MARITIME') {
            $rules['type_equipment']    = ['required','in:,Container 20 ft,Container 40 ft,Container 40 ft High cube'];
            $rules['approx_weight']     = 'nullable';
            $rules['type_weight']       = 'nullable'; 
            $rules['distance']          = 'nullable';                             
        }

        if ($this->request->get('type_tariff') == 'AERIAL') {
            $rules['type_equipment']    = ['required','in:Box,Package,Pallet'];
            $rules['distance']          = 'nullable';
            $rules['height']            = ['required','numeric','min:1','max:100'];
            $rules['width']             = ['required','numeric','min:1','max:100'];  
            $rules['length']            = ['required','numeric','min:1','max:100'];                              
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

            'required'              => 'Este campo es requerido.',
            'origin.regex'          => 'Solo caracteres alfabéticos.',
            'destiny.regex'         => 'Solo caracteres alfabéticos.',
            'in'                    => 'Valor inválido.',
            'origin.max'            => 'Máximo 50 caracteres',
            'destiny.max'           => 'Máximo 50 caracteres',
            'distance.max'          => 'Máximo 10,000,000 (campo opcional)',
            'rate.max'              => 'Excede limite permitido',
            'approx_weight.max'     => 'El peso máximo es de 500,000'
        ];
    }
}
