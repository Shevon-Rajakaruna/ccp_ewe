<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class Publications extends Model
{
    public $timestamps = false;
    
    protected $table='publications';

    protected $fillable=[
        'userid', 'name','pub_description', 'publication_type', 'pub_date', 'pub_version'
    ];

    public static function getPubCount()
    {
    	return $users = DB::table('publications')
					    ->select(DB::raw('count(*) as count'))
					    ->where('userid', Auth::user()->user_code)
					    ->distinct()->first();
    }
}
