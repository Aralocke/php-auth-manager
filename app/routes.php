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

Route::get('/', 'HomeController@index');

Route::get('/Applications', 'ApplicationController@index');

/* User login / logout */
Route::get('/auth/login', 'AuthController@index');
Route::get('/auth/logout', 'AuthController@logout');

# OAuth 2 Routing
# Authorization
Route::post('/api/oauth/2/authorize', function()
{
    return AuthorizationServer::performAccessTokenFlow();
});