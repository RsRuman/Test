<?php



Route::get('/', 'PatientController@index');
Route::get('/getDistrict/{id}', 'PatientController@getDistrict');
Route::get('/getThana/{id}', 'PatientController@getThana');
Route::post('/store', 'PatientController@store')->name('store');
