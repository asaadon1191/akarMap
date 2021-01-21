<?php

namespace App\Models;

use App\Models\Project;
use App\Models\Governorate;
use App\Models\CityTranslation;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class City extends Model
{
    use Translatable;
    protected $table = "cities";
    protected $with = ['translations'];
    protected $translatedAttributes = ['name'];

    protected $fillable = 
    [
        'governorate_id','is_active'
    ];

//RELATIONS
    public function governorats()
    {
        return $this->belongsTo(Governorate::class,'governorate_id');
    }

    public function cityTranslate()
    {
        return $this->hasMany(CityTranslation::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }


    // SCOPES
    public function scopeActive($qry)
    {
        return $qry->where('is_active',1);
    }


    // OTHER METHODS
    public function Status()
    {
       return $this->is_active == 1 ? 'Active' : 'Not Active';
    }
}
