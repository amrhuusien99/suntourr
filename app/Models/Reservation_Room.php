<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation_Room extends Model 
{

    protected $table = 'reservation_room';
    public $timestamps = true;
    protected $fillable = array('reservation_id', 'room_id', 'room_quantity');

}