require.config({
	paths: {
		'ace'        : '../../components/ace',
		'showdown'   : '../../components/showdown/showdown',
		'jquery'     : '../../components/jquery/jquery',
		'underscore' : '../../components/lodash/lodash'
	},
	waitSeconds: 15
});

require(['app'], function (app) {
	app.initialize();
});
