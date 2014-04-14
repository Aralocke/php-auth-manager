@extends('templates.bootstrap.dashboard.base')

@section('content.navigation')
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ URL::route('home') }}">@yield('project', 'Project name')</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="{{ URL::route('home') }}">Dashboard</a></li>
				<li><a href="{{ URL::route('settings') }}">Settings</a></li>
				<li><a href="{{ URL::route('profile') }}">Profile</a></li>
				<li><a href="{{ URL::route('logout') }}">Logout</a></li>
			</ul>
			<form id="search-form" class="navbar-form navbar-right">
				<input type="text" class="form-control" placeholder="Search...">
			</form><!-- form#search-form -->
		</div><!-- div.navbar-collapse -->
	</div><!-- div.container-fluid -->
</div><!-- div#navbar -->
@stop

@section('content.sidebar')
<div class="col-sm-3 col-md-2 sidebar">
	<div class="sidebar-header">Navigation</div>
	<ul class="nav nav-sidebar">
	@section('content.sidebar-nav-menu')
		{{ HTML::dashboard_navigation_link('home', 'Overview') }}
		{{ HTML::dashboard_navigation_link('applications.list', 'Applications') }}
		{{ HTML::dashboard_navigation_link('ldap.list', 'LDAP Servers') }}
		{{ HTML::dashboard_navigation_link('users.list', 'Users') }}
	@show
	</ul><!-- ul.nav-sidebar -->
	@section('content.sidebar-subnav-menu')
    	<!-- Empty subnav bar -->
	@show
</div><!-- div.sidebar -->			
@stop

@section('content.header')
<ol class="breadcrumb">
	@section('breadcrumbs')
	<li class="active">Home</li>
	@show
</ol>
@stop

