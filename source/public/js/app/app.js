define(['editor', 'tags', 'bootstrap'], function (editor, tags) {
	return {
		initialize: function () {
			editor.initialize();
			tags.initialize();
		}
	};
});
