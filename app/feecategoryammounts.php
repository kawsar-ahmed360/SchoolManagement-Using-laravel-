<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class feecategoryammounts extends Model
{
    protected $table ='feecategoryammounts';
    protected $fillable =[
     'class_id',
     'fee_category_id',
     'ammount',
     'status',
    ];


    public function feecategor(){

    	return $this->belongsTo(feecategorys::class,'fee_category_id','id');
    }
}
