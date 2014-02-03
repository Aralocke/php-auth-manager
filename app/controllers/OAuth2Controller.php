<?php

class OAuth2Controller extends BaseController 
{
	public function authorize()
	{
		return View::make('oauth/authorize');
	}

	public function authorizeFormSubmit()
	{
		return View::make('oauth/authorize');
	}

	public function resource()
	{
		return View::make('oauth/authorize');
	}

	public function token()
	{
		return View::make('oauth/authorize');
	}
}