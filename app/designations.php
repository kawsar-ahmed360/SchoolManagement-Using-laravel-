<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class designations extends Model
{
    protected $table = 'designations';

    protected $fillable = [
       'name',
       'status',
    ];
}
