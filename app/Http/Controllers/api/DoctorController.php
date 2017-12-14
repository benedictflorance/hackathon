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
	    	$result=array_merge(Doctor::all()->toArray(),["status_code" => 200]);
	        return response()->json($result);
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
	    	$result=array_merge(Doctor::where('registerid',$id)->first()->toArray(),["status_code" => 200]);
	        return response()->json($result);
    	}
    	catch(Exception $error){
            $message = $error->getMessage();
            $status_code=500;
            return response()->json(["message" => $message, "status_code" => $status_code]);
        }
    }
}
