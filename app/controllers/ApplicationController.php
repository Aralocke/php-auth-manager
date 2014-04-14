<?php

class ApplicationController extends BaseController 
{
	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	public function confirm($id)
	{
		$application = Application::findOrFail($id);

		return View::make('pages.application.confirm')
			->with(array('application' => $application));
	}

    public function create()
    {
    	return View::make('pages.application.create')
	    	->with(array('title' => 'Application Page'));
    }

    public function delete($id)
    {
		// delete
		$application = Application::findOrFail($id);
		$name = $application->name;
		
		$application->delete();

		return Redirect::route('applications.list')
			->with('success', 'Successfully deleted '.$name);
	}

	public function index()
	{
		try
		{
		    // Get the current active/logged in user
		    $user = Sentry::getUser();
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			/* Something changed with the user, force a new login 
			 * and refresh the session */
		    return Redirect::route('logout');
		}

		$applications = Application::where('uid', '=', $user->id)
			->paginate(15);
		
		return View::make('pages.application.index')
		    ->with(array(
		    	'applications' => $applications,
		    	'title' => 'Application Page'
		    ));;
	}

	public function update($id)
	{
		// validate
		$rules = array(
			'name'            => 'required|min:3|max:64',
			'application_url' => 'required|url|max:155',
			'callback_url'    => 'required|url|max:155',
			'description'     => 'max:255'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::route('applications.update')
				->withErrors($validator)
				->withInput(); 
		}

		$application = Application::findOrFail($id);
		$application->name            = Input::get('name');
		$application->application_url = Input::get('application_url');
		$application->callback_url    = Input::get('callback_url');
		$application->description     = Input::get('description');
		$application->save();

		// redirect
		return Redirect::route('applications.view', $application->id)
			->with('success', 'Successfully updated application!');
	}

	public function store()
    {
    	try
		{
		    // Get the current active/logged in user
		    $user = Sentry::getUser();
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			/* Something changed with the user, force a new login 
			 * and refresh the session */
		    return Redirect::route('logout');
		}

    	// validate
		$rules = array(
			'name'            => 'required',
			'application_url' => 'required|url',
			'callback_url'    => 'required|url'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) 
		{
			return Redirect::route('applications.create')
				->withErrors($validator)
				->withInput(); 
		} 
		else 
		{
			$application                  = new Application;
			$application->id              = Application::random_id(32);
			$application->name            = Input::get('name');
			$application->uid             = $user->id;
			$application->application_url = Input::get('application_url');
			$application->callback_url    = Input::get('callback_url');

			$application->access_token    = Application::random_id(32);
			$application->secret_token    = Application::random_id(32);

			$application->save();

			// redirect
			return Redirect::route('applications.list')
				->with('success', 'Successfully registered application!');
		}
    }

    public function view($id)
    {
    	$application = Application::findOrFail($id);

    	return View::make('pages.application.view')
	    	->with(array('application' => $application));
    }
}