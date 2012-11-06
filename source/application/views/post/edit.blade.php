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

	<div class="blocks">
		<div class="row-fluid">
			<div class="span6">
				<div class="block">
					<div class="block-header muted uppercase">
						<div class="block-title pull-left">Markdown</div>
						<div class="block-icons pull-right">...</div>
					</div>
					<textarea></textarea>
				</div>
			</div>
			<div class="span6">
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

</div>
