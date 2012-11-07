define(['ace/ace', 'storage', 'jquery', 'underscore', 'mousetrap', 'marked'], function (ace, storage, $, _) {
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
			var regex = new RegExp('.{1,' + this.editor.session.screenWidth + '}', 'g');
			var height;

			_.each(lines, function (line) {
				if (line === '') {
					wrappedLines++;
				} else {
					var wrapped = line.match(regex);
					if (wrapped) wrappedLines = wrappedLines + wrapped.length;
				}
			});

			height = wrappedLines * 20;

			$('#editor').css('height', height + 'px');

			this.editor.resize(true);
		},
		fullscreen: function () {
			$('body').toggleClass('fullscreen');

			this.editor.resize();

			if ($('body').hasClass('fullscreen'))
			{
				$('#fullscreen').html('&#59206;');
			}
			else
			{
				$('#fullscreen').html('&#59204;');
			}
		},
		html: function (markdown) {
			return marked(markdown);
		},
		initialize: function () {
			if ($('#editor').length === 0) return;

			var self = this;
			var editor = ace.edit("editor");
			var preview = document.getElementById('preview');

			this.$wordcount = $('#wordcount');
			this.editor = editor;

			editor.getSession().setMode("ace/mode/markdown");
			editor.getSession().setUseWrapMode(true);

			editor.setTheme("ace/theme/textmate");
			editor.setHighlightActiveLine(false);

			editor.setValue(storage.get('test'));

			editor.renderer.setShowPrintMargin(false);
			editor.renderer.setShowGutter(false);
			editor.renderer.setHScrollBarAlwaysVisible(false);

			editor.clearSelection();

			var html = self.html(editor.getValue());

			preview.innerHTML = html;

			this.wordCount(html);
			this.resize();

			// fullscreen, button

			$('#fullscreen').on('click', function () {
				self.fullscreen();
				return false;
			});

			// fullscreen, keyboard shortcut
			
			Mousetrap.bind('ctrl+f', function(e) {
				self.fullscreen();
				return false;
			});

			// update on text changes

			editor.getSession().on('change', function(e) {
				var html = self.html(editor.getValue());
				preview.innerHTML = html;
				storage.set('test', editor.getValue());
				self.wordCount(html);
				self.resize();
			});

			return editor;
		}
	};
});
