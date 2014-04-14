<?php

class AuthController extends BaseController 
{

	public static $rules = array(
		'email' => 'required|min:5|email',
		'password' => 'required|min:5|max:32'
	);

	public function create()
	{
		/* If we have an active session we redirect to the
		 * dashboard */
		if (Sentry::check())
		{
			return Redirect::route('home');
		}

		return View::make('pages.login')
		    ->with(array('title' => 'Login'));
	}

	public function destroy()
	{
		/* Redirect directly to the login page if we don't
		 * have an active session */
		if (Sentry::check())
		{
			/* Process a logout */
			Sentry::logout();
		}

        /* Redirect the user to the login page */
		return Redirect::route('login');
	}

	public function store()
	{
		/* User credentials form the POST request */
		$credentials = array(
			'email'    => Input::get('email'),
			'password' => Input::get('password')
		);

		/* Create a validator object to validate form input */
		$validator = Validator::make($credentials, self::$rules);

		/* Handle form validation errors and redirect us back to the login form */
		if ($validator->fails())
		{
			return Redirect::action('AuthController@create')
				->withInput()
				->withErrors($validator);
		}

		/* Sentry throws exceptions when it encounters an error */
		try 
		{
			/* If we successfully authenticated, we need to login */
			$remember = (bool)Input::has('remember-me');

			/* Authenticate the user's credentials */
			$user = Sentry::authenticate($credentials, $remember);

			/* Save the user's user id into the session. We use this
			 * to validate that the user is who the session belongs
			 * to during page views */
			Session::put('uid', $user->id);

			/* If we make it this far we successfully logged in */	
			return Redirect::route('home');	
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			return Redirect::route('login')
			    ->withInput()
			    ->with('error', 'Login field is required.');
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    return Redirect::route('login')
			    ->withInput()
			    ->with('error', 'User not activated.');
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			return Redirect::route('login')
			    ->withInput()
			    ->with('error', 'User not found.');
		}
	}
}