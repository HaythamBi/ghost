<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<ul class="nav">
			{{ HTML::nav_item('Dashboard') }}
			{{ HTML::nav_item('Blog') }}
			{{ HTML::nav_item('Authors') }}
			{{ HTML::nav_item('Analytics') }}
			{{ HTML::nav_item('Settings') }}
		</ul>
		<ul class="nav pull-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<span class="gravatar">{{ HTML::image(Auth::user()->gravatar(18)) }}</span>
					<span>{{ Auth::user()->name }} {{ Auth::user()->surname }}</span>
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li>{{ HTML::link('/author/' . Auth::user()->id, 'Edit Profile') }}</li>
					<li>{{ HTML::link_to_route('Logout', 'Logout') }}</li>
				</ul>
			</li>
		</ul>
	</div>
</div>
