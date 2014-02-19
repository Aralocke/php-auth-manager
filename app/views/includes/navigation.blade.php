<div class="container-fluid">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">@yield('project', 'Project name')</a>
	</div>
	<div class="navbar-collapse collapse">
		<ul class="nav navbar-nav navbar-right">
			<li><a href="{{ URL::to('/') }}">Dashboard</a></li>
			<li><a href="{{ URL::to('/app/settings') }}">Settings</a></li>
			<li><a href="{{ URL::to('/user/profile') }}">Profile</a></li>
			<li><a href="{{ URL::to('/auth/logout') }}">Logout</a></li>
		</ul>
		<form id="search-form" class="navbar-form navbar-right">
			<input type="text" class="form-control" placeholder="Search...">
		</form><!-- form#search-form -->
	</div><!-- div.navbar-collapse -->
</div><!-- div.container-fluid -->