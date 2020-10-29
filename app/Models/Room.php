<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model 
{

    protected $table = 'rooms';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'max_in_room', 'options', 'today_price', 'front_image', 'images', 'hotel_id');

    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
    }

    public function cart()
    {
        return $this->hasMany('App\Models\Cart');
    }

    public function reservation()
    {
        return $this->belongsToMany('App\Models\Reservation');
    }

}