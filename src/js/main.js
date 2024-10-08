(function () {
	'use strict';
	$(document).ready(function () {

		// Search toggle
		$('.js-search-toggle').click(function () {
			$(this).toggleClass('active');
			$('.js-search-panel').fadeToggle();
			$('.js-search-panel .search-phrase').focus().val('');
		});

		unclickCloseElement('.js-search-panel', function () {
			$('.js-search-toggle').removeClass('active');
			$('.js-search-panel').fadeOut();
		}, ['.js-search-toggle']);

		// Lang toggle
		$('.js-lang-toggle').click(function () {
			$(this).toggleClass('active');
			$('.js-lang-list').fadeToggle();
		});

		unclickCloseElement('ul.js-lang-list', function () {
			$('.js-lang-toggle').removeClass('active');
			$('.js-lang-list').fadeOut();
		}, ['.js-lang-toggle']);

	});
}(jQuery));
