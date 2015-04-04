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

Route::get('/user/{username}', array(
	'as' => 'profile-user',
	'uses' => 'ProfileController@user'
));
/*
| Authenticated group
*/
Route::group(array('before'=>'auth'), function() { 
	/*
	| CSRF protection group
	*/
	Route::group(array('before'=>'csrf'), function() { 	
		/*
		| Change Password (POST)
		*/
		Route::post('/account/change-password', array(
			'as' => 'account-change-password-post',
			'uses' => 'AccountController@postChangePassword'
 		));
	});
	/*
	| Change Password (GET)
	*/
	
	Route::get('/account/change-password', array(
		'as' => 'account-change-password',
		'uses' => 'AccountController@getChangePassword'
	));

	/*
	| sign out (GET)
	*/

	Route::get('/account/sign-out', array( 
		'as' => 'account-sign-out',
		'uses' => 'AccountController@getSignOut'
	));
});

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
		Route::post('/account/sign-in', array(
			'as' => 'account-sign-in-post',
			'uses' => 'AccountController@postSignIn'
		));

		Route::post('/account/forgot-password', array(
		'as' => 'account-forgot-password-post',
		'uses' => 'AccountController@postForgotPassword'
	));
	});

	Route::get('/account/forgot-password', array(
		'as' => 'account-forgot-password',
		'uses' => 'AccountController@getForgotPassword'
	));
	Route::get('/account/recover/{code}', array(
		'as' => 'account-recover',
		'uses' => 'AccountController@getRecover'
	));
	/*
	| Create Sign in
	*/
	Route::get('/account/sign-in', array(
		'as' => 'account-sign-in',
		'uses' => 'AccountController@getSignIn'
	));
	Route::get('/account/create', array(
		'as' => 'account-create',
		'uses' => 'AccountController@create'
	));

	Route::get('/account/activate/{code}', array(
		'as' => 'account-activate',
		'uses' => 'AccountController@getActivate'
	));
});