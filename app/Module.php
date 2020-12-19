<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public $timestamps = false;
    
    protected $table='modules';

    protected $fillable=[
        'mod_code', 'mod_name',	'department', 'year', 'semester', 'lec_hours', 'tute_hours', 'lab_hours', 'max_lec'
    ]; 
}
