<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\OfficialDoctor;
use App\Doctor;

class LoginController extends Controller
{
    //
    public function showMailForm()
    {
        return view('verifyemail');
    }
    public function showRegisterForm(Request $request)
    {
        return view('register')->with('token',$request->input('token'));
    }
    public function showLoginForm()
    {
        return view('login');
    }
    public function storeDoctorDetails(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'name' => 'required|max:511|string',
                'mobile' => 'required|numeric|digits:10',
                'hname' => 'required|string|max:511',
                'haddress' => 'required|string',
                'password' => 'required|string|min:6|max:127|confirmed',
                'password_confirmation' => 'required|string|min:6|max:127',
                'token' => 'required|string|size:60',
            ]);
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator);
            }
            else
            {
                $officialdoctor=OfficialDoctor::where('token',$request->input('token'));
                if($officialdoctor->count())
                {
                    $registerid=$officialdoctor->first()->registerid;
                    Doctor::create([
                        'registerid' => $registerid,
                        'name' => $request->input('name'),
                        'mobile' => $request->input('mobile'),
                        'hname' => $request->input('hname'),
                        'haddress' => $request->input('haddress'),
                        'password' => password_hash($request->input('password'),PASSWORD_DEFAULT),
                    ]);
                    return view('login');
                }
                else
                {
                return view('register')->with('failure','Your token is invalid');    
                }
            }
    }
    public function login()
    {

    }
    public function logout()
    {

    }
}
