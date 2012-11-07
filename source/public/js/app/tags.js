define(['jquery', 'select2'], function ($) {
	return {
		state: 'closed',
		open: function () {
			this.state = 'open';
			this.$el.removeClass('hide');
			this.$button.addClass('active');
			$('.select2-input').focus();
		},
		close: function () {
			this.state = 'closed';
			this.$el.addClass('hide');
			this.$button.removeClass('active');
		},
		toggle: function () {
			if (this.state === 'closed') {
				this.open();
			} else {
				this.close();
			}
		},
		initialize: function () {
			var self = this;

			this.$el = $('#tags');
			this.$button = $('[data-toggle="#tags"]');

			this.$button.on('click', function () {
				self.toggle();
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
