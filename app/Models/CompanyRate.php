<?php

namespace App\Models;

use App\User;
use App\Models\Company;
use Illuminate\Database\Eloquent\Model;

class CompanyRate extends Model
{
    protected $table = "company_rates";
    protected $fillable = 
    [
        'user_id','company_id','rate'
    ];

    // RELATIONS

    // ONE TO MANY WITH COMPANY TABLE 
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    // ONE TO MANY WITH USER TABLE 
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
