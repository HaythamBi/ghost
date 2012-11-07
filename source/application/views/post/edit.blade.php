{{ HTML::data('post', $post->to_array()) }}

<div class="edit-post">

	<div class="blocks">
		<div class="row-fluid">
			<div class="span12">
				<div class="block">
					<input class="post-title" type="text" value="{{ $post->title }}" placeholder="Post Title" />
					<i id="fullscreen" class="icon-fullscreen muted">&#59204;</i>
				</div>
				<p class="muted permalink">
					<strong>Permalink: </strong>{{ URL::base() }}/<strong>{{ $post->slug }}</strong>
					<span class="controls"><a href="#">Click to Edit</a> | <a target="_blank" href="{{ $post->permalink }}">View Post</a></span>
				</p>
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

<div class="navbar navbar-inverse navbar-fixed-bottom navbar-footer">
	<div class="navbar-inner">
		<div class="pull-left">
			<a data-toggle="#tags" href="#" class="btn btn-inverse"><i>&#59148;</i> {{ $post->tag_labels }}</a>
		</div>
		<div class="pull-right">
			<a id="settings" href="#" class="btn btn-inverse"><i>&#9881;</i></a>
			<a id="save" href="#" class="btn btn-primary">Save Draft</a>
			<a id="publish" href="#" class="btn btn-danger">Publish</a>
		</div>
		<div class="clearfix"></div>
		<div id="tags" class="navbar-content hide">
			<p>sadklfjhals kdfjhalsdkfhj alsdkjfhalsdkfjhdkls fjh</p>
		</div>
	</div>
</div>
