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
</ul><!-- ul#subnav -->
@stop

@section('content-body')
{{ Form::open(array('route' => array('applications.delete', $application->id), 'method' => 'DELETE')) }}

	{{ Form::submit('Confirm Delete', array('class' => 'btn btn-lg btn-primary btn-block')) }}

{{ Form::close() }}
@overwrite