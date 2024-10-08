<?php
add_filter( 'wp_mail_content_type', 'mail_set_content_type' );

function mail_set_content_type() {
	return "text/html";
}

add_action( "wp_ajax_send_contact_form", "send_contact_form" );
add_action( "wp_ajax_nopriv_send_contact_form", "send_contact_form" );

function checkRecaptcha($token) {
	$gc_secret = get_acf_option('google_captcha_secret_code');

	$ch = curl_init("https://www.google.com/recaptcha/api/siteverify");
	curl_setopt_array($ch, [
		CURLOPT_POST => 1,
		CURLOPT_POSTFIELDS => [
			'secret' => $gc_secret,
			'response' => $token
		],
		CURLOPT_RETURNTRANSFER => true
	]);

	$response = curl_exec($ch);
	curl_close($ch);

	$arrResponse = json_decode($response, true);

	return ($arrResponse["success"] == '1' && $arrResponse["score"] >= 0.5);
}

function send_contact_form() {
	if ( ! wp_verify_nonce( $_POST['nonce'], 'ajax-nonce' ) ) {
		die ( 'Exit!' );
	}

	if ( checkRecaptcha( $_POST['token'] ) ) {

		if ( isset( $_POST["contactFormDataJson"] ) ) {

			$contactFormDataJSON = stripslashes( $_POST["contactFormDataJson"] );
			$contactFormDataJSON = json_decode( $contactFormDataJSON );

			$message  = '<strong>Imię i nazwisko: </strong>' . $contactFormDataJSON->{'contact-fullname'} . '<br/>';
			$message .= '<strong>E-mail: </strong>' . $contactFormDataJSON->{'contact-email'} . '<br/>';
			$message .= '<strong>Wiadomość: </strong>' . $contactFormDataJSON->{'contact-message'} . '<br/>';
			$message .= '<strong>Zgoda: </strong>' . ( $contactFormDataJSON->{'contact-consent'} ? 'TAK' : 'NIE' ) . '<br/>';

			$form_email   = $contactFormDataJSON->{'department-email'};
			$form_subject = get_acf_option( 'contact_form_subject' ) . ' - ' . date( "d-m-Y H:i:s" );

			if ( wp_mail(
				$form_email,
				$form_subject,
				$message
			) ) {
				echo '1';
			} else {
				echo '0';
			}

		}

	} else {
		echo '0';
	}

	die();
}

?>