<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Geor;

class GeorController extends Controller
{
    public function getGeor()
    {
    	$tabl = Geor::get();
    	return response()->json($tabl);
    }
    public function postGeor(Request $req)
    {
    	$tabl = new Geor();

    	$tabl->name = $req->name;
    	$tabl->last_name = $req->last_name;
    	$tabl->age = $req->age;

    	$tabl->save();  
    }
    public function patchGeor(Request $req)
    {
    	$tabl = Geor::where("id", $req->id)-> first();

    	$tabl->name = $req->name;
    	$tabl->last_name = $req->last_name;
    	$tabl->age = $req->age;
    	$tabl->save();

    	return response()->json($tabl);
    } 

}
