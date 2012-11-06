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
				<li><a href="#">{{ Auth::user()->name }} {{ Auth::user()->surname }}</a></li>
			</ul>
		</div>
	</div>
</div>
