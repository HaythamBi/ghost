require.config({
	paths: {
		'ace'        : '../../components/ace',
		'showdown'   : '../../components/showdown/showdown',
		'jquery'     : '../../components/jquery/jquery',
		'underscore' : '../../components/lodash/lodash',
		'bootstrap'  : '../../components/bootstrap/js/bootstrap'
	}
});

require(['app', 'jquery'], function (app) {
	app.initialize();
});
