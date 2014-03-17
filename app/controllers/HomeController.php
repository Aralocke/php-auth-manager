<?php

class HomeController extends BaseController 
{

	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	public function index()
	{
    	return View::make('pages.home')
    	    ->with(array('display_dashboard' => true));
	}
}