<?php

/* Include the HTML macros file */
require_once app_path().'/macros.php';

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
	'as'   => 'applications.list', /* Named route */
	'uses' => 'ApplicationController@index'
));
Route::get('applications/{id}/view', array(
    'as' => 'applications.view',
    'uses' => 'ApplicationController@view'
));
Route::get('applications/{id}/transfer', array(
    'as' => 'applications.transfer',
    'uses' => 'ApplicationController@view'
));
Route::get('applications/{id}/delete', array(
	'as' => 'applications.confirm',
	'uses' => 'ApplicationController@confirm'
));
Route::delete('applications/{id}/delete', array(
	'as' => 'applications.delete',
	'uses' => 'ApplicationController@delete'
));
Route::put('applications/{id}/update', array(
	'as' => 'applications.update',
	'uses' => 'ApplicationController@update'
));
Route::resource('applications', 'ApplicationController', array(
	/* CRUD methods for the session controller */
	'only' => array('create', 'store')
));
Route::get('applications', function()
{
	return Redirect::route('applications');
});

/* LDAP Controller routes */
Route::get('ldap/overview', array(
	'as' => 'ldap.list', 
	'uses' => 'HomeController@index'
));

/* User management */
Route::get('users/overview', array(
	'as' => 'users.list', 
	'uses' => 'HomeController@index'
));
Route::get('users/{id}/view', array(
	'as' => 'users.view', 
	'uses' => 'HomeController@index'
));

/* Fake routes */
Route::get('profile', array('as' => 'profile', 'uses' => 'HomeController@index'));
Route::get('settings', array('as' => 'settings', 'uses' => 'HomeController@index'));