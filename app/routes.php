<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@home'	
));

/*
| Unauthenticated group
*/

Route::group(array('before' => 'guest'), function() {

	/*
	| CSRF protection group
	*/
	Route::group(array('before' => 'csrf'), function() { 
		/*
		| Create Account GET
		*/
		Route::post('/account/store', array(
			'as' => 'account-store',
			'uses' => 'AccountController@store' 
		));
	});
	Route::get('/account/create', array(
		'as' => 'account-create',
		'uses' => 'AccountController@create'
	));
});