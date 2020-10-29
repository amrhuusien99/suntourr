<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model 
{

    protected $table = 'carts';
    public $timestamps = true;
    protected $fillable = array('client_id', 'room_id');

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }

}