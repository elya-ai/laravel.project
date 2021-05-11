<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Human;

class HumansController extends Controller
{
    public function getHuman()
    {
    	$humans = Human::get();
    	return response()->json($humans);	
    }

    public function register(Request $req)
    {
    	$validator = Validator::make($req->all(),
    		[
    			'name' => 'required',
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
    	Human::create($req->all());
    	return response()->json('Регистрация прошла успешно');
    }

    public function auth(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'login' => 'required',
            'password' => 'required',
        ]);

    	if($validator->fails()) {
    		return response()->json($validator->errors());
    	}

    	if($human = Human::where('login', $req->login)->first())
    	{
    		if($req->password == $human->password)
    		{
    			$human->api_token=str_random(50);
    			$human->save();
    			return response()->json('Авторизация прошла успешно, api_token:'. $human->api_token);
    		}
    	}
        
    	return response()->json('Логин или пароль введены неверно, api_token:'. $human->api_token);
    }

    public function logout(Request $req)
    {
     	$human = Human::where("api_token", $req->api_token)->first();

     	if($human)
     	{
     		$human->api_token = null;
     		$human->save();
     		return response()->json('Разлогирование прошло успешно');
     	}
    } 
}
