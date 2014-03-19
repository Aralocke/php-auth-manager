@extends('layouts.dashboard')

@section('sidebar-nav-menu')
<li class="active"><a href="{{ URL::route('applications') }} ">Your Applications</a></li>
<li><a href="{{ URL::to('applications/create') }}">Create Application</a></li>
<li><a href="#">Analytics</a></li>
<li><a href="#">Export</a></li>
@stop

@section('sidebar-subnav-menu')
<ul id="sub-nav" class="nav nav-sidebar">
	<li><a href="{{ URL::to('applications/'.$application->id.'/update') }}">Update</a></li>
	<li><a href="{{ URL::to('applications/'.$application->id.'/delete') }}">Delete</a></li>
</ul><!-- ul#subnav -->
@overwrite

@section('content-header')
Update Application
@overwrite

@section('content-body')
{{ Form::model($application, array('route' => array('applications.update', $application->id), 'method' => 'PUT')) }}

	<!-- Application Name -->
	{{ Form::label('name', 'Application Name') }}
	{{ Form::text('name', null, array(
		'placeholder' => 'Name',
		'class'       => 'form-control'
	)) }}
	{{ $errors->first('name', '<div class="form-error"><p>:message</p></div>') }}

	<!-- Application URL -->
	{{ Form::label('application_url', 'Application URL') }}
	{{ Form::text('application_url', null, array(
		'placeholder' => 'Application URL',
		'class'       => 'form-control'
	)) }}
	{{ $errors->first('application_url', '<div class="form-error"><p>:message</p></div>') }}

	<!-- Callback URL -->
	{{ Form::label('callback_url', 'Callback URL') }}
	{{ Form::text('callback_url', null, array(
		'placeholder' => 'Callback URL',
		'class'       => 'form-control'
	)) }}
	{{ $errors->first('callback_url', '<div class="form-error"><p>:message</p></div>') }}

	<!-- Application Regitration -->
	{{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary btn-block')) }}
{{ Form::close() }}
@overwrite