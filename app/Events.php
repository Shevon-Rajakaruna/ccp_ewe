<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    public $timestamps = false;
    
    protected $table='events';

    protected $fillable=[
        'userid', 'ename', 'edesp', 'organizer', 'edate', 'etime'
    ];
}
