<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'logo'          => 'required_without:id',
            'map_desigen'   => 'required_without:id',
            'name'          => 'required|unique:project_translations,name,'.$this->id,
            'adress'        => 'required|string|max:500',
            'space'         => 'required',
            'total_units'   => 'required',
            'gov_id'        => 'required|exists:governorates,id',
            'city_id'       => 'required|exists:cities,id',
            'company_id'    => 'required|exists:companies,id',
            'is_active'     => 'in:0,1',

            // 'name' => 'required',Rule::unique('projects')->ignore($this->id),

        ];
    }
}
