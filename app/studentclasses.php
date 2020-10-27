<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentclasses extends Model
{
    protected $table ='studentclasses';

    protected $fillable = [
     'class_name',
     'status',
    ];
}
