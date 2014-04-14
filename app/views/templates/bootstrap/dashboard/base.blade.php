@section('base.doctype')
<!DOCTYPE html>
@show 
@section('base.html')
<html lang="en">
@show
<head>
    <!-- Meta Tags -->
	<meta charset='utf-8'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Twitter Bootstrap 3.0.3 -->
	<!-- TWB CSS-->
	<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<!-- Primary CSS Files -->
	<link href="{{ URL::asset('assets/css/site.css') }}" media="all" rel="stylesheet" type="text/css" />
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- Primary Site Javascript -->
	<script src="{{ URL::asset('assets/js/site.js') }}" type="text/javascript"></script>
	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}">
	<title>@yield('title', 'Dashboard')</title>
	@include('templates.bootstrap.dashboard.includes.header')
</head>
<body>
	<!-- START: content -->
    @section('content.navigation')
		<!-- Empty Navigation -->
    @show
	<div class="container-fluid">
	  <div class="row">
	    <!-- START: sidebar -->
		@section('content.sidebar')
			<!-- Empty sidebar -->
	    @show
	    <!-- END: sidebar -->
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
	      @section('content.header')
	      <!-- Primary content header location -->
	      @show
	      @section('content.body')
	      <!-- Primary content location -->
	      @show
	    </div><!-- div#content -->
	  </div><!-- div.row -->
	</div><!-- div.container-fluid -->
	<!-- END: content -->
	@include('templates.bootstrap.dashboard.includes.footer')
</body>
</html>