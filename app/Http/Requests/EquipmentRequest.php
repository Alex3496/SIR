<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentRequest extends FormRequest
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
            'economic'  => 'required|string|max:25',
            'vin'       => 'required|string|max:25',
            'type'      => 'required|string',
            'trademark' => 'required|string|max:35',
            'model'     => 'required|string|max:35',
        ];


        if($this->request->get('plates') == 'P_US'){
            $rules['plates_us'] = ['required','string','max:10'];
            $rules['state_us'] = ['required','string','max:3'];    
        }

        if ($this->request->get('plates') == 'P_MX'){
            $rules['plates_mx'] = ['required','string','max:10'];
            $rules['state_mx'] = ['required','string','max:3'];                          
        }

        if ($this->request->get('plates') == 'P_both'){
            $rules['plates_us'] = ['required','string','max:10'];
            $rules['state_us'] = ['required','string','max:3'];    
            $rules['plates_mx'] = ['required','string','max:10'];
            $rules['state_mx'] = ['required','string','max:3'];                          
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
            'required'      => 'Este campo es requerido.',
            'economic.max'  => 'Máximo 25 caracteres.',
            'plates_us.max' => 'Máximo 10 caracteres.',
            'plates_mx.max' => 'Máximo 10 caracteres.',
            'state_us.max'  => 'Máximo 3 caracteres.',
            'state_mx.max'  => 'Máximo 3 caracteres.',
            'vin.max'       => 'Máximo 25 caracteres.',
            'trademark.max' => 'Máximo 35 caracteres.',
            'model.max'     => 'Máximo 35 caracteres.',
            'estatus.max'   => 'Error longitud',
        ];
    }
}
