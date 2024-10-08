(function () {
	'use strict';
	$(document).ready(function () {

		if ($('.contact').length) {
			function sendContactForm() {
				var contactFormData = new FormData(document.getElementById('contact-form'));

				var contactFormDataObject = {};
				contactFormData.forEach(function(value, key){
					if (contactFormDataObject[key] !== undefined) {
						contactFormDataObject[key] += ', ' + value;
					} else {
						contactFormDataObject[key] = value;
					}
				});

				var departmentEmail = $('.contact-data-nav .js-contact-select.select').data('email');
				contactFormDataObject['department-email'] = departmentEmail;

				var contactFormDataJson = JSON.stringify(contactFormDataObject);

				var nonce = npDataConfigObject('nonce');

				var captcha_site_key = npDataConfigObject('google-captcha-public');

				grecaptcha.ready(function () {
					grecaptcha
					.execute(captcha_site_key)
					.then(function (token) {

						$.ajax({
							url: "/wp-admin/admin-ajax.php",
							method: "post",
							timeout: 10000,
							data: {
								action: "send_contact_form",
								contactFormDataJson: contactFormDataJson,
								nonce: nonce,
								token: token,
							},
							success: function (data) {
								if (data == '1') {
									$('.ajax-success').slideDown();
									$('#contact-form').trigger("reset");
								} else {
									$('.ajax-error').slideDown();
								}
							},
							error: function () {
								$('.ajax-error').slideDown();
							},
							beforeSend: function () {
								$('.ajax-success').slideUp();
								$('.ajax-error').slideUp();
								$('.ajax-loading').slideDown();
							},
							complete: function () {
								$('.ajax-loading').slideUp();
							},
						});

					});
				});
			}

			$('#contact-form').on('submit', function (e) {
				e.preventDefault();
				sendContactForm();
			});
		}


		if ($('.ajax-section').length) {
			function ajaxFilterItems(action, filterData) {
				var nonce = npDataConfigObject('nonce');

				$.ajax({
					url: "/wp-admin/admin-ajax.php",
					method: "post",
					timeout: 10000,
					data: {
						action: action,
						t: filterData['t'],
						pid: filterData['pid'],
						nonce: nonce,
					},
					success: function (data) {
						$('#ajax-section').empty();
						$('#ajax-section').append(data);
					},
					error: function () {
						$('.ajax-error').slideDown();
					},
					beforeSend: function () {
						$('#ajax-section').addClass('loading');
						$('.ajax-error').slideUp();
						$('.ajax-loading').slideDown();
					},
					complete: function () {
						$('.ajax-loading').slideUp();
						$('#ajax-section').removeClass('loading');
					},
				});
			}

			$(document).on('change', '#products-filter-form #product-type, #products-filter-form #product-item', function () {
				var baseUrl = window.location.href.split("?")[0];
				window.history.pushState('name', '', baseUrl);

				var productType = $('select[name="product-type"]').val();
				var productItem = $('select[name="product-item"]').val();
				var filterData = {
					't': productType,
					'pid': productItem,
				}
				ajaxFilterItems('get_products', filterData);
			});

			$(document).on('change', '#documents-filter-form #document-type, #documents-filter-form #product-item', function () {
				var baseUrl = window.location.href.split("?")[0];
				window.history.pushState('name', '', baseUrl);

				var documentType = $('select[name="document-type"]').val();
				var productItem = $('select[name="product-item"]').val();
				var filterData = {
					't': documentType,
					'pid': productItem,
				}
				ajaxFilterItems('get_documents', filterData);
			});

			$(document).on('change', '#products-filter-form #product-type', function () {
				var baseUrl = window.location.href.split("?")[0];
				var productType = $('select[name="product-type"]').val();
				var finalUrl = baseUrl + '?t=' + productType;
				window.history.pushState('name', '', finalUrl);
			});
		}

	});
}(jQuery));
