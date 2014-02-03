<?php

class HomeController extends BaseController {

	public function index()
	{
		return View::make('templates/default/home');
	}
}