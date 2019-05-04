<?php

use App\Jobs\SendEmailJob;
use Carbon\Carbon;

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contacts', 'ContactsController@get');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');
Route::post('/conversation/send', 'ContactsController@send');


Route::get('sendEmail', function(){

  $job = (new SendEmailJob())
  ->delay(Carbon::now()->addSeconds(5));

  dispatch($job);
});

Auth::routes();
