<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			{{ HTML::link_to_route('dashboard', 'G', null, array('class' => 'brand')) }}
			<ul class="nav">
				<li class="active">{{ HTML::link_to_route('dashboard', 'Dashboard') }}</li>
				<li>{{ HTML::link_to_route('posts', 'Posts') }}</li>
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
						<li>{{ HTML::link_to_route('logout', 'Logout') }}</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
