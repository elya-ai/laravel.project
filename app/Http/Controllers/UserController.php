<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function getUsers()
    {
    	$user = User::get();

    	return response()->json($user);
    }

    public function addUsers(Request $req)
    {
    	$user = new User();

    	$user->name = $req->name;
    	$user->last_name = $req->last_name;
    	$user->age = $req->age;

    	$user->save();
    }

    public function updateUser(Request $req)
    {
        $user = User::where("id", $req->id)->first();

        $user->name = $req->name;
    	$user->last_name = $req->last_name;
    	$user->age = $req->age;

    	$user->save();

       	return response()->json($user);
    }
}
