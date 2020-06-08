<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class datasetRequest extends FormRequest
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
            'dba_name' => ['string','max:60','nullable'],
            'scac_code' => ['string','max:10','nullable'],
            'caat' => ['string','max:35','nullable'],
            'mc_number' => ['string','max:35','nullable'],
            'num_trucks' => ['numeric','max:50000','nullable'],
            
            'certificate_ctpat' => ['string','max:250','nullable'],
            'certificate_oae' => ['string','max:250','nullable'],
            'fast' => ['string','max:250','nullable'],

            'warehouse' => ['string','max:250','nullable'],
            'fiscal_warehouse' => ['string','max:250','nullable'],
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
            'num_trucks.numeric' => 'Value must be numeric', 
        ];
    }
}
