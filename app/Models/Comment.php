<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model 
{

    protected $table = 'comments';
    public $timestamps = true;
    protected $fillable = array('client_id', 'hotel_id', 'content');

    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}