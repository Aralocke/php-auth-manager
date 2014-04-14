<?php

HTML::macro('dashboard_navigation_link', function($route, $text) {	
	$active = '';

	if (Route::currentRouteName() == $route) 
	{
		$active = ' class="active"';
	}
 
    return '<li'.$active.'><a href="'.URL::route($route).'">'.$text.'</a></li>';
});