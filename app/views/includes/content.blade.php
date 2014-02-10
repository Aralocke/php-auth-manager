<div id="content-left">
	<div class="sub-nav-menu">
		@section('sidebar-nav-header')
			<div class="nav-menu-header">Navigation</div>
		@show
		<ul id="nav-menu" class="menu">
			@yield('sidebar-nav-menu')
		</ul><!-- ul#nav-menu -->
	</div><!--div.sub-nav-menu -->
</div><!-- div#content-left -->
<div id="content-right">
	@yield('content')
</div><!-- div#content-right -->