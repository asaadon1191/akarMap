<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Project;
use App\Models\CompanyRate;
use App\Models\CompanyTranslation;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Company extends Model
{
    use Translatable;
    protected $table = "companies";
    protected $with = ['translations'];
    protected $translatedAttributes = ['name'];

    protected $fillable = 
    [
        'adress','phone','phone2','logo','admin_id','is_active'
    ];

   
    // protected $hidden = ['translations'];


    //TO MAKE ACTIVE VALUE == TRUE OR FALSE 
    protected $casts = ['is_active' => 'boolean'];


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

    // MANY TO MANY WITH ADMIN
    public function admins()
    {
        return $this->belongsToMany(Admin::class);
    }

    // ONE TO MANY WITH COMPANT TRANSLATIONS TABLE
    public function companyTranslations()
    {
        return $this->hasMany(CompanyTranslation::class);
    }

    // ONE TO MANY WITH PROJECTS TABLE
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    // ONE TO MANY WITH COMPANY RATES TABLE
    public function rates()
    {
        return $this->hasMany(CompanyRate::class);
    }
}
