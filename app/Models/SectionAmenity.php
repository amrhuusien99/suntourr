<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionAmenity extends Model 
{

    protected $table = 'sections_amenities';
    public $timestamps = true;
    protected $fillable = array('name');

    public function amenity()
    {
        return $this->hasMany('App\Models\Amenity');
    }

}