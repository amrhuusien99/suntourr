<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model 
{

    protected $table = 'governorates';
    public $timestamps = true;
    protected $fillable = array('name', 'country_id');

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function hotel()
    {
        return $this->hasMany('App\Models\Hotel');
    }

    public function client()
    {
        return $this->hasMany('App\Models\Client');
    }

}