define(['jquery', 'select2'], function ($) {
	return {
		initialize: function () {
			var $el = $('#tags');

			$('[data-toggle="#tags"]').on('click', function () {
				$(this).toggleClass('active');
				$el.toggleClass('hide');
				if ($(this).hasClass('active'))
				{
					$('.select2-input').focus();
				}
				return false;
			});

			$('#select2_tags').select2({
				tags: [],
                tokenSeparators: [','],
				formatNoMatches: function (term) {
					return '';
				}
			});
		}
	};
});
