<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public $table = "users";

	public $timestamps = false;

	protected $fillable = [
        'id', 'name', 'age', 'password',
    ];
}
