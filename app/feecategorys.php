<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class feecategorys extends Model
{
    protected $table = 'feecategorys';
    protected $fillable =[
     'fee_category',
     'status',
    ];
}
