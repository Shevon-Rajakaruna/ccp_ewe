<?php

/*
|--------- -----------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


//------------------------------------------------------
Route::get('/index','SiteController@index');
Route::get('/welcome', function (){
        return view('Site.welcome');
    });
// Route::get('/welcome','SiteController@welcome');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');


Route::get('/site/adminpanel','SiteController@adminPanel');
Route::get('/site/log','SiteController@logReport')->name('site.log');
Route::get('/site/users','SiteController@userReport')->name('site.users');
Route::get('/site/reports','SiteController@reportIndex');
Route::get('/site/edit/{id}','SiteController@editUser')->name('site.edit');
Route::post('/site/update/{id}','SiteController@userUpdate')->name('site.update');

// ---------------------------------- NEW ----------------------------------- //
Route::get('/accomplish/index','AccomplishmentsController@index')->name('accomplish.index');
Route::get('/accomplish/create','AccomplishmentsController@create');
Route::post('/accomplish/store','AccomplishmentsController@store')->name('accomplish.store');
Route::get('/accomplish/edit/{id}','AccomplishmentsController@edit')->name('accomplish.edit');
Route::post('/accomplish/update/{id}','AccomplishmentsController@update')->name('accomplish.update');
Route::post('/accomplish/delete/{id}','AccomplishmentsController@destroy')->name('accomplish.delete');
Route::get('/accomplish/view/{id}','AccomplishmentsController@show')->name('accomplish.view');

Route::get('/educational/index','EducationalController@index')->name('educational.index');
Route::get('/educational/create','EducationalController@create');
Route::post('/educational/store','EducationalController@store')->name('educational.store');
Route::get('/educational/edit/{id}','EducationalController@edit')->name('educational.edit');
Route::post('/educational/update/{id}','EducationalController@update')->name('educational.update');
Route::post('/educational/delete/{id}','EducationalController@destroy')->name('educational.delete');
Route::get('/educational/view/{id}','EducationalController@show')->name('educational.view');

Route::get('/events/index','EventsController@index')->name('events.index');
Route::get('/events/create','EventsController@create')->name('events.create');
Route::post('/events/store','EventsController@store')->name('events.store');
Route::get('/events/edit/{id}','EventsController@edit')->name('events.edit');
Route::post('/events/update/{id}','EventsController@update')->name('events.update');
Route::post('/events/delete/{id}','EventsController@destroy')->name('events.delete');
Route::get('/events/view/{id}','EventsController@show')->name('events.view');

Route::get('/personal/index','PersonalController@index')->name('personal.index');
Route::get('/personal/create','PersonalController@create');
Route::post('/personal/store','PersonalController@store')->name('personal.store');
Route::get('/personal/edit/{id}','PersonalController@edit')->name('personal.edit');
Route::post('/personal/update/{id}','PersonalController@update')->name('personal.update');
Route::post('/personal/delete/{id}','PersonalController@destroy')->name('personal.delete');
Route::get('/personal/view','PersonalController@show')->name('personal.view');
Route::get('/personal/print_cv','PersonalController@printPdf')->name('personal.print_cv');
Route::get('/personal/admin_search', 'PersonalController@adminSearch');

Route::get('/project/index','ProjectsController@index')->name('project.index');
Route::get('/project/create','ProjectsController@create')->name('project.create');
Route::post('/project/store','ProjectsController@store')->name('project.store');
Route::get('/project/edit/{id}','ProjectsController@edit')->name('project.edit');
Route::post('/project/update/{id}','ProjectsController@update')->name('project.update');
Route::post('/project/delete/{id}','ProjectsController@destroy')->name('project.delete');
Route::get('/project/view/{id}','ProjectsController@show')->name('project.view');
Route::get('/project/print/{startdate}','ProjectsController@printPdf')->name('project.print');
Route::post('/daterange/fetch_data', 'ProjectsController@fetch_data')->name('daterange.fetch_data');
Route::get('/project/adminindex','ProjectsController@adminAllView')->name('project.adminindex');
Route::get('/adsearch', 'ProjectsController@adminSearch');


Route::get('/publication/index','PublicationsController@index')->name('publication.index');
Route::get('/publication/create','PublicationsController@create')->name('publication.create');
Route::post('/publication/store','PublicationsController@store')->name('publication.store');
Route::get('/publication/edit/{id}','PublicationsController@edit')->name('publication.edit');
Route::post('/publication/update/{id}','PublicationsController@update')->name('publication.update');
Route::post('/publication/delete/{id}','PublicationsController@destroy')->name('publication.delete');
Route::get('/publication/view/{id}','PublicationsController@show')->name('publication.view');
Route::get('/publication/print','PublicationsController@printPdf')->name('publication.print');
Route::get('/search', 'PublicationsController@search');
Route::get('/publication/adminindex','PublicationsController@adminAllView')->name('publication.adminindex');
Route::get('/adminsearch', 'PublicationsController@adminSearch');

Route::get('/research/index','ResearchController@index')->name('research.index');
Route::get('/research/create','ResearchController@create')->name('research.create');
Route::post('/research/store','ResearchController@store')->name('research.store');
Route::get('/research/edit/{id}','ResearchController@edit')->name('research.edit');
Route::post('/research/update/{id}','ResearchController@update')->name('research.update');
Route::post('/research/delete/{id}','ResearchController@destroy')->name('research.delete');
Route::get('/research/view/{id}','ResearchController@show')->name('research.view');
Route::get('/research/print/{startdate}','ResearchController@printPdf')->name('research.print');
Route::post('/research/search', 'ResearchController@search_data')->name('research.search');
Route::get('/res/adminindex','ResearchController@adminAllView')->name('res.adminindex');
Route::get('/admsearch', 'ResearchController@adminSearch');

Route::get('/skill/index','SkillsController@index')->name('skill.index');
Route::get('/skill/create','SkillsController@create');
Route::post('/skill/store','SkillsController@store')->name('skill.store');
Route::get('/skill/edit/{id}','SkillsController@edit')->name('skill.edit');
Route::post('/skill/update/{id}','SkillsController@update')->name('skill.update');
Route::post('/skill/delete/{id}','SkillsController@destroy')->name('skill.delete');
Route::get('/skill/view/{id}','SkillsController@show')->name('skill.view');

Route::get('/experience/index','WorkingExperienceController@index')->name('experience.index');
Route::get('/experience/create','WorkingExperienceController@create');
Route::post('/experience/store','WorkingExperienceController@store')->name('experience.store');
Route::get('/experience/edit/{id}','WorkingExperienceController@edit')->name('experience.edit');
Route::post('/experience/update/{id}','WorkingExperienceController@update')->name('experience.update');
Route::post('/experience/delete/{id}','WorkingExperienceController@destroy')->name('experience.delete');
Route::get('/experience/view/{id}','WorkingExperienceController@show')->name('experience.view');

Route::get('/workshops/index','WorkshopsController@index')->name('workshops.index');
Route::get('/workshops/create','WorkshopsController@create')->name('workshops.create');
Route::post('/workshops/store','WorkshopsController@store')->name('workshops.store');
Route::get('/workshops/edit/{id}','WorkshopsController@edit')->name('workshops.edit');
Route::post('/workshops/update/{id}','WorkshopsController@update')->name('workshops.update');
Route::post('/workshops/delete/{id}','WorkshopsController@destroy')->name('workshops.delete');
Route::get('/workshops/view/{id}','WorkshopsController@show')->name('workshops.view');
Route::get('/workshops/print','WorkshopsController@print')->name('workshops.print');
Route::get('/workshops/adminindex','WorkshopsController@adminAllView')->name('workshops.adminindex');
Route::get('/adminSearch', 'WorkshopsController@adminSearch');

Route::get('/timetable/index','TimetableController@index')->name('timetable.index');
Route::get('/timetable/create','TimetableController@create')->name('timetable.create');
Route::post('/timetable/store','TimetableController@store')->name('timetable.store');
Route::get('/timetable/edit/{id}','TimetableController@edit')->name('timetable.edit');
Route::post('/timetable/update/{id}','TimetableController@update')->name('timetable.update');
Route::post('/timetable/delete/{id}','TimetableController@destroy')->name('timetable.delete');
Route::get('/timetable/view/{id}','TimetableController@show')->name('timetable.view');
Route::get('/timetable/print_work','TimetableController@printWorkingHours')->name('timetable.print_work');
Route::get('/timetable/print_totwork','TimetableController@printTotalWorkings')->name('timetable.print_totwork');
Route::get('/timetable/print_eval','TimetableController@printEvalWorkings')->name('timetable.print_eval');
Route::get('/timetable/working','TimetableController@totalWorkingReport')->name('timetable.working');
Route::get('/timetable/evaluation','TimetableController@workingEvaluateReport')->name('timetable.evaluation');

Route::get('/module/adminindex','ModuleController@index')->name('module.adminindex');
Route::get('/module/create','ModuleController@create');
Route::post('/module/store','ModuleController@store')->name('module.store');
Route::get('/module/edit/{id}','ModuleController@edit')->name('module.edit');
Route::post('/module/update/{id}','ModuleController@update')->name('module.update');
Route::post('/module/delete/{id}','ModuleController@destroy')->name('module.delete');
Route::get('/module/view/{id}','ModuleController@show')->name('module.view');
Route::get('/module/userindex','ModuleController@userIndex')->name('module.userindex');
Route::post('/getmodules','ModuleController@getModules');
Route::get('/module/print_report{id}','ModuleController@printModuleReport')->name('module.print_report');
Route::get('/module/search', 'ModuleController@search')->name('module.search');


Route::get('/department/index','DepartmentController@index')->name('department.index');
Route::get('/department/create','DepartmentController@create');
Route::post('/department/store','DepartmentController@store')->name('department.store');
Route::get('/department/edit/{id}','DepartmentController@edit')->name('department.edit');
Route::post('/department/update/{id}','DepartmentController@update')->name('department.update');
Route::post('/department/delete/{id}','DepartmentController@destroy')->name('department.delete');
Route::get('/department/view/{id}','DepartmentController@show')->name('department.view');
Route::get('/department/userview','DepartmentController@userView');
Route::post('/getdepartments','DepartmentController@getDepartments');

Route::get('/faculty/index','FacultyController@index')->name('faculty.index');
Route::get('/faculty/create','FacultyController@create');
Route::post('/faculty/store','FacultyController@store')->name('faculty.store');
Route::get('/faculty/edit/{id}','FacultyController@edit')->name('faculty.edit');
Route::post('/faculty/update/{id}','FacultyController@update')->name('faculty.update');
Route::post('/faculty/delete/{id}','FacultyController@destroy')->name('faculty.delete');
Route::get('/faculty/view/{id}','FacultyController@show')->name('faculty.view');
Route::get('/faculty/adminindex','FacultyController@adminIndex')->name('faculty.adminindex');


////////// testing daterange.index

Route::get('/events/cal','EventsController@calendarIndex')->name('events.cal');
Route::get('/site/face','SiteController@faceDetect');

// Route::get('/daterange/index','ProjectsController@dindex')->name('daterange.index');
