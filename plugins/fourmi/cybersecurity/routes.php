<?php
Route::get('/welcome', 'Fourmi\CyberSecurity\Http\Controllers\ApiController@index');
Route::get('/api/countries', 'Fourmi\CyberSecurity\Http\Controllers\ApiController@countries');
Route::get('/api/{locale}/all', 'Fourmi\CyberSecurity\Http\Controllers\ApiController@all');
Route::get('/api/locale/{locale}', 'Fourmi\CyberSecurity\Http\Controllers\ApiController@changeLocale');
Route::get('/api/messages', 'Fourmi\CyberSecurity\Http\Controllers\ApiController@messages');
Route::get('/api/excel', 'Fourmi\CyberSecurity\Http\Controllers\ApiController@excel');
