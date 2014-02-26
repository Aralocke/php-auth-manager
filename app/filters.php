<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function() {
	if (!Sentry::check()) 
	{
		return Redirect::route('login');
	}
});

Route::filter('inGroup', function($route, $request, $value)
{
	if (!Sentry::check()) 
	{
		return Redirect::route('login');
	}

	try
	{
		/* We get the session's current user */
		$user = Sentry::getUser();

		/* Get the group we're checking for */
		$group = Sentry::findGroupByName($value);

		/* User id of the session user, does not equal 
		 * what we have saved */
		if ($user->id != Session::get('uid'))
		{
			/* Rebuild the session by redirecting the user
			 * to the logout logic */
			return Redirect::route('logout');
		}

		if (!$user->inGroup($group))
		{
			Session::flash('error', trans('users.noaccess'));
			return Redirect::route('home');
		}
	}
	catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
	{
		Session::flash('error', trans('users.notfound'));
		return Redirect::route('login');
	}

	catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
	{
		Session::flash('error', trans('groups.notfound'));
		return Redirect::route('login');
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});