<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryHotel extends Model 
{

    protected $table = 'category_hotel';
    public $timestamps = true;
    protected $fillable = array('hotel_id', 'category_id');

}