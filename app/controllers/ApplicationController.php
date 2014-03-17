<?php

class ApplicationController extends BaseController 
{
	public function __construct()
	{
		$this->beforeFilter('auth');
	}

    public function create()
    {
    	// return 'ROUTED'; /* works */
    	return View::make('pages.application.create')
	    	->with(array('title' => 'Application Page'));
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
		
		return View::make('pages.application')
		    ->with(array(
		    	'applications' => $applications,
		    	'title' => 'Application Page'
		    ));;
	}

	public function update($id)
	{

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
			'name'       => 'required',
			'application_url' => 'required',
			'callback_url' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('applications/create')
				->withErrors($validator)
				->withInput(); 
		} else {

			$unique_id = null;
			while(strlen($unique_id) < 64)
			{
				$unique_id .= rand(0, 9);
			}
			$unique_id = md5($unique_id);

			// store
			$application = new Application;
			$application->id              = $unique_id;
			$application->name            = Input::get('name');
			$application->uid             = $user->id;
			$application->application_url = Input::get('application_url');
			$application->callback_url    = Input::get('callback_url');
			$application->save();

			// redirect
			return Redirect::route('applications')
				->with('success', 'Successfully registered application!');
		}
    }

    public function view($id)
    {
    	$application = Application::findOrFail($id);

    	return View::make('pages.application.view')
	    	->with(array('application' => $application));
    }

    public function updateForm($id)
    {
    	return 'Display the update form';
    }

    public function deleteForm($id)
    {
    	return 'Display the delete form';
    }
}