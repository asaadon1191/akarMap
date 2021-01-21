<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuildingRequest extends FormRequest
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
            'name'              => 'required|unique:building_translations,name,'.$this->id,
            'space'             => 'required|integer',
            'total_units'       => 'required|integer',
            'price_meter'       => 'required|integer',
            'total_price'       => 'required|integer',
            'bed_Room_Number'   => 'required|integer',
            'bath_Room_Number'  => 'required|integer',
            'aviliable_unites'  => 'required|integer',
            'sold_unites'       => 'required|integer',
            'project_id'        => 'required|integer|exists:projects,id',
            'buildingType_id'   => 'required|integer|exists:building_type_translations,id',
            'attribute_id'      => 'required|exists:attribute_translations,id',
        ];
    }
}
