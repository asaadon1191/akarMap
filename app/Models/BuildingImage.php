<?php

namespace App\Models;

use App\Models\Building;
use Illuminate\Database\Eloquent\Model;

class BuildingImage extends Model
{
    protected $teble    = "building_images";
    protected $fillable = 
    [
        'photos','building_id','photo_type'
    ]; 



    // RELATIONS################################################################ //

     // ONE TO MANY WITH PROJECTS TABLE
     public function building()
     {
         return $this->belongsTo(Building::class,'building_id');
     }


    // SCOPES ####################################################################### //
    
     public function scopeActive($qry)
     {
         return $qry->where('is_active',1);
     }


      // GET BUILDING IMAGE
      public function Type()
      {
         return $this->photo_type == 1 ? 'Map' : 'Image';
      }
}
