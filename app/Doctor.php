<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OfficialDoctor;
use App\TrustedDoctor;

class Doctor extends Model
{
    //
    public function officialdoctor()
    {
    	return $this->belongsTo(OfficialDoctor::class,'registerid','registerid');
    }
    public function trustedusers()
    {
    	return $this->hasMany(TrustedDoctor::class, 'registerid','registerid');
    }
}
