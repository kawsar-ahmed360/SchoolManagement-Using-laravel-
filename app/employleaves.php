<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employleaves extends Model
{
    

    public function leavepurposes(){

    	return $this->belongsTo('App\leavepurposes','leave_purpose_id','id');
    }  

     public function user(){

    	return $this->belongsTo('App\user','employ_id','id');
    }
}
