<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class buildinTypeRequest extends FormRequest
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
            // 'name'      => 'required|unique:building_type_translations,name,'.$this->id,
            'name'      => 'required',
            
            'is_active' => 'in:0,1'
        ];
    }
}
