define(['ace/ace', 'showdown', 'storage', 'jquery', 'underscore'], function (ace, showdown, storage, $, _) {
	return {
		wordCount: function (html) {
			var raw_words = $('<div>' + html + '</div>').text().split(/\s/ig);
			var words = _.filter(raw_words, function(word){ return word; });
			var prefix = 'words';
			if (words.length === 1) prefix = 'word';
			this.$wordcount.text(words.length + ' ' + prefix);
		},
		resize: function () {
			var lines = this.editor.getValue().split('\n');
			var wrappedLines = 0;
			var regex = new RegExp('.{1,' + editor.session.screenWidth + '}', 'g');

			_.each(lines, function (line) {
				if (line === '') {
					wrappedLines++;
				} else {
					var wrapped = line.match(regex);
					if (wrapped) wrappedLines = wrappedLines + wrapped.length;
				}
			});

			$('#editor').css('height', ((wrappedLines * 20) + 'px'));
			this.editor.resize(true);
		},
		initialize: function () {
			var self = this;
			var editor = ace.edit("editor");
			var Showdown = require('showdown');
			var converter = new Showdown.converter();
			var preview = document.getElementById('preview');

			this.$wordcount = $('#wordcount');
			this.editor = editor;

			$('#fullscreen').on('click', function () {
				$('body').toggleClass('fullscreen');
				editor.resize();
				if ($('body').hasClass('fullscreen')) {
					$(this).html('&#59206;');
				} else {
					$(this).html('&#59204;');
				}
			});

			window.editor = editor;

			editor.getSession().setMode("ace/mode/markdown");
			editor.getSession().setUseWrapMode(true);

			editor.setTheme("ace/theme/textmate");
			editor.setHighlightActiveLine(false);

			editor.setValue(storage.get('test'));

			editor.renderer.setShowPrintMargin(false);
			editor.renderer.setShowGutter(false);
			// editor.renderer.adjustWrapLimit(10);
			editor.renderer.setHScrollBarAlwaysVisible(false);

			editor.clearSelection();

			var html = converter.makeHtml(editor.getValue());
			preview.innerHTML = html;
			self.wordCount(html);

			this.resize();

			editor.getSession().on('change', function(e) {
				var html = converter.makeHtml(editor.getValue());
				preview.innerHTML = html;
				storage.set('test', editor.getValue());
				self.wordCount(html);
				self.resize();
			});

			return editor;
		}
	};
});
