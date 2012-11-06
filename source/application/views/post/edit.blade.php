<div class="edit-post">

	<div class="blocks">
		<div class="row-fluid">
			<div class="span12">
				<div class="block">
					<input class="post-title" type="text" value="{{ $post->title }}" placeholder="Post Title" />
					<i class="icon-fullscreen">&#59204;</i>
				</div>
				<p class="muted permalink"><strong>Permalink: </strong> {{ URL::base() }}/<strong>{{ $post->slug }}</strong></p>
			</div>
		</div>
	</div>

</div>
