<?php

require_once(app_path('helpers.php'));

Route::get('/', function () {
    return redirect()->route('projects.index');
});

Route::resource('projects', 'ProjectsController');
Route::resource('files', 'FilesController')->only([
	'index', 'show', 'update', 'destroy'
]);
Route::post('projects/{id}/files', 'ProjectFilesController@store')->name('projectfiles.store');
