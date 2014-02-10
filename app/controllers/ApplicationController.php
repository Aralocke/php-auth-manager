<?php

class ApplicationController extends BaseController {

    #protected $layout = ;

	public function index()
	{
		
		return View::make('pages.application')
		    ->with(array(
		    	'title' => 'Application Page'
		    ));;
	}
}