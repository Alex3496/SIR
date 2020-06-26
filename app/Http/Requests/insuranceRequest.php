<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class insuranceRequest extends FormRequest
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
            'name_insurance'        => ['string','max:60','nullable'],
            'contact_name'          => ['string','max:50','nullable'],
            
            'general_liability_ins' => ['boolean'],
            'auto_liability'        => ['boolean'],
            'motor_truck_cargo'     => ['boolean'],
            'trailer_interchange'   => ['boolean'],
            'commercial_general_liability' => ['boolean'],

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
            'name_insurance.max' => 'Máximo 60 caracteres.',
            'contact_name.max'   => 'Máximo 50 caracteres.',
        ];
    }
}
