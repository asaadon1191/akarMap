<?php

namespace App\Models;

use App\Models\City;
use App\Models\Project;
use App\Models\GovernorateTranslation;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Governorate extends Model
{
    use Translatable;
    protected $table = "governorates";
    protected $with = ['translations'];
    protected $translatedAttributes = ['name'];

    protected $fillable = 
    [
        
    ];


    // RELATIONS
    public function cities()
    {
        return $this->hasMany(City::class);  
    }


    // ONE TO MANY WITH  GOVERNORATE TRANSLATION
    public function gov_translation()
    {
        return $this->hasMany(GovernorateTranslation::class);  
    }

    // ONE TO MANY WITH PROJECTS
    public function projects()
    {
        return $this->hasMany(Project::class);  
    }


     // SCOPES
     public function scopeActive($qry)
     {
         return $qry->where('is_active',1);
     }

     public function scopeBuildingType($qry)
    {
        return $qry->where('name','villa');
    }
}
