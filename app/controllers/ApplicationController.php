<?php

class ApplicationController extends BaseController {

    public function create()
    {
    	return View::make('pages.application.create')
	    	->with(array(
	    		'title' => 'Application Page'
	    	));
    }

	public function index()
	{
		
		return View::make('pages.application')
		    ->with(array(
		    	'title' => 'Application Page'
		    ));;
	}
}