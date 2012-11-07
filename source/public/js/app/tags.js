define(['jquery', 'select2'], function ($) {
	return {
		initialize: function () {
			var $el = $('#tags');

			$('[data-toggle="#tags"]').on('click', function () {
				$(this).toggleClass('active');
				$el.toggleClass('hide');
				return false;
			});

			$('#select2_tags').select2({
				tags: [],
                tokenSeparators: [",", " "]
			});
		}
	};
});
