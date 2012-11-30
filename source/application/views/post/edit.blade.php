{{ HTML::data('post', $post->to_array()) }}
{{ HTML::data('tags', $post->tag_array) }}

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
					<span class="controls"><a href="#">Edit Permalink</a> | <a target="_blank" href="{{ $post->permalink }}">View Post</a></span>
				</p>
			</div>
		</div>
	</div>

	<div class="blocks">
		<div class="row-fluid">
			<div class="span6">
				<div class="block editor-block">
					<div class="block-header muted uppercase">
						<div class="block-title pull-left">Markdown</div>
						<div class="block-icons pull-right"><strong><a class="muted" href="http://en.wikipedia.org/wiki/Markdown">?</a></strong></div>
					</div>
					<div class="post-{{ $post->id }}-id" id="editor"></div>
				</div>
			</div>
			<div class="span6">
				<div class="block preview-block">
					<div class="block-header muted uppercase">
						<div class="block-title pull-left">Preview</div>
						<div id="wordcount" class="block-icons align-right"></div>
					</div>
					<div class="post-{{ $post->id }}-id" id="preview"></div>
				</div>
			</div>
		</div>
	</div>

</div>

<div class="navbar navbar-inverse navbar-fixed-bottom navbar-footer">
	<div class="navbar-inner">
		<div class="pull-left">
			<a data-toggle="#tags" class="btn btn-inverse"><i>&#59148;</i> {{ $post->tag_titles }}</a>
		</div>
		<div class="pull-right">
			<a data-toggle="#settings" class="btn btn-inverse"><i>&#9881;</i></a>
			<div class="btn-group" data-toggle="buttons-radio">
				<button type="button" class="btn btn-primary active">Draft</button>
				<button type="button" class="btn btn-primary">Published</button>
			</div>
		</div>
		<div class="clearfix"></div>
		<!-- Tags -->
		<div id="tags" class="navbar-content hide">
			<input type="text" id="select2_tags" value="{{ $post->comma_seperated_tags }}" />
		</div>
		<!-- Settings -->
		<div id="settings" class="navbar-content hide">
			<p>...</p>
		</div>
	</div>
</div>
