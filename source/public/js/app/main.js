require.config({
	paths: {
		'ace'      : '../../components/ace',
		'showdown' : '../../components/showdown/showdown'
	},
	waitSeconds: 15
});

require(['editor'], function (editor) {
	editor.initialize();
});
