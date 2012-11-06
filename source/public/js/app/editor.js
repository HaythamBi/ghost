define(['ace/ace', 'showdown'], function (ace, showdown) {
	return {
		initialize: function () {
			var editor = ace.edit("editor");
			var Showdown = require('showdown');
			var converter = new Showdown.converter();
			var preview = document.getElementById('preview');

			editor.setTheme("ace/theme/textmate");
			editor.getSession().setMode("ace/mode/markdown");
			editor.renderer.setShowGutter(false);
			editor.setHighlightActiveLine(false);
			editor.renderer.setShowPrintMargin(false);
			editor.renderer.adjustWrapLimit(10);

			preview.innerHTML = converter.makeHtml(editor.getValue());

			editor.getSession().on('change', function(e) {
				preview.innerHTML = converter.makeHtml(editor.getValue());
			});

			return editor;
		}
	};
});
