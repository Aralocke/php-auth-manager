<?php

class HomeController extends BaseController 
{

	public function __construct()
	{
		/* Require the user to be an Admin to access these
		 * controller methods */
		$this->beforeFilter('inGroup:Admins', array(
			'only' => array('index')
		));
	}

	public function index()
	{
    	return View::make('pages.home');
	}
}