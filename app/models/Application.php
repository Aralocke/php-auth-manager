<?php

class Application extends Eloquent 
{
    /**
     * Table name
     */
    protected $table = 'applications';

    public $timestamps = true;

    public static function random_id($length = 64)
    {
    	$unique_id = null;
		while(strlen($unique_id) < $length)
		{
			$unique_id .= rand(0, 9);
		}

		return md5($unique_id);
    }
}