<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    public $timestamps = false;
    
    protected $table='personal_info';

    protected $fillable=[
        'userid', 'full_name', 'resident_address', 'workplace_address', 'nic', 'gender', 'dob','email','contact','faculty', 'department', 'image'

    ];
}
