<?php

Route::get('/', function() { return view('index'); });

Route::get('/email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth','verified']], function(){
    Route::get('/projects', 'ProjectController@index')->name('projects.index');
    Route::get('/projects/create', 'ProjectController@create')->name('projects.create');
    Route::get('/projects/{project}', 'ProjectController@show')->name('projects.show');
    Route::get('/projects/{project}/edit', 'ProjectController@edit')->name('projects.edit');
    Route::patch('/projects/{project}', 'ProjectController@update')->name('projects.update');
    Route::post('/projects', 'ProjectController@store')->name('projects.store');

    Route::delete('/projects/{project}', 'ProjectController@destroy')->name('project.destroy');

    Route::post('/projects/{project}/tasks', 'ProjectTaskController@store')->name('tasks.store');
    Route::patch('/projects/{project}/tasks/{task}', 'ProjectTaskController@update')->name('tasks.update');

    Route::post('/projects/{project}/invitations', 'ProjectInvitationController@store');

    Route::get('/dashboard', 'DashboardController@show')->name('dashboard');
    Route::get('/profile_dashboard', 'ProfileController@show')->name('profile_dashboard');

    Route::post('/users/{user}/avatar', 'UserAvatarController@store')->name('avatar');
});
