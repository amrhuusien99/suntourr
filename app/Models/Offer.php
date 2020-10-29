<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model 
{

    protected $table = 'offers';
    public $timestamps = true;
    protected $fillable = array('front_image', 'images', 'title', 'content', 'from', 'to', 'hotel_id');

    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
    }

}