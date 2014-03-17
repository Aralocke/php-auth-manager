@extends('layouts.master')

@section('body')
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
@include('includes.navigation')
</div><!-- div#navbar -->
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3 col-md-2 sidebar">
			<ul class="nav nav-sidebar">
			@section('sidebar-nav-menu')
				<li class="active"><a href="#">Overview</a></li>
				<li><a href="{{ URL::route('applications') }}">Applications</a></li>
				<li><a href="#">Analytics</a></li>
				<li><a href="#">Export</a></li>
			@show
			</ul>
			@yield('sidebar-subnav-menu')
		</div><!-- div.sidebar -->
		<div id="content" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			@if (Session::has('error'))
			<div class="alert alert-error alert-dissmissable">{{{ Session::get('error') }}}</div><!-- div.alert -->
			@endif
			@if (Session::has('notice'))
			<div class="alert alert-info alert-dissmissable">{{{ Session::get('notice') }}}</div><!-- div.alert -->
			@endif
			@if (Session::has('success'))
			<div class="alert alert-success alert-dissmissable">{{{ Session::get('success') }}}</div><!-- div.alert -->
			@endif
			@if (isset($display_dashboard) && $display_dashboard)
			<h1 class="page-header">@yield('header', 'Dashboard')</h1>
			@section('dashboard')
			<div id="dashboard" class="row placeholders">
				@include('includes.dashboard')
			</div><!-- div#dashboard -->
			@show
			@endif
			<h2 class="sub-header">@yield('content-header', 'Section title')</h2>
			@include('includes.content')
		</div><!-- div#content -->
	</div><!-- div.row -->
</div><!-- div.container-fluid -->
@stop