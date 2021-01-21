<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;

class CompanyTranslation extends Model
{
    protected $table = "company_translations";
    protected $fillable =['name'];


    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}

