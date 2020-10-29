<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model 
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'phone', 'photo', 'password', 'governorate_id', 'pin_code', 'api_token', 'is_activate');

    public function governorate()
    {
        return $this->belongsTo('App\Models\Governorate');
    }

    public function cart()
    {
        return $this->hasMany('App\Models\Cart');
    }

    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function reservation()
    {
        return $this->hasMany('App\Models\Reservation');
    }

    public function notification()
    {
        return $this->morphMany('App\Models\Notification', 'notifiable');
    }

    protected $hidden = [
        'password', 'api_token'
    ];

}