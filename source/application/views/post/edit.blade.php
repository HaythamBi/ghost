<div class="edit-post">

	<div class="blocks">
		<div class="row-fluid">
			<div class="span12">
				<div class="block">
					<input class="post-title" type="text" value="{{ $post->title }}" placeholder="Post Title" />
					<i id="fullscreen" class="icon-fullscreen muted">&#59204;</i>
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
						<div class="block-icons pull-right"><strong><a class="muted" href="http://en.wikipedia.org/wiki/Markdown">?</a></strong></div>
					</div>
					<div id="editor"></div>
				</div>
			</div>
			<div class="span6">
				<div class="block">
					<div class="block-header muted uppercase">
						<div class="block-title pull-left">Preview</div>
						<div id="wordcount" class="block-icons align-right"></div>
					</div>
					<div id="preview"></div>
				</div>
			</div>
		</div>
	</div>

</div>

<div class="navbar navbar-inverse navbar-fixed-bottom">
	<div class="navbar-inner">
		<div class="pull-left">
			<a href="#" class="btn btn-inverse"><i>&#59148;</i> News, Articles</a>
		</div>
		<div class="pull-right">
			<a href="#" class="btn btn-inverse"><i>&#9881;</i></a>
			<a href="#" class="btn btn-primary">Save Draft</a>
			<a href="#" class="btn btn-danger">Publish</a>
		</div>
	</div>
</div>
