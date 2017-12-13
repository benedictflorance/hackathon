<?php

namespace App;
use App\Doctor;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Checkup extends Model
{
    //
    public function user()
    {
    	return $this->belongsTo(User::class,'aadhar','aadhar');
    }
    public function doctor()
    {
    	return $this->belongsTo(Doctor::class,'registerid','registerid');
    }
}
