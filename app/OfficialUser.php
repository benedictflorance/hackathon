<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Checkup;

class OfficialUser extends Model
{
    //
    public function user()
    {
    	return $this->hasOne(User::class,'aadhar','aadhar');
    }
}
