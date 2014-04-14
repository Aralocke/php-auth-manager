@extends('pages.base')

@section('breadcrumbs')
<li><a href="{{ URL::route('home') }}">Home</a></li>
<li><a href="{{ URL::route('applications.list') }}">Applications</a></li>
<li class="active">New Application</li>
@stop

@section('content.sidebar-subnav-menu')
<div class="sidebar-header">Management</div>
<ul class="nav nav-sidebar nav-sub-sidebar">
	<li><a href="{{ URL::route('applications.create') }}">New Application</a></li>
</ul><!-- ul.nav-sub-sidebar -->
@stop

@section('content.body')
<h2 class="sub-header">New Application</h2>
<p>Registering a new application callback points</p>
<div class="row">
{{ Form::open(array('route' => array('applications.store'), 'role' => 'form')) }}
	<div class="form-group {{ $errors->has('name')?'has-error':'' }}">
		<div class="col-xs-12 col-md-8">
			{{ Form::label('name', 'Application Name', array('class' => 'control-label')) }}
			{{ Form::text('name', $value = Input::old('name'), array(
				'placeholder' => 'Application Name',
				'class'       => 'form-control'
			)) }}
			{{ $errors->first('name', '<div class="help-block"><p>:message</p></div>') }}
		</div>
	</div><!-- div.form-group -->
	<div class="form-group {{ $errors->has('application_url')?'has-error':'' }}">
		<div class="col-xs-12 col-md-8">
			{{ Form::label('application_url', 'Application URL', array('class' => 'control-label')) }}
			{{ Form::text('application_url', $value = Input::old('application_url'), array(
				'placeholder' => 'Application URL',
				'class'       => 'form-control'
			)) }}
			{{ $errors->first('application_url', '<div class="help-block"><p>:message</p></div>') }}
		</div>
	</div><!-- div.form-group -->
	<div class="form-group {{ $errors->has('callback_url')?'has-error':'' }}">
		<div class="col-xs-12 col-md-8">
			{{ Form::label('callback_url', 'Callback URL', array('class' => 'control-label')) }}
			{{ Form::text('callback_url', $value = Input::old('callback_url'), array(
				'placeholder' => 'Callback URL',
				'class'       => 'form-control'
			)) }}
			{{ $errors->first('callback_url', '<div class="help-block"><p>:message</p></div>') }}
		</div>
	</div><!-- div.form-group -->
	<div class="form-group">
		<div class="col-xs-12 col-md-8"><br />
			<button type="submit" class="btn btn-default">Submit</button>
		</div>
	</div><!-- div.form-group -->
{{ Form::close() }}
</div><!-- div.row -->
@stop