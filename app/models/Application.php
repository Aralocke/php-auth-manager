<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Application extends Eloquent implements UserInterface, RemindableInterface 
{
    /**
     * Table name
     */
    protected $table = 'applications';

    public function getApplicationID() {
    	return $this->id;
    }
}