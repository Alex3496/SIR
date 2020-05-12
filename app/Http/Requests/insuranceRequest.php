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
            'name_insurance' => ['string','max:150','nullable'],
            'contact_name' => ['string','max:150','nullable'],
            
            'general_liability_ins' => ['boolean'],
            'commercial_general_liability' => ['boolean'],
            'auto_liability' => ['boolean'],
            'motor_truck_cargo' => ['boolean'],
            'trailer_interchange' => ['boolean'],

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
            //
        ];
    }
}
