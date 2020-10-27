<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employattendaces extends Model
{
    

   public function user(){

    	return $this->belongsTo('App\user','employ_id','id');
    }
}
