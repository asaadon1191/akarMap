<?php

namespace App\Models;

use App\Models\Project;
use App\Models\Attribute;
use App\Models\BuildingType;
use App\Models\BuildingImage;
use App\Models\BuildingTranslation;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Building extends Model
{
    use Translatable;
    protected $table = "buildings";
    protected $with = ['translations'];
    protected $translatedAttributes = ['name'];

    protected $fillable = 
    [
        'space',
        'total_units',
        'price_meter',
        'total_price',
        'bed_Room_Number',
        'bath_Room_Number',
        'aviliable_unites',
        'sold_unites',
        'project_id',
        'building_type_id',
        'attribute_id',
        'is_active'
    ];

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

    // RELATIONS

        // ONE TO MANY WITH PROJECTS TABLE
        public function project()
        {
            return $this->belongsTo(Project::class,'project_id');
        }

        // ONE TO MANY WITH BUILDING TYPE TABLE
        public function building_type()
        {
            return $this->belongsTo(BuildingType::class,'building_type_id');
        }

        // ONE TO MANY WITH BUILDING TRANSLATION TABLE
        public function buildingTranslate()
        {
            return $this->hasMany(BuildingTranslation::class);
        }


        // MANY TO MANY WITH ATTRIBUTE
        public function attributes()
        {
            return $this->belongsToMany(Attribute::class);
        }

        //ONE TO MANY WITH Building IMAGES TABLE
        public function buildingImages()
        {
            return $this->hasMany(BuildingImage::class);
        }

        // //ONE TO MANY WITH Building TYPE TABLE
        // public function buildingType()
        // {
        //     return $this->hasMany(BuildingType::class);
        // }

}
