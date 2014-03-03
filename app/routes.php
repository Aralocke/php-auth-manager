<?php

// Home route
Route::get('/', array(
	'as'   => 'home',
	'uses' => 'HomeController@index'
));

// Session Routes
Route::get('/auth/login',  array(
	'as'   => 'login', /* Named route */
	'uses' => 'AuthController@create'
));
Route::get('/auth/logout', array(
	'as'   => 'logout', /* Named route */ 
	'uses' => 'AuthController@destroy'
));
Route::resource('auth', 'AuthController', array(
	/* CRUD methods for the session controller */
	'only' => array(
		'create', 'store', 'destroy'
	)
));

// Application control
Route::get('applications/overview', array(
	'as'   => 'applications', /* Named route */
	'uses' => 'ApplicationController@index'
));
Route::get('applications/create', 'ApplicationController@create');
Route::get('applications', function()
{
	return Redirect::to('applications/overview');
});
Route::resource('applications', 'ApplicationController', array(
	/* CRUD methods for the session controller */
	'only' => array(
		'create', 'store', 'destroy'
	)
));
/* OAuth Integrations */
// Route::post('');