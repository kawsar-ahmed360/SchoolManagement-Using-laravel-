<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class examtypes extends Model
{
    protected $table ='examtypes';
    protected $fillable =[
         'exam_name',
         'status',
    ];
}
