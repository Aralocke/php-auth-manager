<?php

class AuthController extends BaseController {

	public function index()
	{
		
		return View::make('pages.login')
		    ->with(array(
		    	'title' => 'Application Page'
		    ));;
	}
}