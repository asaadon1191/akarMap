<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    protected $teble    = "project_images";
    protected $fillable = 
    [
        'photos','project_id'
    ]; 


    // RELATIONS################################################################ //

     // ONE TO MANY WITH PROJECTS TABLE
     public function company()
     {
         return $this->belongsTo(Project::class,'project_id');
     }


    // SCOPES ####################################################################### //
    
     public function scopeActive($qry)
     {
         return $qry->where('is_active',1);
     }
}
