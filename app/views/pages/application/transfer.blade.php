@extends('pages.base')

@section('breadcrumbs')
<li><a href="{{ URL::route('home') }}">Home</a></li>
<li><a href="{{ URL::route('applications.list') }}">Applications</a></li>
<li><a href="{{ URL::route('applications.view', $application->id) }}">{{ $application->name }}</a></li>
<li class="active">Transfer Ownership</li>
@stop

@section('content.sidebar-subnav-menu')
<div class="sidebar-header">Management</div>
<ul class="nav nav-sidebar nav-sub-sidebar">
	<li><a href="{{ URL::route('applications.create') }}">New Application</a></li>
	<li><a href="{{ URL::route('applications.transfer', $application->id) }}">Transfer Application</a></li>
	<li><a href="{{ URL::route('applications.confirm', $application->id) }}">Delete Application</a></li>
</ul><!-- ul.nav-sub-sidebar -->
@stop

@section('content.body')
<div class="container-fluid">
    <div class="row">
		<div class="col-xs-12 col-md-10">
			<h2 class="sub-header">{{ $application->name }}</h2>
			{{ Form::open(array('route' => array('applications.update', $application->id), 'method' => 'PUT')) }}
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<div class="form-group">
							{{ Form::label('owner_id', 'New Owner', array('class' => 'control-label')) }}
							{{ Form::select('owner_id', $users, null, array('class' => 'form-control')) }}
						</div>
						<div class="form-group">
							{{ Form::submit('Transfer Application', array('class' => 'btn btn-success')) }}
							<a href="{{ URL::route('applications.view', $application->id) }}" class="btn btn-danger">Cancel</a>
						</div>
					</div>
				</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
@stop
