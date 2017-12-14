<?php

namespace App;
use App\Doctor;
use App\User;

use Illuminate\Database\Eloquent\Model;

class TrustedDoctor extends Model
{
    //
    public $timestamps = false;

    public function doctor()
    {
    	return $this->belongsTo(Doctor::class,'registerid','registerid');
    }
    public function user()
    {
    	return $this->belongsTo(User::class,'aadhar','aadhar');
    }
}
