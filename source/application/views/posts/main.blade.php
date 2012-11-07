<div class="blocks">
	<div class="row-fluid">
		<div class="span6">
			<div class="block">
				<div class="block-header muted uppercase">
					<div class="block-title pull-left">Posts</div>
					<div class="block-icons pull-right"><a href="{{ URL::to_route('New Post') }}"><i class="muted">&oplus;</i></a></div>
				</div>
				<div class="posts">
					@foreach ($posts as $post)
						@render('posts.single', array('post' => $post))
					@endforeach
				</div><!-- .posts -->
			</div>
		</div>
		<div class="span6 hide">
			<div class="block">
				<div class="block-header muted uppercase">
					<div class="block-title pull-left">Preview</div>
					<div class="block-icons pull-right">0 Words</div>
				</div>
				<div class="preview">Loading Preview...</div>
			</div>
		</div>
	</div>
</div>
