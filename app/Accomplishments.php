<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accomplishments extends Model
{
    public $timestamps = false;
    
    protected $table='accomplishments';

    protected $fillable=[
        'userid', 'desp', 'title'
    ];
}
