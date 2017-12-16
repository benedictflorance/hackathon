<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\User;
use App\Doctor;
use App\TrustedDoctor;
use App\Checkup;
use Validator;
class UserController extends Controller
{
    //
    public function newUser(Request $request)
    {
        try{
                $validator = Validator::make($request->all(),[
                            'aadhar' => 'required|digits:12|numeric',
                            'name' => 'required|string|max:511',
                            'dob' => 'required|date_format:Y-m-d',
                            'email' => 'required|email|max:255',
                            'address' => 'required|string',
                            'insuranceid' => 'required|digits_between:1,15|numeric',
                            'password' => 'required|min:1|max:127',
                ]);
                if($validator->fails())
                {
                    $message = $validator->errors();
                    $status_code = 400; //Bad Request
                    return response()->json(["message" => $message,
                    "status_code" => $status_code]);
                }
                else
                {
                    $user=User::create([
                        'aadhar' => $request->input('aadhar'),
                        'name' => $request->input('name'),
                        'dob' => $request->input('dob'),
                        'email' => $request->input('email'),
                        'address' => $request->input('address'),
                        'insuranceid' => $request->input('insuranceid'),
                        'password' => password_hash($request->input('password'),PASSWORD_DEFAULT),    
                    ]);
                    $message=$user->name." has been registered";
                    $status_code=200;
                    return response()->json(["message" => $message, "status_code" => $status_code]);
                }
            }
        catch(Exception $error){
            $message = $error->getMessage();
            $status_code=500;
            return response()->json(["message" => $message,
                "status_code" => $status_code]);
        }       
    }
    public function getProfile(Request $request)
    {
        try{
            $token=$request->input('token');
            $user=User::where('remember_token','=',$token)->first();
            $result=array_merge($user->toArray(),["status_code" => 200]);
            return response()->json($result);
        }
        catch(Exception $error){
            $message = $error->getMessage();
            $status_code=500;
            return response()->json(["message" => $message,
                "status_code" => $status_code]);
        }
    }
    public function newTrusted(Request $request)
    {
        try{
                $token=$request->input('token');
                $user=User::where('remember_token','=',$token)->first();
                $validator = Validator::make($request->all(),[
                            'registerid' => 'required|digits_between:1,10|numeric',
                ]);
                if($validator->fails())
                {
                    $message = $validator->errors();
                    $status_code = 400; //Bad Request
                    return response()->json(["message" => $message,
                    "status_code" => $status_code]);
                }
                else
                {
                    TrustedDoctor::create([
                    'aadhar' => $user->aadhar,
                    'registerid' => $request->input('registerid'),
                    ]);
                    $message=Doctor::where('registerid',$request->input('registerid'))->first()->name." has been registered as the trusted doctor of ".$user->name;
                    $status_code=200;
                    return response()->json(["message" => $message, "status_code" => $status_code]);
                }
            }
        catch(Exception $error){
            $message = $error->getMessage();
            $status_code=500;
            return response()->json(["message" => $message,
                "status_code" => $status_code]);
        } 
    }
    public function getTrusted(Request $request)
    {
        try{
            $token=$request->input('token');
            $user=User::where('remember_token','=',$token)->first();
            $result=$user->trusteddoctors->map(function($user){ return $user->doctor;});
            return response()->json(['data'=>$result,'status_code'=>200]);
        }
        catch(Exception $error){
            $message = $error->getMessage();
            $status_code=500;
            return response()->json(["message" => $message,
                "status_code" => $status_code]);
        }

    }
    public function getHistory(Request $request)
    {
        try{
            $token=$request->input('token');
            $user=User::where('remember_token','=',$token)->first();
            $result=$user->checkups;
            return response()->json(['data'=>$result,'status_code'=>200]);
        }
        catch(Exception $error){
            $message = $error->getMessage();
            $status_code=500;
            return response()->json(["message" => $message,
                "status_code" => $status_code]);
        }
    }
    public function getCheckupById(Request $request,$id)
    {
        try{
            $token=$request->input('token');
            $user=User::where('remember_token','=',$token)->first();
            $result=$user->checkups()->where('id',$id)->get();
            return response()->json(['data'=>$result,'status_code'=>200]);
        }
        catch(Exception $error){
            $message = $error->getMessage();
            $status_code=500;
            return response()->json(["message" => $message,
                "status_code" => $status_code]);
        }
    }
}
