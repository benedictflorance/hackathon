<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\TrustedDoctor;
use App\Doctor;
use App\User;

class DoctorController extends Controller
{
    //

    public function showDashboard(Request $request)
    {
    	    $doctor=Doctor::where('registerid',Session::get('registerid'))->first();
            $result=$doctor->trustedusers->map(function($doctor){ return $doctor->user;});

    	return view('home')->with([
    		'doctor' => Session::get('name'),
    		'hname' => Session::get('hname'),
    		'haddress' => Session::get('haddress'),
    		'registerid' => Session::get('registerid'),
    		'email' => Session::get('email'),
    		'mobile' => Session::Get('mobile'),
    		'patients' => $result,
    	]);
    }

    public function showCheckupForm(Request $request)
    {
    	$aadhar=$request->input('aadhar');
    	$count=TrustedDoctor::where(['aadhar' => $aadhar, 'registerid' => Session::get('registerid')])->count();
    	if($count)
    	{
    	return view('checkform')->with('aadhar', $aadhar);
    	}
    	else
    	{
    		return redirect('home');
    	}
    }

    public function storeCheckupDetails(Request $request)
    {

    }

    public function showPatientHistory( Request $request)
    {
    	$aadhar=$request->input('aadhar');
    	$count=TrustedDoctor::where(['aadhar' => $aadhar, 'registerid' => Session::get('registerid')])->count();
    	if($count)
    	{	
    		$user=User::where('aadhar',$aadhar)->first();
    		return view('history')->with([
    			'user' => $user,
    			'checkups' => $user->checkups,
    		]);
    	}
    	else
    	{
    		return redirect('home');
    	}
    }
    public function showPatientCheckup(Request $request)
    {

    }
}
