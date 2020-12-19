<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class Research extends Model
{
    public $timestamps = false;
    
    protected $table='research';

    protected $fillable=[
        'userid', 'name', 'description', 'status', 'module', 'start_date', 'complete_date', 'groupID', 'estimate_time'
    ];

    public static function getResearchCount()
    {
    	return $users = DB::table('research')
					    ->select(DB::raw('count(*) as count'))
					    ->where('userid', Auth::user()->user_code)
					    ->distinct()->first();
    }
}
			