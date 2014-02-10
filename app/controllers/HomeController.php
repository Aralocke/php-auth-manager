<?php

class HomeController extends BaseController {

	public function index()
	{
    	return View::make('pages.home')
		    ->with(array(
		    	'title' => 'Home Page'
		    ));;
	}
}