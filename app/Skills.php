<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    public $timestamps = false;
    
    protected $table='skills';

    protected $fillable=[
        'userid', 'skills', 'desp', 'endorsements'
    ];
}
