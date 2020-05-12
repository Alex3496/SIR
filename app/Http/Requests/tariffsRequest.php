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
        if ($this->request->get('type_tariff') == 'maritime') {  
          return [
                'type_tariff' => ['required','in:truck,train,maritime,aerial'],
                'origin' => 'required|regex:/^[\pL\s\-]+$/u',
                'destiny' => 'required|regex:/^[\pL\s\-]+$/u',
               //'date' => ['required','date'],
                'type_equipment' => ['required','in:platform,dry box,refrigerated box,sea ​​container'],
                'rate' => ['required','numeric'],

            ];
        }   

        return [
            'type_tariff' => ['required','in:truck,train,maritime,aerial'],
            'origin' => 'required|regex:/^[\pL\s\-]+$/u',
            'destiny' => 'required|regex:/^[\pL\s\-]+$/u',
            //'date' => ['required','date'],
            'min_weight' => ['required','numeric','min:1'],
            'max_weight' => ['required','numeric','max:999999'],
            'type_weight' => ['required','in:kg,lb'],
            'distance' => ['required','numeric'],
            'type_equipment' => ['required','in:platform,dry box,refrigerated box,sea ​​container'],
            'rate' => ['required','numeric'],

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
            'origin.regex' => 'Only letters',
            'destiny.regex' => 'Only letters',
            'destiny.required' => 'This field is required',
            'min_weight.required' => 'This field is required',
            'max_weight.required' => 'This field is required',
            'type_weight.required' => 'This field is required',
            'distance.required' => 'This field is required',
            'type_equipment.required' => 'This field is required',
            'rate.required' => 'This field is required',
        ];
    }
}
