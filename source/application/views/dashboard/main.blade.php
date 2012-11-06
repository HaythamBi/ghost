<div class="blocks">
	<div class="row-fluid">
		<div class="span12">
			<ul class="nav navblock">
				<li class="navblock-text"><strong>Welcome back,</strong> {{ Auth::user()->name }}.</li>
				<li><a class="muted uppercase" href="{{ URL::to_route('New Post') }}"><i>&#9998;</i> New Post</a></li>
				<li><a class="muted uppercase" href="{{ URL::to_route('Authors') }}"><i>&#128101;</i> Authors</a></li>
				<li><a class="muted uppercase" href="{{ URL::to_route('Analytics') }}"><i>&#128200;</i> Analytics</a></li>
				<li><a class="muted uppercase" href="#"><i>&#128269;</i> Search</a></li>
			</ul>
		</div>
	</div>
</div>
