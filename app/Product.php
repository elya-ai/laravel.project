<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = "products";

	public $timestamps = false;

	protected $fillable = [
        'name', 'number', 'price',
    ];
}
