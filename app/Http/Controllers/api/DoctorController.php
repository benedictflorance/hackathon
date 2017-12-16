<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctor;

class DoctorController extends Controller
{
    //
    public function getAll()
    {
    	try{
	    	$result=Doctor::all();
            return response()->json(['data'=>$result,'status_code'=>200]);
    	}
    	catch(Exception $error){
            $message = $error->getMessage();
            $status_code=500;
            return response()->json(["message" => $message, "status_code" => $status_code]);
        }
    }
    public function getById($id)
    {
    	try{
	    	$result=Doctor::where('registerid',$id)->first();
            return response()->json(['data'=>$result,'status_code'=>200]);
    	}
    	catch(Exception $error){
            $message = $error->getMessage();
            $status_code=500;
            return response()->json(['data'=>$result,'status_code'=>200]);
        }
    }
}
