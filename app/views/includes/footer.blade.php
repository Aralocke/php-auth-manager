<div class="wrapper">
	<!-- Wrapper will wrap the content within a centered block -->
	<div id="footer-left" class="footer-column">
		<div id="copyright">
		@section('copyright')
			Copyright 2013-2014
		@show
		</div><!--div#copyright -->
	</div><!-- div#footer-left -->
	<div id="footer-center" class="footer-column">
		@section('footer-center')

		@show
	</div><!-- div#footer-center -->
	<div id="footer-right" class="footer-column">
		<ul id="nav-menu" class="menu">
			<li class="menuitem"><a href="{{ URL::to('/') }}">Home</a></li><!-- li.menuitem -->
			@yield('footer-nav-menu')
			<li class="menuitem"><a href="#">Logout</a></li><!-- li.menuitem -->
		</ul><!-- ul#nav-menu -->
	</div><!-- div#footer-right -->
	<div class="clear"></div><!-- div.clear -->
</div><!-- div.wrapper -->