<div class="inline-post row-fluid">
	<div class="span9">
		<div class="media">
			<a class="pull-left" href="{{ $post->edit_url }}">
				<img class="media-object img-circle" src="http://placehold.it/64x64" width="64" height="64">
			</a>
			<div class="media-body">
				<h4 class="media-heading">{{ $post->title }}</h4>
				<p class="muted">News, Tech</p>
			</div>
		</div><!-- .media -->
	</div><!-- .post .span9 -->
	<div class="span3 stats">
		<p class="muted">{{ $post->date }}</p>
		<h2 class="muted">1,932</h2>
	</div>
</div><!-- .row-fluid -->
