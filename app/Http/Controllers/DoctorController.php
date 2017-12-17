<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\TrustedDoctor;
use App\Doctor;
use App\User;
use App\Checkup;
use Validator;

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
    	$aadhar=$request->input('aadhar');
    	$count=TrustedDoctor::where(['aadhar' => $aadhar, 'registerid' => Session::get('registerid')])->count();
    	if($count)
    	{	
    		$validator = Validator::make($request->all(),[
                'questions' => 'required|string',
                'advice' => 'required|string',
                'medicines' => 'required|string',
                'emergency' => 'required|boolean',
                'vaccination' => 'required|boolean',
                'surgery' => 'required|boolean',
                'aadhar' => 'required|numeric|digits:12',
                'accompany' => 'string|max:511|nullable',
                'accmobile' => 'numeric|digits:10|nullable',
                'surgdetail' => 'string|nullable',
                'vaccdetail' => 'string|nullable',
                'emergdetail' => 'string|nullable',
                'remarks' => 'string|nullable',
                'filename' => 'string|nullable'

                ]);
                if($validator->fails())
                {
                    return redirect()->back()->withErrors($validator);
                }
                else
                {
                Checkup::create([
                'questions' => $request->input('questions'),
                'advice' => $request->input('advice'),
                'medicines' => $request->input('medicines'),
                'emergency' => $request->input('emergency'),
                'vaccination' => $request->input('vaccination'),
                'surgery' => $request->input('surgery'),
                'aadhar' => $request->input('aadhar'),
                'accompany' => $request->input('accompany'),
                'accmobile' => $request->input('accmobile'),
                'surgdetail' => $request->input('surgedetail'),
                'vaccdetail' => $request->input('vaccdetail'),
                'emergdetail' => $request->input('emergdetail'),
                'remarks' => $request->input('remarks'),
                'filename' => $request->input('filename'),
                'registerid' => Session::get('registerid'),
                ]);	
                return redirect('home');
                }
    	}
    	else
    	{
    		return redirect('home');
    	}

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
    	$aadhar=$request->input('aadhar');
    	$id=$request->input('id');
    	$count=TrustedDoctor::where(['aadhar' => $aadhar, 'registerid' => Session::get('registerid')])->count();
    	if($count)
    	{	
    		$user=User::where('aadhar',$aadhar)->first();
    		$checkup=Checkup::where([
    			'aadhar' => $aadhar,
    			'id' => $id
    	])->first();
    		return view('checkup')->with([
    			'user' => $user,
    			'checkup' => $checkup,
    		]);
    	}
    	else
    	{
    		return redirect('home');
    	}
    }
}
