<?php
//Route::get('/welcome', 'Fourmi\CyberSecurity\Http\Controllers\ApiController@index');
//Route::get('/api/countries', 'Fourmi\CyberSecurity\Http\Controllers\ApiController@countries');
//Route::get('/api/locale/{locale}', 'Fourmi\CyberSecurity\Http\Controllers\ApiController@changeLocale');
//Route::get('/api/messages', 'Fourmi\CyberSecurity\Http\Controllers\ApiController@messages');
Route::get('/api/{locale}/all', 'Fourmi\CyberSecurity\Http\Controllers\ApiController@all');
Route::get('/api/{locale}/excel/{countries}/{dimensions}', 'Fourmi\CyberSecurity\Http\Controllers\ApiController@excel');

Route::post('/api/share/{locale}/{link}/{email}/{comment}', 'Fourmi\CyberSecurity\Http\Controllers\ApiController@share');

Route::post('/api/{locale}/contact', function($locale) {
  $data = Input::only(array('name', 'email', 'query'));
  Mail::send('fourmi.cybersecurity::emails.contact', $data, function($message)
  {
      $message->from('us@example.com', 'CiberSeguridad');
      $message->to('diegodorado@gmail.com');
  });
  $statusCode = 200;
  return Response::json([], $statusCode);
});
