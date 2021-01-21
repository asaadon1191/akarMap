<?php

namespace App\Models;

use App\Models\Building;
use Illuminate\Database\Eloquent\Model;

class BuildingTranslation extends Model
{
    protected $table = "building_translations";
    protected $fillable =['name'];


    public function building()
    {
        return $this->belongsTo(Building::class,'building_id');
    }
}


