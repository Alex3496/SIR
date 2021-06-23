<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StayRequest extends FormRequest
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
            'check_in'           => 'required|string|date',
            'check_in_hours'     => 'required|string',
            'check_out'          => 'required|string|date',
            'check_out_hours'    => 'required|string',
            'free_hours'         => 'required|numeric|min:0', 
            'type'               => 'required|string',
            'cost'               => 'required|numeric|min:0',
            'cost_type'          => 'required|string',
            'cost_currency'      => 'required|string',
            'unity'              => 'required|string',
            'operator'           => 'required|string',
            'client'             => 'required|string',
            'direction'          => 'required|string',
            'payment_operator'   => 'numeric|min:0',
            'customer_charge'    => 'numeric|min:0',

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
            'required'      => 'Este campo es requerido.',
            'date'          => 'El formato de fecha es incorrecto'
        ];
    }
}
