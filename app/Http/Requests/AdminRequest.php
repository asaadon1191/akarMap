<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        return 
        [
            'name'      => 'required|unique:admins,name,'.$this->id,
            'email'     => 'required|email|unique:admins,email,'.$this->id,
            'password'  => 'required|same:confirm-password',
            'phone'     => 'required',
            'role_id'   => 'required'
        ];
    }
}
