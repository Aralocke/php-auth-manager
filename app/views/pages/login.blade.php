@extends('layouts.master')

@section('body')
<div class="container">
	@if (Session::has('error'))
    <div id="flash-error">
    	<p>{{{ Session::get('error') }}}</p>
    </div><!-- div#flash-error -->
	@endif
	@if (Session::has('notice'))
    <div id="flash-notice">
    	<p>{{{ Session::get('notice') }}}</p>
    </div><!-- div#flash-error -->
	@endif
	{{ Form::open(array('action' => 'AuthController@store', 'class' => 'form-signin', 'role' => 'form')) }}
		<h2 class="form-signin-heading">Please sign in</h2>
		{{ Form::label('email', 'Username') }}
		{{ Form::text('email', $value = Input::old('email'), array(
			'placeholder' => 'Username',
			'class'       => 'form-control'
		)) }}
		{{ $errors->first('email', '<div class="form-error"><p>:message</p></div>') }}
		{{ Form::label('password', 'Password') }}
		{{ Form::password('password', array(
			'placeholder' => 'Password',
			'class'       => 'form-control'
		)) }}
		{{ $errors->first('password', '<div class="form-error"><p>:message</p></div>') }}
		<label class="checkbox">
			{{ Form::checkbox('remember-me', 'remember-me', 
				Input::get('remember-me', false) ? true : false) }} Remember me
		</label>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	{{ Form::close() }}
</div> <!-- /container -->
@stop