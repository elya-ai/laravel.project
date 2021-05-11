<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserv extends Model
{
    public $table = "bron";

    public $timestamps = false;

    public $fillable = [
    	'id', 'from_id', 'back_id',	'from_data', 'back_data', 'human_id', 'code',
    ];
}
