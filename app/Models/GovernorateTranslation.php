<?php

namespace App\Models;

use App\Models\Governorate;
use Illuminate\Database\Eloquent\Model;

class GovernorateTranslation extends Model
{
    protected $table = "governorate_translations";
    protected $fillable =['name'];

    public function GOVERNORATE()
    {
        return $this->belongsTo(Governorate::class);
    }
}
