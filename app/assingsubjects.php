<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class assingsubjects extends Model
{
    protected $table ='assingsubjects';
    protected $fillable =[
       'class_id',
       'subject_id',
       'full_mark',
       'pass_mark',
       'get_mark',
    ];

    public function class(){

    	return $this->belongsTo('App\studentclasses','class_id');
    }  


     public function subjects(){

      return $this->belongsTo('App\subjects','subject_id','id');
    }
}
