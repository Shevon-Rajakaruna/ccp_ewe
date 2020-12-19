<?php

Auth::routes();
Route::get('/index','SiteController@index');
Route::post('login', 'LoginController@do')->name('login');
Route::post('register', 'RegisterController@do')->name('register');


Route::get('/site/adminpanel','SiteController@adminPanel');
Route::get('/site/log','SiteController@logReport');

// Route::get('/login','SiteController@login');
// Route::get('/signup','SiteController@signup');
Route::get('/welcome','SiteController@welcome');
Route::get('/academic_events/add_events','AcademicEventController@addEvents');
Route::get('/academic_events/view_events','AcademicEventController@viewEvents');

Route::get('/projects/add','ProjectController@add');
Route::get('/projects/view','ProjectController@view');
Route::get('/researches/add','ResearchController@add');
Route::get('/researches/view','ResearchController@view');
Route::get('/publications/add','PublicationController@add');
Route::get('/publications/view','PublicationController@view');

Route::get('/faculty_department/faculty','FacultyDepartmentController@view');
Route::get('/faculty_department/adminfaculty','FacultyDepartmentController@adminView');
Route::get('/faculty_department/addfaculty','FacultyDepartmentController@addFaculty');
Route::get('/faculty_department/adddepartment','FacultyDepartmentController@addDepartment');

Route::get('/biography/view', 'BiographyController@view');
Route::get('/biography/add', 'BiographyController@addpersonal');
Route::post('/uploadfile/add','BiographyController@add');
Route::get('/exp/add','ExpController@exp');
Route::get('/edu/add','EduController@edu');
Route::get('/accomp/add','AccompController@accomp');
Route::get('/skills/add','SkillsController@skills');
Route::get('/work/add','WorkController@work');
Route::get('/work/view','WorkController@viewwork');

Route::get('/module/module','ModuleController@view');
Route::get('/module/adminmodule','ModuleController@adminView');
Route::get('/module/addmodule','ModuleController@addModule');
// ---------------------------------------------------------------------
Route::get('/timetable/index','TimetableController@index')->name('timetable.view');
Route::get('/timetable/create','TimetableController@create');
Route::post('/timetable/store','TimetableController@store')->name('timetable.store');
Route::get('/timetable/edit/{id}','TimetableController@edit')->name('timetable.edit');
Route::post('/timetable/update/{id}','TimetableController@update')->name('timetable.update');
Route::post('/timetable/delete/{id}','TimetableController@destroy')->name('timetable.delete');

Route::get('/module/index','ModuleController@index')->name('module.index');
Route::get('/module/create','ModuleController@create');
Route::post('/module/store','ModuleController@store')->name('module.store');
Route::get('/module/edit/{id}','ModuleController@edit')->name('module.edit');
Route::post('/module/update/{id}','ModuleController@update')->name('module.update');
Route::post('/module/delete/{id}','ModuleController@destroy')->name('module.delete');
Route::get('/module/view/{id}','ModuleController@show')->name('module.view');

Route::get('/department/index','DepartmentController@index')->name('department.index');
Route::get('/department/create','DepartmentController@create');
Route::post('/department/store','DepartmentController@store')->name('department.store');
Route::get('/department/edit/{id}','DepartmentController@edit')->name('department.edit');
Route::post('/department/update/{id}','DepartmentController@update')->name('department.update');
Route::post('/department/delete/{id}','DepartmentController@destroy')->name('department.delete');
Route::get('/department/view/{id}','DepartmentController@show')->name('department.view');

Route::get('/faculty/index','FacultyController@index')->name('faculty.index');
Route::get('/faculty/create','FacultyController@create');
Route::post('/faculty/store','FacultyController@store')->name('faculty.store');
Route::get('/faculty/edit/{id}','FacultyController@edit')->name('faculty.edit');
Route::post('/faculty/update/{id}','FacultyController@update')->name('faculty.update');
Route::post('/faculty/delete/{id}','FacultyController@destroy')->name('faculty.delete');
Route::get('/faculty/view/{id}','FacultyController@show')->name('faculty.view');
?> 