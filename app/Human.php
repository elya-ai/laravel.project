<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Human extends Model
{
    public $table = "human";

    public $timestamps = false;

    public $fillable = [
    	'id', 'name', 'login', 'password',
    ];
}
