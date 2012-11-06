define(['ace/ace', 'showdown', 'storage'], function (ace, showdown, storage) {
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
			editor.setValue(storage.get('test'));

			preview.innerHTML = converter.makeHtml(editor.getValue());

			editor.getSession().on('change', function(e) {
				preview.innerHTML = converter.makeHtml(editor.getValue());
				storage.set('test', editor.getValue());
			});

			return editor;
		}
	};
});
