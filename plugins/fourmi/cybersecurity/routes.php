<?php

Route::get('/api/{locale}/all', 'Fourmi\CyberSecurity\Http\Controllers\ApiController@all');

Route::get('/api/{locale}/excel/{countries}/{dimensions}', 'Fourmi\CyberSecurity\Http\Controllers\ApiController@excel');

Route::post('/api/{locale}/contact', function($locale) {
  $data = Input::only(array('name', 'email', 'query'));
  Mail::send('fourmi.cybersecurity::emails.contact', $data, function($message)
  {
      $message->from($data['email'], $data['name']);
      $message->to('cybersecurity@oas.org');
  });
  $statusCode = 200;
  return Response::json([], $statusCode);
});


Route::post('/api/{locale}/share', function($locale) {
  $data = Input::only(array('link', 'email', 'comment'));
  Mail::send('fourmi.cybersecurity::emails.share', $data, function($message) use($data)
  {
      $message->from('cybersecurity@oas.org', 'CiberSeguridad');
      $message->to($data['email']);
  });
  $statusCode = 200;
  return Response::json([], $statusCode);
});
