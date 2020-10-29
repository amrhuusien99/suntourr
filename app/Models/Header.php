<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Header extends Model 
{

    protected $table = 'headers';
    public $timestamps = true;
    protected $fillable = array('background', 'hotel', 'country', 'average_price');

}