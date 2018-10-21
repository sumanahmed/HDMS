<?php


Route::get('/component', function () {
    return view('theme.component.component');
});
Route::get('/component_auto', function () {
    return view('theme.component.component_auto');
});
Route::get('/dashboard', function () {
    return view('theme.dashboard');
});
Route::get('/regularform', function () {
    return view('theme.forms.regular');
});
Route::get('/advancedform', function () {
    return view('theme.forms.advanced');
});
Route::get('/dynamic', function () {
    return view('theme.forms.dynamic');
});
Route::get('/calander', function () {
    return view('theme.kendu_ui.calender');
});
Route::get('/notification', function () {
    return view('theme.component.notifications');
});
Route::get('/datepicker', function () {
    return view('theme.kendu_ui.datepicker');
});
Route::get('/tabs', function () {
    return view('theme.component.tabs');
});
Route::get('/buttons', function () {
    return view('theme.component.buttons');
});
Route::get('/fabs', function () {
    return view('theme.component.button_fab');
});
Route::get('/common_notify', function () {
    return view('theme.component.common');
});
Route::get('/dropdown', function () {
    return view('theme.component.dropsdown');
});
Route::get('/icons', function () {
    return view('theme.component.icons');
});
Route::get('/lightbox', function () {
    return view('theme.component.lightbox');
});
Route::get('/panels', function () {
    return view('theme.component.panels');
});
Route::get('/slider', function () {
    return view('theme.component.slider');
});
Route::get('/table_example', function () {
    return view('theme.component.tables_example');
});
Route::get('/kendu_auto', function () {
    return view('theme.kendu_ui.autocomponent');
});

