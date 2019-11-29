<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Students
    Route::post('students/media', 'StudentApiController@storeMedia')->name('students.storeMedia');
    Route::apiResource('students', 'StudentApiController');

    // Projects
    Route::post('projects/media', 'ProjectApiController@storeMedia')->name('projects.storeMedia');
    Route::apiResource('projects', 'ProjectApiController');

    // Spocs
    Route::post('spocs/media', 'SpocApiController@storeMedia')->name('spocs.storeMedia');
    Route::apiResource('spocs', 'SpocApiController');

    // Colleges
    Route::apiResource('colleges', 'CollegeApiController');

    // Coaches
    Route::post('coaches/media', 'CoachApiController@storeMedia')->name('coaches.storeMedia');
    Route::apiResource('coaches', 'CoachApiController');
});
