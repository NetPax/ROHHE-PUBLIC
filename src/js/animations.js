(function () {
	'use strict';
	$(document).ready(function () {

		// GSAP elements animations HOME
		if (typeof ScrollTrigger !== 'undefined' && typeof gsap !== 'undefined') {
			if ($(".anim-slide-top").length) {
				ScrollTrigger.batch(".anim-slide-top", {
					onEnter: batch => gsap.to(batch, {
						opacity: 1,
						y: 0,
						delay: .25,
						duration: .5,
						stagger: .25
					}),
					onLeave: batch => {
						if ($(batch).hasClass('anim-repeat')) {
							gsap.to(batch, {
								opacity: 0,
								y: -100,
								delay: .25,
								duration: .5,
								stagger: .25
							})
						}
					},
					onEnterBack: batch => {
						if ($(batch).hasClass('anim-repeat')) {
							gsap.to(batch, {
								opacity: 1,
								y: 0,
								delay: .25,
								duration: .5,
								stagger: .25
							})
						}
					},
					onLeaveBack: batch => {
						if ($(batch).hasClass('anim-repeat')) {
							gsap.to(batch, {
								opacity: 0,
								y: -100,
								delay: .25,
								duration: .5,
								stagger: .25
							})
						}
					}
				});
			}

			if ($(".anim-slide-bottom").length) {
				gsap.set(".anim-slide-bottom", {
					opacity: 0,
					y: 100
				});
				ScrollTrigger.batch(".anim-slide-bottom", {
					onEnter: batch => {
						gsap.to(batch, {
							opacity: 1,
							y: 0,
							delay: .25,
							duration: .5,
							stagger: .25
						});
					},
					onLeave: batch => {
						if ($(batch).hasClass('anim-repeat')) {
							gsap.to(batch, {
								opacity: 0,
								y: 100,
								delay: .25,
								duration: .5,
								stagger: .25
							})
						}
					},
					onEnterBack: batch => {
						if ($(batch).hasClass('anim-repeat')) {
							gsap.to(batch, {
								opacity: 1,
								y: 0,
								delay: .25,
								duration: .5,
								stagger: .25
							})
						}
					},
					onLeaveBack: batch => {
						if ($(batch).hasClass('anim-repeat')) {
							gsap.to(batch, {
								opacity: 0,
								y: 100,
								delay: .25,
								duration: .5,
								stagger: .25
							})
						}
					},
				});
			}

			if ($(".anim-slide-left").length) {
				gsap.set(".anim-slide-left", {
					opacity: 0,
					x: -100
				});
				ScrollTrigger.batch(".anim-slide-left", {
					onEnter: batch => gsap.to(batch, {
						opacity: 1,
						x: 0,
						delay: .25,
						duration: .5,
						stagger: .25,
						ease: 'power2.easeOut'
					}),
					onLeave: batch => {
						if ($(batch).hasClass('anim-repeat')) {
							gsap.to(batch, {
								opacity: 0,
								x: -100,
								delay: .25,
								duration: .5,
								stagger: .25
							})
						}
					},
					onEnterBack: batch => {
						if ($(batch).hasClass('anim-repeat')) {
							gsap.to(batch, {
								opacity: 1,
								x: 0,
								delay: .25,
								duration: .5,
								stagger: .25
							})
						}
					},
					onLeaveBack: batch => {
						if ($(batch).hasClass('anim-repeat')) {
							gsap.to(batch, {
								opacity: 0,
								x: -100,
								delay: .25,
								duration: .5,
								stagger: .25
							})
						}
					},
				});
			}

			if ($(".anim-slide-right").length) {
				gsap.set(".anim-slide-right", {
					opacity: 0,
					x: 100
				});
				ScrollTrigger.batch(".anim-slide-right", {
					onEnter: batch => gsap.to(batch, {
						opacity: 1,
						x: 0,
						delay: .25,
						duration: .5,
						stagger: .25,
						ease: 'power2.easeOut'
					}),
					onLeave: batch => {
						if ($(batch).hasClass('anim-repeat')) {
							gsap.to(batch, {
								opacity: 0,
								x: 100,
								delay: .25,
								duration: .5,
								stagger: .25
							})
						}
					},
					onEnterBack: batch => {
						if ($(batch).hasClass('anim-repeat')) {
							gsap.to(batch, {
								opacity: 1,
								x: 0,
								delay: .25,
								duration: .5,
								stagger: .25
							})
						}
					},
					onLeaveBack: batch => {
						if ($(batch).hasClass('anim-repeat')) {
							gsap.to(batch, {
								opacity: 0,
								x: 100,
								delay: .25,
								duration: .5,
								stagger: .25
							})
						}
					},
				});
			}

			if ($(".anim-fade-in").length) {
				ScrollTrigger.batch(".anim-fade-in", {
					onEnter: batch => gsap.to(batch, {
						opacity: 1,
						delay: .25,
						duration: .5,
						stagger: .25
					}),
					onLeave: batch => {
						if ($(batch).hasClass('anim-repeat')) {
							gsap.to(batch, {
								opacity: 0,
								delay: .25,
								duration: .5,
								stagger: .25
							})
						}
					},
					onEnterBack: batch => {
						if ($(batch).hasClass('anim-repeat')) {
							gsap.to(batch, {
								opacity: 1,
								delay: .25,
								duration: .5,
								stagger: .25
							})
						}
					},
					onLeaveBack: batch => {
						if ($(batch).hasClass('anim-repeat')) {
							gsap.to(batch, {
								opacity: 0,
								delay: .25,
								duration: .5,
								stagger: .25
							})
						}
					},
				});
			}

			setTimeout(function () {
				ScrollTrigger.refresh();
			}, 1000);
		}

	});
}(jQuery));
