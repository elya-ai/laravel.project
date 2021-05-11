<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Avto;

class RegController extends Controller
{
    public function regPost(Request $req)
    {
    	$validator = Validator::make($req->all(),
    		[
    			'name' => 'required',
    			'last_name' => 'required',
    			'login' => 'required',
    			'password' => 'required',
    		]);
    	if($validator->fails()) {
    		return response()->json([
    			'error' => [
    				'message' => 'Validation error',
    				'errors' => $validator->errors(),
    			]
    		]);
    	}
    	Avto::create($req->all());
    	return response()->json('Регистрация прошла успешно');
    }

    public function avtoPost(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'login' => 'required',
            'password' => 'required',
        ]);

    	if($validator->fails()) {
    		return response()->json($validator->errors());
    	}

    	if($students = Avto::where('login', $req->login)->first())
    	{
    		if($req->password == $students->password)
    		{
    			$students->api_token=str_random(50);
    			$students->save();
    			return response()->json('Авторизация прошла успешно, api_token:'. $students->api_token);
    		}
    	}
        
    	return response()->json('Логин или пароль введены неверно, api_token:'. $students->api_token);
    }

}
