<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model 
{

    protected $table = 'reservations';
    public $timestamps = true;
    protected $fillable = array('notes', 'state', 'cost', 'days_quantity', 'room_quantity', 'commission', 'total_cost', 'net', 'client_id', 'hotel_id', 'payment_id');

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
    }

    public function room()
    {
        return $this->belongsToMany('App\Models\Room')->withPivot('reservation_id', 'room_id', 'room_quantity');
    }

    public function payment_method()
    {
        return $this->belongsTo('App\Models\PaymentMethod');
    }

}