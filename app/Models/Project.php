<?php

namespace App\Models;

use App\Models\City;
use App\Models\Building;
use App\Models\Governorate;
use App\Models\ProjectImage;
use App\Models\ProjectTranslation;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Project extends Model
{
    use Translatable;
    protected $table = "projects";
    protected $with = ['translations'];
    protected $translatedAttributes = ['name','adress'];

    protected $fillable = 
    [
        'space','total_units','logo','map_desigen','admin_id','city_id','company_id','is_active','governorate_id'
    ];
    // protected $guarded = [];





    // RELATIONS################################################################### //

     // ONE TO MANY WITH COMPANY TABLE
     public function company()
     {
         return $this->belongsTo(Company::class,'company_id');
     }

    //ONE TO MANY WITH PROJECT TRANSLATIONS TABLE
     public function ProTranslation()
     {
        return $this->hasMany(ProjectTranslation::class);
     }


    //ONE TO MANY WITH PROJECT IMAGES TABLE
     public function proIamges()
     {
        return $this->hasMany(ProjectImage::class);
     }

     // ONE TO MANY WITH BUILDING TABLE
    public function buildings()
    {
        return $this->hasMany(Building::class);
    }

    // ONE TO MANY WITH CITY TABLE
    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }

    // ONE TO MANY WITH GOVERNORATE TABLE
    public function governorate()
    {
        return $this->belongsTo(Governorate::class,'governorate_id');
    }





    // OTHER METHODES################################################################ //
        //TO MAKE ACTIVE VALUE == TRUE OR FALSE 
        protected $casts = ['is_active' => 'boolean'];
        
    // GET STATUS IN INDEX PAGE 
        public function Status()
        {
           return $this->is_active == 1 ? 'Active' : 'Not Active';
        }



     // SCOPES ####################################################################### //
        public function scopeActive($qry)
        {
            return $qry->where('is_active',1);
        }
    
        public function scopeSelect($qry)
        {
            return $qry->select('id','name');
        }

        public function scopeBuildingType($qry)
        {
            // return $qry->where(pluck('building_type')->pluck('name'),'villa');
            return $qry->where('name','villa');
        }
    }
