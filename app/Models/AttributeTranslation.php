<?php

namespace App\Models;

use App\Models\Attribute;
use Illuminate\Database\Eloquent\Model;

class AttributeTranslation extends Model
{
    protected $table = "attribute_translations";
    protected $fillable =['name'];

    // RELATIONS
    public function attribute()
    {
        return $this->belongsTo(Attribute::class,'attribute_id');
    }
}
