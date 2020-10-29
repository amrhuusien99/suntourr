<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model 
{

    protected $table = 'hotels';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'phone', 'password', 'state', 'section', 'popular', 'temperature', 'photo', 'whats_app', 'average_price', 'longitude', 'latitude', 'governorate_id', 'category_id', 'pin_code', 'api_token', 'is_activate');

    public function governorate()
    {
        return $this->belongsTo('App\Models\Governorate');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function room()
    {
        return $this->hasMany('App\Models\Room');
    }

    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function reservation()
    {
        return $this->hasMany('App\Models\Reservation');
    }

    public function amenity()
    {
        return $this->hasMany('App\Models\Amenity');
    }

    public function offer()
    {
        return $this->hasMany('App\Models\Offer');
    }

    public function notification()
    {
        return $this->morphMany('App\Models\Notification', 'notifiable');
    }

    protected $hidden = [
        'password', 'api_token'
    ];

}