<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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

        $rules = [
            'type_tariff' => ['required','in:truck,train,maritime,aerial'],
            'origin' => 'required|regex:/^[\pL\s\-]+$/u',
            'destiny' => 'required|regex:/^[\pL\s\-]+$/u',
            'min_weight' => ['required','numeric','min:1'],
            'max_weight' => ['required','numeric','max:999999'],
            'type_weight' => ['required','in:kg,lb'],
            'distance' => ['required','numeric'],
            'rate' => ['required','numeric'],

        ];

        if ($this->request->get('type_tariff') == 'truck') {
            $rules['type_equipment'] = ['required','in:Dry Box 48 ft,Dry Box 53 ft,Refrigerated Box 53 ft,ft,Plataform 48 ft,Plataform 53 ft'];                            
        }

        if ($this->request->get('type_tariff') == 'train') {
            $rules['type_equipment'] = 
            ['required','in:Dry Box 53 ft,Container 20 ft,Container 40 ft,Container 40 ft High cube'];                            
        }

        if ($this->request->get('type_tariff') == 'maritime') {
            $rules['type_equipment'] = ['required','in:,Container 20 ft,Container 40 ft,Container 40 ft High cube'];
            $rules['min_weight'] = 'nullable';
            $rules['max_weight'] = 'nullable';
            $rules['type_weight'] = 'nullable'; 
            $rules['distance'] = 'nullable';                             
        }

        if ($this->request->get('type_tariff') == 'aerial') {
            $rules['type_equipment'] = ['required','in:Box,Package,Pallet'];
            $rules['distance'] = 'nullable';
            $rules['height'] = ['required','numeric','min:1','max:100'];
            $rules['width'] = ['required','numeric','min:1','max:100'];  
            $rules['length'] = ['required','numeric','min:1','max:100'];                              
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
            'origin.regex' => 'Only letters',
            'destiny.regex' => 'Only letters',
            'destiny.required' => 'This field is required',
            'min_weight.required' => 'This field is required',
            'max_weight.required' => 'This field is required',
            'type_weight.required' => 'This field is required',
            'distance.required' => 'This field is required',
            'type_equipment.required' => 'This field is required',
            'rate.required' => 'This field is required',
            'type_equipment.in' => 'Invalid value',
        ];
    }
}
