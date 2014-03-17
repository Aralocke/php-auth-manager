@extends('layouts.dashboard')

@section('sidebar-nav-header')
	<div class="nav-menu-header">Application Control</div>
@stop

@section('sidebar-nav-menu')
<li class="active"><a href="{{ URL::route('applications') }} ">Your Applications</a></li>
<li><a href="{{ URL::to('applications/create') }}">Create Application</a></li>
<li><a href="#">Analytics</a></li>
<li><a href="#">Export</a></li>
@stop

@section('content-body')
{{ Form::open(array('action' => 'ApplicationController@store', 'class' => 'form-signin', 'role' => 'form')) }}

	<!-- Application Name -->
	{{ Form::label('name', 'Application Name') }}
	{{ Form::text('name', $value = Input::old('name'), array(
		'placeholder' => 'Name',
		'class'       => 'form-control'
	)) }}
	{{ $errors->first('name', '<div class="form-error"><p>:message</p></div>') }}

	<!-- Application URL -->
	{{ Form::label('application_url', 'Application URL') }}
	{{ Form::text('application_url', $value = Input::old('application_url'), array(
		'placeholder' => 'Application URL',
		'class'       => 'form-control'
	)) }}
	{{ $errors->first('application_url', '<div class="form-error"><p>:message</p></div>') }}

	<!-- Callback URL -->
	{{ Form::label('callback_url', 'Callback URL') }}
	{{ Form::text('callback_url', $value = Input::old('callback_url'), array(
		'placeholder' => 'Callback URL',
		'class'       => 'form-control'
	)) }}
	{{ $errors->first('callback_url', '<div class="form-error"><p>:message</p></div>') }}

	<!--<button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>-->
	<!-- Application Regitration -->
	{{ Form::submit('Register', array('class' => 'btn btn-lg btn-primary btn-block')) }}

{{ Form::close() }}
@stop