<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentgrouops extends Model
{
    protected $table ='studentgrouops';
    protected $fillable =[
	'group',
	'status',
    ];
}
