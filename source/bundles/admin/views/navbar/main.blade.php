<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="brand" href="#">G</a>
			<ul class="nav">
				<li class="active"><a href="#">Dashboard</a></li>
				<li><a href="#">Posts</a></li>
				<li><a href="#">Settings</a></li>
			</ul>
			<ul class="nav pull-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						{{ Auth::user()->name }} {{ Auth::user()->surname }}
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#">Edit Profile</a></li>
						<li>{{ HTML::link_to_route('logout', 'Logout') }}</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
