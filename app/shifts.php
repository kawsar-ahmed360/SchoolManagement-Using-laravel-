<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shifts extends Model
{
     protected $table ='shifts';
    protected $fillable =[
      'shift',
     'status',
    ];
}
