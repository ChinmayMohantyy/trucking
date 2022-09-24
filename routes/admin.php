<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');

Route::get('/student','StudentController@view');
Route::get('/loads','StudentController@viewloads');
Route::get('/addloads','StudentController@viewaddloads');
Route::post('/save-addload','StudentController@saveaddload');