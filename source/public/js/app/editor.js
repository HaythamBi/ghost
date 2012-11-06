define(['ace/ace', 'showdown', 'storage', 'jquery', 'underscore'], function (ace, showdown, storage, $, _) {
	return {
		wordCount: function (html) {
			var raw_words = $('<div>' + html + '</div>').text().split(/\s/ig);
			var words = _.filter(raw_words, function(word){ return word; });
			var prefix = 'words';
			if (words.length === 1) prefix = 'word';
			this.$wordcount.text(words.length + ' ' + prefix);
		},
		initialize: function () {
			var self = this;
			var editor = ace.edit("editor");
			var Showdown = require('showdown');
			var converter = new Showdown.converter();
			var preview = document.getElementById('preview');

			this.$wordcount = $('#wordcount');

			editor.getSession().setMode("ace/mode/markdown");
			editor.getSession().setUseWrapMode(true);

			editor.setTheme("ace/theme/textmate");
			editor.setHighlightActiveLine(false);

			editor.setValue(storage.get('test'));

			editor.renderer.setShowPrintMargin(false);
			editor.renderer.setShowGutter(false);
			editor.renderer.adjustWrapLimit(10);

			preview.innerHTML = converter.makeHtml(editor.getValue());

			editor.getSession().on('change', function(e) {
				var html = converter.makeHtml(editor.getValue());
				preview.innerHTML = html;
				storage.set('test', editor.getValue());
				self.wordCount(html);
			});

			return editor;
		}
	};
});
