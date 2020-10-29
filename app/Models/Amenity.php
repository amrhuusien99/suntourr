<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model 
{

    protected $table = 'amenities';
    public $timestamps = true;
    protected $fillable = array('name', 'hotel_id', 'section_id');

    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
    }

    public function section()
    {
        return $this->belongsTo('App\Models\SectionAmenity');
    }

}