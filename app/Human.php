<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Human extends Model
{
    public $table = "humans";

    public $timestamps = false;

    public $fillable = [
    	'id', 'username', 'login', 'password',
    ];
}
