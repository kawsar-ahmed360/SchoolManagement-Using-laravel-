<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sessions extends Model
{
    protected $table ='sessions';

    protected $fillable =[
     'session',
     'status',
    ];
}
