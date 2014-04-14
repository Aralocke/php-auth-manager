@extends('pages.base')

@section('breadcrumbs')
<li><a href="{{ URL::route('home') }}">Home</a></li>
<li><a href="{{ URL::route('applications.list') }}">Applications</a></li>
<li><a href="{{ URL::route('applications.view', $application->id) }}">{{ $application->name }}</a></li>
<li class="active">Delete</li>
@stop

@section('content.sidebar-subnav-menu')
<div class="sidebar-header">Management</div>
<ul class="nav nav-sidebar nav-sub-sidebar">
	<li><a href="{{ URL::route('applications.create') }}">New Application</a></li>
	<li><a href="{{ URL::route('applications.delete', $application->id) }}">Delete Application</a></li>
</ul><!-- ul.nav-sub-sidebar -->
@stop

@section('content.body')
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-md-10">
			<h2 class="sub-header">{{ $application->name }}</h2>
			<div class="row">
				<p>Please confirm this operation</p>
				<p>By continuing you will delete this application and invalidate all authorization tokens currently in use.</p>
				{{ Form::open(array('route' => array('applications.delete', $application->id), 'method' => 'DELETE')) }}
					{{ Form::submit('Delete Application', array('class' => 'btn btn-success')) }}
					<a href="{{ URL::route('applications.view', $application->id) }}" class="btn btn-danger">Cancel</a>
				{{ Form::close() }}
			</div><!-- div.row -->
		</div><!-- width control -->
	</div><!-- div.row -->
</div><!-- div.container-fluid -->
@overwrite