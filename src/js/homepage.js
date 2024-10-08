(function () {
	'use strict';
	$(document).ready(function () {

		if ($('.homepage').length) {

			const swiperCTA = new Swiper('.swiper-cta', {
				loop: true,
				navigation: {
					prevEl: '.cta .swiper-button-prev',
					nextEl: '.cta .swiper-button-next'
				},
				autoHeight: true,
				autoplay: {
					delay: 15000,
					disableOnInteraction: false,
				},
			});

		}

	});
}(jQuery));
