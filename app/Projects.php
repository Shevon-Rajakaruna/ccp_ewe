<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class Projects extends Model
{
    public $timestamps = false;
    
    protected $table='projects';

    protected $fillable=[
        'userid', 'topic', 'description', 'project_type', 'started_date', 'completed_date', 'module', 'estimate_time', 'batch'
    ];

    public static function getProjectCount()
    {
    	$project = DB::table('projects')
					    ->select(DB::raw('count(*) as count'))
					    ->where('userid', Auth::user()->user_code)
					    ->distinct()->first();

			return $project;
    }
}
