<?php

namespace App\Http\Controllers;

use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\OfficialDoctor;
use Validator;

class MailController extends Controller
{
    //
    public function sendMail(Request $request)
    {
    	$validator = Validator::make($request->all(),[
	    		'registerid' => 'required|digits_between:1,10|numeric'
	    	]);
	    if($validator->fails())
	    {
	    	return redirect()->back()->withErrors($validator);
	    }
	    else
	    {
	    	$registerid=$request->input('registerid');
	    	$doctor=OfficialDoctor::where('registerid',$registerid)->first();;
	    	if($doctor)
	        {
	        	$token=str_random(60);
	        	$doctor->update(['token' => $token]);
	        	Mail::to($doctor->email)->send(new VerifyEmail($token));	        	
	        	return view('verifyemail')->with('success','Kindly check your mail, doctor!');

	        }
	        else
	        {
	        	return view('verifyemail')->with('failure','You are not a registered doctor');
	        }
    	}
    }
}
