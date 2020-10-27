<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class assignstudents extends Model
{
    //



    public function sessions(){

    	return $this->belongsTo('App\sessions','session_id');
    } 

       public function user(){

    	return $this->belongsTo('App\user','student_id','id');
    } 

      public function discountstudents(){

    	return $this->belongsTo('App\discountstudents','id','assign_student_id');
    }
}
