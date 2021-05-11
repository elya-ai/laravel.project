<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Reserv;
use App\Human;
use Illuminate\Support\Str;

class ReservController extends Controller
{

    public function checks(Request $req)
    {
    	$token = $req->header("api_token");

    	if($token==null)
    	{
        	return "Пользователь не авторизован164516";
    	}

    	$user = Human::where('api_token', $token)->first();
    	
        if(!$user)
        {
        	return "Пользователь не авторизован";
        }
        
        $code = Str::random(5);
        $checks = [
            "from_id" => $req->from_id,
            "from_data" => $req->from_data,
            "human_id" => $user->id,
            "code" => $code,
        ];

        if($req->back_id != null)
        {
        	$checks['back_id'] = $req->back_id;
        	$checks['back_data'] = $req->back_data;
        }

        Reserv::create($checks);
        return response()->json($code);
    }
}
