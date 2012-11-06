<div class="row-fluid">
	<div class="span12">
		<ul class="nav nav-block">
			<li><strong>Welcome back,</strong> {{ Auth::user()->name }}.</li>
			<li><a class="muted uppercase" href="{{ URL::to_route('New Post') }}"><i class="icon-pencil"></i> New Post</a></li>
			<li><a class="muted uppercase" href="{{ URL::to_route('Authors') }}"><i class="icon-user"></i> Authors</a></li>
			<li><a class="muted uppercase" href="{{ URL::to_route('Analytics') }}"><i class="icon-signal"></i> Analytics</a></li>
			<li><a class="muted uppercase" href="#"><i class="icon-search"></i> Search</a></li>
		</ul>
	</div>
</div>
