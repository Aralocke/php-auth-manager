<html>
<head>
@include('includes.header')
</head>
<body>
<div id="container">
	<div class="wrapper">
	<!-- Wrapper will wrap the content within a centered block -->
		<div id="navigation">
			<div id="navigation-left">
				@include('includes.logo')
			</div><!-- div.navigation-left -->
			<div id="navigation-right">
				@include('includes.navigation')
			</div><!-- div.navigation-right -->
		</div><!-- div#navigation -->
		<div id="content">
			@include('includes.content')
		</div><!-- div#content -->
		<div class="clear"></div><!-- div.clear -->
	</div><!-- div.wrapper -->
</div><!-- div#container -->
<div id="footer">
	<!-- Sticky footer method provided by http://www.cssstickyfooter.com/ -->
	@include('includes.footer') 
</div><!-- div#footer -->	
<div class="clear"></div><!-- div.clear -->
</body>
</html>