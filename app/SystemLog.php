<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SystemLog extends Model
{
    public $timestamps = false;
    
    protected $table='system_log';

    protected $fillable=[
        'user_id','section','category','remark','created_date'
    ];

    public static function logRep($section, $category, $remark)
    {
    	$log = new SystemLog;
      $log->user_id = Auth::user()->id;
      $log->section = $section;
      $log->category = $category;
      $log->remark = $remark;
      $log->save();
    }
}
