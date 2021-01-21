<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;

class CityTranslation extends Model
{
    protected $table = "city_translations";
    protected $fillable =['name'];


    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
}


