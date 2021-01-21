<?php

namespace App\Models;

use App\Models\Building;
use App\Models\AttributeTranslation;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Attribute extends Model
{
    use Translatable;
    protected $table = "attributes";
    protected $with = ['translations'];
    protected $translatedAttributes = ['name'];

    protected $fillable = 
    [
        'is_active'
    ];

// RELATIONS
    public function attributesTranslate()
    {
        return $this->hasMany(AttributeTranslation::class);
    }

    // MANY TO MANY WITH BUILDING
    public function buildings()
    {
        return $this->belongsToMany(Building::class);
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
