<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class Workshops extends Model
{
    public $timestamps = false;
    
    protected $table='workshops';

    protected $fillable=[
        'userid', 'workshop', 'event_name', 'venue', 'event_date', 'event_time'
    ];

    public static function getWorkshopsCount()
    {
    	return $users = DB::table('workshops')
					    ->select(DB::raw('count(*) as count'))
					    ->where('userid', Auth::user()->user_code)
					    ->distinct()->first();
    }
}
