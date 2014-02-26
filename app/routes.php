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
Route::resource('sessions', 'AuthController', array(
	/* CRUD methods for the session controller */
	'only' => array(
		'create', 'store', 'destroy'
	)
));

// Application control
Route::get('/applications', array(
	'as'   => 'applications', /* Named route */
	'uses' => 'ApplicationController@index'
));

/* OAuth Integrations */
// Route::post('');