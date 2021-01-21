<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;

class ProjectTranslation extends Model
{
    protected $table = "project_translations";
    protected $fillable =['name','adress'];

// RELATIONS#################################################### //

    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }

    // OTHER METHODES
}
