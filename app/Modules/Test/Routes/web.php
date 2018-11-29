<?php

//Test Category
Route::group(['prefix' => 'test-category'], function () {
    Route::get('/','TestCategoryController@index')->name('test_category_index');
    Route::get('/create','TestCategoryController@create')->name('test_category_create');
    Route::post('/store','TestCategoryController@store')->name('test_category_store');
    Route::get('/edit/{id}','TestCategoryController@edit')->name('test_category_edit');
    Route::post('/update/{id}','TestCategoryController@update')->name('test_category_update');
    Route::get('/delete/{id}','TestCategoryController@delete')->name('test_category_delete');
});





Route::get('api/test-category','TestApiController@getTestCategory')->name('api_test_category');