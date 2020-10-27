<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subjects extends Model
{
    protected $table = 'subjects';
    protected $fillable =[
       'subject',
      'status',
    ];
}
