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
				containerCssClass: 'select2-tags',
				dropdownCssClass: 'select2-tags',
				formatResult: function (term) {
					return 'Add Tag: <span class="underline">' + term.text + '</span>';
				},
				formatNoMatches: function (term) {
					return 'Start typing to add a tag';
				}
			});
		}
	};
});
