<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Educational extends Model
{
    public $timestamps = false;
    
    protected $table='educational_qualification';

    protected $fillable=[
        'userid', 'institute', 'degree', 'field', 'start_date',	'end_date'
    ];
}
