define(['editor', 'settings', 'tags', 'bootstrap'], function (editor, settings, tags) {
	return {
		initialize: function () {
			editor.initialize();
			tags.initialize();
			settings.initialize();
		}
	};
});
