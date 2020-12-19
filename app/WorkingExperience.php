<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingExperience extends Model
{
    public $timestamps = false;
    
    protected $table='working_exp';

    protected $fillable=[
        'userid', 'organization', 'designation', 'department', 'start_date', 'years', 'remarks'
    ];
}
