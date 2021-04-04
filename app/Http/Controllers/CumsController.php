<?php

namespace App\Http\Controllers;

use App\Cum;

class CumController extends Controller
{
    public function pip()
    {
    	$cum = Cum::get();
    	return response()->json($cum);
    }
}
