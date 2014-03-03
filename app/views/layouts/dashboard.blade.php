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
		</div><!-- div.sidebar -->
		<div id="content" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">@yield('header', 'Dashboard')</h1>
			@section('dashboard')
			<div id="dashboard" class="row placeholders">
				@include('includes.dashboard')
			</div><!-- div#dashboard -->
			@show
			<h2 class="sub-header">@yield('content-header', 'Section title')</h2>
			@include('includes.content')
		</div><!-- div#content -->
	</div><!-- div.row -->
</div><!-- div.container-fluid -->
@stop