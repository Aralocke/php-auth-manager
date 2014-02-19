@extends('layouts.master')

@section('body')
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
@include('includes.navigation')
</div><!-- div#navbar -->
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3 col-md-2 sidebar">
		@section('sidebar-nav-menu')
			<ul class="nav nav-sidebar">
			<li class="active"><a href="#">Overview</a></li>
			<li><a href="#">Reports</a></li>
			<li><a href="#">Analytics</a></li>
			<li><a href="#">Export</a></li>
			</ul>
		@show
		</div><!-- div.sidebar -->
		<div id="content" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">@yield('header', 'Dashboard')</h1>
			<div id="dashboard" class="row placeholders">
				@include('includes.dashboard')
			</div><!-- div#dashboard -->
			<h2 class="sub-header">Section title</h2>
			<div class="table-responsive">
				@include('includes.content')
			</div><!-- div.table-responsive -->
		</div><!-- div#content -->
	</div><!-- div.row -->
</div><!-- div.container-fluid -->
@stop