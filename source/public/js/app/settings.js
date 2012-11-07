define(['jquery', 'select2'], function ($) {
	return {
		initialize: function () {
			var $el = $('#settings');

			$('[data-toggle="#settings"]').on('click', function () {
				$(this).toggleClass('active');
				$el.toggleClass('hide');
				return false;
			});
		}
	};
});
