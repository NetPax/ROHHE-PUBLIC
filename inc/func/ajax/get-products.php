<?php
add_action( "wp_ajax_get_products", "get_products" );
add_action( "wp_ajax_nopriv_get_products", "get_products" );

function get_products() {
	if ( !wp_verify_nonce( $_POST['nonce'], 'ajax-nonce' ) ) {
		die ( 'Exit!' );
	}

	include(locate_template('parts/products-list-tpl.php'));

	die();
}
?>