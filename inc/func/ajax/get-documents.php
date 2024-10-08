<?php
add_action( "wp_ajax_get_documents", "get_documents" );
add_action( "wp_ajax_nopriv_get_documents", "get_documents" );

function get_documents() {
	if ( !wp_verify_nonce( $_POST['nonce'], 'ajax-nonce' ) ) {
		die ( 'Exit!' );
	}

	include(locate_template('parts/documents-list-tpl.php'));

	die();
}
?>