<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 
class Timetable extends Model
{
		//use SoftDeletes, LabelFieldTrait;

    public $timestamps = false;
    
    protected $table='timetable';

    protected $fillable=[
        'ddate','module','category','tot_hours','remarks','userid'
    ];

    //////// laravel model name////////////
    // public static $labels = [
    //     'ddate' => 'Date',
    //     'module' => 'Module'
    // ];

    /////////////////// custom validations & error message/////////////////////
    // public function rules()
    // {
    //     return [
    //         'post_title' => ['bail','required','min:6', new OnlyUppercase],
    //         'post_content' => 'required'
    //     ];
    // }
    // *
    //  * Get the error messages for the defined validation rules.
    //  *
    //  * @return array
     
    // public function messages()
    // {
    //     return [
    //         'post_title.required' => 'A post title is required',
    //         'post_content.required'  => 'A post content is required',
    //     ];
    // }
}
