<?php

include("theme.php");

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('logout_cms');
