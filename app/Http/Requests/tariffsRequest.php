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
                'origin' => 'required|string|alpha',
                'destiny' => 'required|string|alpha',
                'date' => ['required','date'],
                'type_equipment' => ['required','in:platform,dry box,refrigerated box,sea ​​container'],
                'rate' => ['required','numeric'],
                'collection_Address' => ['required','string']

            ];
        }   

        return [
            'type_tariff' => ['required','in:truck,train,maritime,aerial'],
            'origin' => 'required|string|alpha',
            'destiny' => 'required|string|alpha',
            'date' => ['required','date'],
            'min_weight' => ['required','numeric','min:1'],
            'max_weight' => ['required','numeric','max:999999'],
            'type_weight' => ['required','in:kg,lb'],
            'distance' => ['required','numeric'],
            'type_equipment' => ['required','in:platform,dry box,refrigerated box,sea ​​container'],
            'rate' => ['required','numeric'],
            'collection_Address' => ['required','string']

        ];
    }

     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     *
    public function messages()
    {
        return [
            
        ];
    }*/
}
