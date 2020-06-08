<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
        $rules = [];

        //dd($this->request);

        if ($this->request->get('name') || $this->request->get('name') == null ) {
            $rules['name'] = ['required','string','max:50'];                           
        }

        if ($this->request->get('phone')) {
            $rules['phone'] = ['required','numeric','digits_between :7,12'];                           
        }

        if ($this->request->get('email')) {
            $rules['email'] = ['required','email','unique:users'];                           
        }

        if ($this->request->get('position')) {
            $rules['position'] = ['required', 'string', 'max:120'];                          
        }

        //dd($rules);

        return $rules;
    }
}
