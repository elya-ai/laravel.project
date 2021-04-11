<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

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
    	//$users = new Users;
    	/*if ($req->name == "" or $req->age == "" or $req->password == "")
    	{
    		return "Ne ok";
    	}
    	$users->name = $req->name;
    	$users->age = $req->age;
    	$users->password = $req->password;
    	//return "Vse akei";
    	$users->save();*/
    	$validator = Validator::make($req->all(), [
    		'name' => 'required|unique:users',
    		'age' => 'required',
    		'password' => 'required',
    	]);
    	if($validator->fails()) {
    		return response()->json([
    			'error'=> [
    				'message' => 'Validation error',
    				'errors' => $validator->errors(),
    			]
    		]);
    	}
    	Users::create($req->all());
    	return response()->json('Регистрация прошла успешно');
    }

    public function auto(Request $req)
    {
    	/*$validator = Validator::make($req->all(), [
    		'name' => 'required',
    		'password' => 'required',
    	]);
    	if($validator->fails()) {
    		return response()->json([
    			'error'=> [
    				'message' => 'Validation error',
    				'errors' => $validator->errors(),
    			]
    		]);
    	}
    	$users = Users::where("name", $req->name)->first();*/

    	$validator = Validator::make($req->all(), [
            'name' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        if($users = Users::where('name', $req->name)->first())
        {
            if ($req->password == $users->password)
            {
                $users->api_token=str_random(50);
                $users->save();
                return response()->json('Авторизация прошла успешно, api_token:'. $users->api_token);
            }
        }
                return response()->json('Логин или пароль введены неверно, api_token:'. $users->api_token);
    

    	/*if ($req->name != "" or $req->password != "")
    	{
    		if ($req->name == $users->name && $req->password == $users->password)
    		{
    		return 'Ok';
    		}
    	}
    	return "Ne ok";*/
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

    public function logout(Request $req)
        {
            $users = Users::where("api_token",$req->api_token)->first();

            if($users)
            {
                $users->api_token = null;
                $users->save();
                return response()->json('Разлогирование прошло успешно');
            }
        }
}
