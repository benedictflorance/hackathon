<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Exception;
use App\User;
use Log;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
	    try{
	    	$validator = Validator::make($request->only(['email','password']),[
	    		'email' => 'required|email|max:255',
	    		'password' => 'required|max:127'
	    	]);
	    	if($validator->fails())
	    	{
	    		$message = "Invalid or Missing parameters";
	    		$status_code = 400; //Bad Request
	    		return response()->json(["message" => $message,
	    		"status_code" => $status_code]);
	    	}
	    	else
	    	{
	    		$email = $request->input('email');
	    		$password = $request->input('password');
	    		$user = User::where('email','=',$email)->first();
	    		if($user)
	    		{
	    			if(password_verify($password,$user->password))
	    			{
	    				$message =  $user->name." has logged in";
	    				$status_code = 200;
	    				$remember_token = str_random(60);
	    				$user->update(['remember_token' => $remember_token]);
						return response()->json(["message" => $message,
	    				"status_code" => $status_code, "remember_token" => $remember_token]);    			
					}
					else
		    		{
		    			$status_code = 401;
		    			$message = "Invalid Credentials";
		    			return response()->json(["message" => $message, "status_code" => $status_code]);
		    		}
	    		}
	    		else
	    		{
	    			$status_code = 401;
	    			$message = "User not registered";
	    			return response()->json(["message" => $message,
	    		"status_code" => $status_code]);
	    		}
	    	}
	    }
	    catch(Exception $error)
	    {
	    	$status_code = 500;
	    	$message=$error->getMessage();
	    	return response()->json(["message" => $message,"status_code" => $status_code]);
	    }
    }
    public function logout(Request $request)
    {    	
    	try
    	{	
			$token=$request->input('token');
    		$user=User::where('remember_token','=',$token)->first();
    		$user->update(['remember_token' => null ]);
    		$status_code=200;
    		$message=$user->name." logged out";
    		return response()->json(["message" => $message,"status_code" => $status_code]);
    	}
    	catch(Exception $error)
	    {
	    	$status_code = 500;
	    	$message=$error->getMessage();
	    	return response()->json(["message" => $message,"status_code" => $status_code]);
	    }
    }
}
