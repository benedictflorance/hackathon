<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes\WAY2SMSClient;
use App\OfficialUser;
class OTPController extends Controller
{
    //
    public function sendOTP(Request $request)
    {
	    try{
		    $aadhar=$request->input('aadhar');
		    $officialuser=OfficialUser::where('aadhar',$aadhar)->first();
		    $mobile=$officialuser->mobile;
			$client = new WAY2SMSClient();
		    $client->login('yourway2smsusername', 'yourway2sms password');
		    $otp=rand(1000,9999);
		    $officialuser->update(['otp'=> $otp]);
		    $client->send($mobile, 'Your OTP for the Aadhaar HealthCare Verification is '.$otp);
		    $client->logout();
		    return response()->json(['data'=>$otp,'status_code'=>200]);
			}
		catch(Exception $error){
            $message = $error->getMessage();
            $status_code=500;
            return response()->json(["data" => $message, "status_code" => $status_code]);
        }
    }
    public function verifyOTP(Request $request)
    {
    	try{
		    $aadhar=$request->input('aadhar');
		    $officialuser=OfficialUser::where('aadhar',$aadhar)->first();
		    $otp=$officialuser->otp;
				if($otp==$request->input('otp'))
				{
				return response()->json(["data" => "Success", "status_code" =>200]);
				}
				else{
					return response()->json(["data" => "Failure", "status_code" => 401]);
				}
			}
		catch(Exception $error){
            $message = $error->getMessage();
            $status_code=500;
            return response()->json(["message" => $message, "status_code" => $status_code]);
        }
    }

}
