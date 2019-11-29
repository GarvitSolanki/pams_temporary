<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Students
    Route::delete('students/destroy', 'StudentController@massDestroy')->name('students.massDestroy');
    Route::post('students/media', 'StudentController@storeMedia')->name('students.storeMedia');
    Route::post('students/parse-csv-import', 'StudentController@parseCsvImport')->name('students.parseCsvImport');
    Route::post('students/process-csv-import', 'StudentController@processCsvImport')->name('students.processCsvImport');
    Route::resource('students', 'StudentController');

    // Projects
    Route::delete('projects/destroy', 'ProjectController@massDestroy')->name('projects.massDestroy');
    Route::post('projects/media', 'ProjectController@storeMedia')->name('projects.storeMedia');
    Route::post('projects/parse-csv-import', 'ProjectController@parseCsvImport')->name('projects.parseCsvImport');
    Route::post('projects/process-csv-import', 'ProjectController@processCsvImport')->name('projects.processCsvImport');
    Route::resource('projects', 'ProjectController');
/*    Route::resource('projects/assign', 'assignProjectController');*/

    // Spocs
    Route::delete('spocs/destroy', 'SpocController@massDestroy')->name('spocs.massDestroy');
    Route::post('spocs/media', 'SpocController@storeMedia')->name('spocs.storeMedia');
    Route::post('spocs/parse-csv-import', 'SpocController@parseCsvImport')->name('spocs.parseCsvImport');
    Route::post('spocs/process-csv-import', 'SpocController@processCsvImport')->name('spocs.processCsvImport');
    Route::resource('spocs', 'SpocController');

    // Colleges
    Route::delete('colleges/destroy', 'CollegeController@massDestroy')->name('colleges.massDestroy');
    Route::post('colleges/parse-csv-import', 'CollegeController@parseCsvImport')->name('colleges.parseCsvImport');
    Route::post('colleges/process-csv-import', 'CollegeController@processCsvImport')->name('colleges.processCsvImport');
    Route::resource('colleges', 'CollegeController');

    // Coaches
    Route::delete('coaches/destroy', 'CoachController@massDestroy')->name('coaches.massDestroy');
    Route::post('coaches/media', 'CoachController@storeMedia')->name('coaches.storeMedia');
    Route::post('coaches/parse-csv-import', 'CoachController@parseCsvImport')->name('coaches.parseCsvImport');
    Route::post('coaches/process-csv-import', 'CoachController@processCsvImport')->name('coaches.processCsvImport');
    Route::resource('coaches', 'CoachController');
});
