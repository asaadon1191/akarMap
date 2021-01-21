<?php

namespace App\Models;

use App\Models\BuildingType;
use Illuminate\Database\Eloquent\Model;

class BuildingTypeTranslation extends Model
{
    protected $table = "building_type_translations";
    protected $fillable =['name'];

    public function buildingType()
    {
        return $this->belongsTo(BuildingType::class,'building_type_id');
    }
}
