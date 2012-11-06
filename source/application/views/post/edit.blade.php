<div class="edit-post">

	<div class="blocks">
		<div class="row-fluid">
			<div class="span12">
				<div class="block">
					<input class="post-title" type="text" value="{{ $post->title }}" placeholder="Post Title" />
				</div>
				<br>
				<p class="muted"><strong>Permalink: </strong> {{ HTML::link($post->permalink) }}</p>
			</div>
		</div>
	</div>

</div>
