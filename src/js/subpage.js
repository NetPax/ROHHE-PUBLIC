(function () {
	'use strict';
	$(document).ready(function () {
		function scrollToID(id, speed = 1000) {
			$("html, body").animate({
				scrollTop: $('#' + id).offset().top
			}, speed);
		}

		if ($('.subpage').length) {

			$('.accordion .accordion-toggle').on('click', function () {
				$(this).toggleClass('active').parent().next('.accordion-content').slideToggle();
			});

			$('.js-object-toggle').on('click', function(e) {
				e.preventDefault();
				const groupId = $(this).closest('.references-objects-group').attr('id');
				if (history.pushState) {
					history.pushState(null, null, '#'+groupId);
				}
				else {
					location.hash = '#'+groupId;
				}
				$(this).toggleClass('open');
				$(this).closest('.references-objects-group').find('.references-objects-rest').slideToggle({
					start: function () {
						$(this).css({
							display: "flex"
						})
					}
				});
				scrollToID(groupId);
			});

			if ($('.references').length) {
				const url = document.location.toString();
				if (url.match('#')) {
					const groupId = url.split('#')[1];
					$('#' + groupId).find('.js-object-toggle').addClass('open');
					$('#' + groupId).find('.references-objects-rest').slideDown({
						start: function () {
							$(this).css({
								display: "flex"
							})
						}
					});
					scrollToID(groupId);
				}

				$('.js-all-references-toggle').on('click', function() {
					$(this).toggleClass('open');
					$(this).closest('.references-list-full').find('.references-all').toggleClass('expand');
					scrollToID('references-list-full');
				});
			}

			if ($('.contact').length) {
				const url = document.location.toString();
				if (url.match('#')) {
					const urlDepartmentId = url.split('#')[1];

					const departmentBtn = $('.contact-data-nav button[data-department=' + urlDepartmentId + ']');
					const departmentAddress = $('.contact-data-addresses li#' + urlDepartmentId);

					if (departmentBtn.length && departmentAddress.length) {
						departmentBtn.addClass('select').parent().siblings().find('.js-contact-select').removeClass('select');
						departmentAddress.fadeIn().siblings().hide();
					}
				}

				$('.js-contact-select').on('click', function() {
					$(this).addClass('select').parent().siblings().find('.js-contact-select').removeClass('select');
					const departmentId = $(this).data('department');
					$('.contact-data-addresses li#' + departmentId).fadeIn().siblings().hide();
				});
			}

			const swiperTimelineEvents = new Swiper('.swiper-timeline-events', {
				spaceBetween: 0,
				loop: false,
				slidesPerView: 1,
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev',
				},
				breakpoints: {
					576: {
						slidesPerView: 2,
					},
					1024: {
						slidesPerView: 3,
					},
					1366: {
						slidesPerView: 4,
					}
				}
			});

			const swiperTimelineMedia = new Swiper('.swiper-timeline-media', {
				spaceBetween: 0,
				loop: false,
				slidesPerView: 1,
				breakpoints: {
					576: {
						slidesPerView: 2,
					},
					1024: {
						slidesPerView: 3,
					},
					1366: {
						slidesPerView: 4,
					}
				}
			});

			swiperTimelineEvents.controller.control = swiperTimelineMedia;
			swiperTimelineMedia.controller.control = swiperTimelineEvents;

		}
	});
}(jQuery));
