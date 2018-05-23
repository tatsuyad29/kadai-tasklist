<?php

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/', 'TasksController@index');

Route::resource('tasks', 'TasksController');
