<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('phone', 'whats_app', 'facebook', 'gmail', 'insta', 'commission', 'bank_name', 'about_us', 'app_link');

}