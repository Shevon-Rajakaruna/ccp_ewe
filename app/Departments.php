<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    public $timestamps = false;
    
    protected $table='departments';

    protected $fillable=[
        'desp', 'faculty'
    ]; 
}
