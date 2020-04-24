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
        return [
            'origin' => 'required|string|alpha',
            'destiny' => 'required|string',
            'date' => ['required','date'],
            'weight' => ['required','numeric'],
            'distance' => ['required','numeric'],
            'type_equipment' => ['required','in:platform,dry box,refrigerated box,sea ​​container']

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
