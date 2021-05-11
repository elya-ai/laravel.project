<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avto extends Model
{
    public $table = "students";

    public $timestamps = false;

    public $fillable = [
    	'id', 'name', 'last_name', 'login', 'password',
    ];
}
