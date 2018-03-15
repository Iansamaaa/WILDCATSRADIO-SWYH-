<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

Auth::routes();

Route::get('/','SessionsController@main');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/apiChat','ChatController@getChat');

Route::post('/chat','ChatController@store');

Route::get('/chat', 'ChatController@getChat');

Route::get('/chatAdmin', 'ChatController@getChatAdmin');

Route::delete('/chat', 'ChatController@destroy');

Route::post('/schedule', function (Request $request) {
	$length = DB::table('schedule')->count();
		for ($i=0; $i < $length; $i++) { 
			DB::table('schedule')
            ->where('id', $i+1)
            ->update(['genre' => $request->schedule[$i]]);
		}
		return redirect('/');
});

Route::post('/register', 'RegistrationController@store');

Route::get('/home', 'HomeController@index')->name('home');
