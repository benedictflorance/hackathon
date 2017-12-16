<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\OfficialDoctor;
use App\Doctor;
use Session;

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
                    return redirect('login');
                }
                else
                {
                return view('register')->with('failure','Your token is invalid');    
                }
            }
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'registerid' => 'required|numeric|digits_between:1,10',
                'password' => 'required|max:127'
            ]);
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator);
            }
            else
            {
                $registerid = $request->input('registerid');
                $password = $request->input('password');
                $doctor = Doctor::where('registerid','=',$registerid)->first();
                if($doctor)
                {
                    if(password_verify($password,$doctor->password))
                    {
                        $remember_token = str_random(60);
                        $doctor->update(['remember_token' => $remember_token]);
                        Session::put([
                            'name' => $doctor->name,
                            'email' => $doctor->officialdoctor()->first()->email,
                            'registerid' => $doctor->registerid,
                            'mobile' => $doctor->mobile,
                            'hname'=> $doctor->hname,
                            'haddress' => $doctor->haddress,
                        ]);       
                        return redirect('home');       
                    }
                    else
                    {
                    return view('login')->with('failure','Invalid Credentials');

                    }
                }
                else
                    {
                    return view('login')->with('failure','Invalid Credentials');

                    }    
            }

   }
    public function logout(Request $request)
    {
        Session::flush();
        return redirect('login');
    }
}