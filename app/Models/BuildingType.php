<?php

namespace App\Models;

use App\Models\Building;
use App\Models\BuildingTypeTranslation;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class BuildingType extends Model
{
    use Translatable;
    protected $table = "building_types";
    protected $with = ['translations'];
    protected $translatedAttributes = ['name'];

    protected $fillable = 
    [
        'is_active'
    ];

    

    public function building()
    {
        return $this->hasMany(Building::class);
    }

    public function BulidingTranslate()
    {
        return $this->hasMany(BuildingTypeTranslation::class);
    }


     // SCOPES
     public function scopeActive($qry)
     {
         return $qry->where('is_active',1);
     }
 
     public function scopeSelect($qry)
     {
         return $qry->select('id','name');
     }
 
     // OTHER METHODS
     public function Status()
     {
        return $this->is_active == 1 ? 'Active' : 'Not Active';
     }
}
