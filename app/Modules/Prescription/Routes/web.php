<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'prescription'], function () {
    Route::get('/','PrescriptionController@index')->name('prescription_index');
    Route::get('/create','PrescriptionController@create')->name('prescription_create');
    Route::post('/store','PrescriptionController@store')->name('prescription_store');




    Route::get('/medicine-taking-schedule/{type_id}','PrescriptionController@medicineTakingSchedule')->name('prescription_medicine_taking_schedule');
});
