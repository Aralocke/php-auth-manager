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
	'only' => array('create', 'store', 'destroy')
));

// Application control
Route::get('applications/overview', array(
	'as'   => 'applications', /* Named route */
	'uses' => 'ApplicationController@index'
));

/* Viewing an individual application data */
Route::get('applications/{id}/view', array(
    'as' => 'applications.view',
    'uses' => 'ApplicationController@view'
));

Route::get('applications/{id}/delete', 'ApplicationController@deleteForm');
Route::get('applications/{id}/update', 'ApplicationController@updateForm');

Route::resource('applications', 'ApplicationController', array(
	/* CRUD methods for the session controller */
	'only' => array('create', 'store', 'destroy', 'update')
));
Route::get('applications', function()
{
	return Redirect::route('applications');
});
/* OAuth Integrations */
// Route::post('');