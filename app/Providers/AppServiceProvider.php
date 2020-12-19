<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Validator::extend('timetable_validate', function($attribute, $value, $module, $validator) {
        //     $module = Module::find($module);

        //     $tt = Timetable::where('module' , $module)

            
        //     if(!empty($value) && (strlen($value) % 2) == 0){
        //         return false;
        //     }
        //         return true;
        // });
    }
}
