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
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Application overview</div>
  <div class="panel-body">
    <p>Your application list and some basic explanation goes in here</p>
  </div>

  <!-- Table -->
  <table class="table">
    <thead>
		<tr>
			<td>Application Name</td>
			<td>App URL</td>
			<td>Callback URL</td>
		</tr>
    </thead>
    <tbody>
    	@if ($applications->count() == 0)
    	<tr><td colspan="4">No applications here been registered. Register a new one <a href="{{ URL::route('applications.create') }}">HERE</a></td></tr>
    	@else
    	@foreach ($applications as $application)
    	<tr>
		    <td><a href="{{ URL::to('applications/'.$application->id.'/view') }}">{{ $application->name }}</a></td>
		    <td>{{ $application->application_url }}</td>
		    <td>{{ $application->callback_url }}</td>
    	</tr>
    	@endforeach
    	@endif
    	<tr>
    		<!-- For paginated links -->
			<td colspan="4"></td>
    	</tr>
    </tbody>
  </table>
</div>
@overwrite