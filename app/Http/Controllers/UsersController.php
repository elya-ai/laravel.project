<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Users;

class UsersController extends Controller
{
    public function getUser()
    {
    	$users = Users::get();
    	return response()->json($users);
    }

    public function registr(Request $req)
    {
    	$users = new Users;
    	if ($req->name == "" or $req->age == "" or $req->password == "")
    	{
    		return "Dolbayeb, u tebya oshibka";
    	}
    	$users->name = $req->name;
    	$users->age = $req->age;
    	$users->password = $req->password;
    	//return "Vse akei";
    	$users->save();
    }

    public function auto(Request $req)
    {
    	$users = Users::where("name", $req->name)->first();
    	if ($req->name != "" or $req->password != "")
    	{
    		if ($req->name == $users->name && $req->password == $users->password)
    		{
    		return 'Ok';
    		}
    	}
    	return "Ne ok";
    	/*$users = new Users;
    	$users = Users::where()->json("name", $req->name)->first();
    	if ($log)
    	{
    		if ($req->password == $users->password)
    		{
    			return "ok";
    		}
    		return "ne ok";
    	}*/
    }
}
