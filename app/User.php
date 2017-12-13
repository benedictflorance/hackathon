<?php

namespace App;
use App\OfficialUser;
use App\TrustedDoctor;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    public function officialuser()
    {
    	return $this->belongsTo(OfficialUser::class,'aadhar','aadhar');
    }
    public function trusteddoctors()
    {
    	return $this->hasMany(TrustedDoctor::class, 'aadhar','aadhar');
    }
    public function checkups()
    {
    	return $this->hasMany(Checkup::class,'aadhar','aadhar');
    }
}
