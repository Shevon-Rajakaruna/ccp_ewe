<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    public $timestamps = false;
    
    protected $table='designations';

    protected $fillable=[
        'user_level', 'desp'
    ];
}
