@extends('pages.base')

@section('breadcrumbs')
<li><a href="{{ URL::route('home') }}">Home</a></li>
<li><a href="{{ URL::route('applications.list') }}">Applications</a></li>
<li class="active">{{ $application->name }}</li>
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
			{{ Form::model($application, array('route' => array('applications.update', $application->id), 'method' => 'PUT')) }}
			<div class="row">
				<div class="col-xs-12 col-md-6"><dl class="pull-left">
					<dt>Registered at</dt>
					<dd>{{ $application->created_at }}</dd>
					<dt>Last Updated</dt>
					<dd>{{ $application->updated_at }}</dd>
					<dt><a href="{{ URL::route('applications.transfer', $application->id) }}">Transfer Ownership</a></dt>
					<dd>Owned by: <a href="{{ URL::route('users.view', $application->owner->id) }}">{{ $application->owner->email }}</a></dd>
				</dl></div><!-- left column -->
				<div class="col-xs-12 col-md-6"><dl class="pull-right">
					<dt>Client ID</dt>
					<dd>{{ $application->access_token }}</dd>
					<dt class="gray">Client Secret</dt>
					<dd>{{ $application->secret_token }}</dd>
					<dt><br /><div class="btn-group">
						<a href="{{ URL::route('applications.view', $application->id) }}" class="btn btn-default">Revoke User Tokens</a>
						<a href="{{ URL::route('applications.view', $application->id) }}"class="btn btn-default">Reset Client Secret</a>
					</div><!-- btn-group --></dt>
				</dl></div><!-- Right column -->
			</div><!-- div.row -->
			<div class="row">
				<div class="col-xs-12 col-md-9">
					<div class="form-group">
						{{ Form::label('name', 'Application Name', array('class' => 'control-label')) }}
						{{ Form::text('name', $value = Input::old('name'), array(
							'placeholder' => 'Application Name',
							'class'       => 'form-control'
						)) }}
					</div><!-- form-group -->
					<div class="form-group">
						{{ Form::label('application_url', 'Application URL', array('class' => 'control-label')) }}
						{{ Form::text('application_url', $value = Input::old('application_url'), array(
							'placeholder' => 'Application URL',
							'class'       => 'form-control'
						)) }}
					</div><!-- form-group -->
				</div>
				<div class="col-xs-6 col-md-3">&nbsp;</div>
			</div><!-- div.row -->
			<div class="row">
				<div class="col-xs-12 col-md-12">
					<div class="form-group">
						{{ Form::label('description', 'Application description', array('class' => 'control-label')) }}
						{{ Form::textarea('description', $value = Input::old('description'), array(
							'placeholder' => 'Application description',
							'class'       => 'form-control',
							'style'       => 'height:75px;'
						)) }}
					</div><!-- form-group -->
				</div>
			</div><!-- div.row -->
			<div class="row">
				<div class="col-xs-12 col-md-9">
					<div class="form-group">
						{{ Form::label('callback_url', 'Authorization Callback URL', array('class' => 'control-label')) }}
						{{ Form::text('callback_url', $value = Input::old('callback_url'), array(
							'placeholder' => 'Callback URL',
							'class'       => 'form-control'
						)) }}
					</div><!-- form-group -->
				</div>
			</div><!-- div.row -->
			<div class="row">
				<div class="col-xs-6 col-md-12">
					<div class="form-group pull-left">
						<input type="submit" class="btn btn-success" value="Update Application">
						<a href="{{ URL::route('applications.confirm', $application->id) }}" class="btn btn-danger">Delete Application</a>
					</div><!-- form-group -->
				</div>
			</div><!-- div.row -->
			{{ Form::close() }}
		</div>
	</div><!-- div.row -->
</div><!-- div.container-fluid -->
@stop