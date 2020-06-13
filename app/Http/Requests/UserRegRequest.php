<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegRequest extends FormRequest
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
            'role' => 'required|in:1,2,3',
            'company_name' => ['required', 'string', 'max:60','min:3'],
            'position' => ['required', 'string', 'max:50','min:3'],
            'name' => ['required', 'string', 'max:50','min:2'],
            'phone' => 'required|numeric|regex:/[0-9]{10}/',
            'email' => ['required', 'string', 'email', 'max:62', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed','max:50'],
        ];

        if($this->request->get('role') == '1'){
            $rules['type_company_user'] = 'required|in:Shipper,Carriers,Broker';
        }

        return $rules;
    }
}
