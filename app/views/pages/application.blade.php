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
<h3>Application overview</h3>
@stop