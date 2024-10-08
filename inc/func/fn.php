<?php
//Init config
@ini_set( 'upload_max_size', '64M' );
@ini_set( 'post_max_size', '64M' );
@ini_set( 'max_execution_time', '300' );

//Enqueue scripts
add_action( 'wp_enqueue_scripts', function () {
	wp_deregister_script( 'jquery' );
	wp_deregister_script( 'jquery-migrate' );

	$gm_public = get_acf_option( 'google_maps_public_code' );
	wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=' . $gm_public . '&callback=Function.prototype', false, '1.0.0', false );

	$gc_public = get_acf_option( 'google_captcha_public_code' );
	wp_enqueue_script( 'google-captcha', 'https://www.google.com/recaptcha/api.js?render=' . $gc_public, false, '1.0.0', false );

	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/inc/jquery/jquery.min.js', false, '1.0.0', true );
	wp_enqueue_script( 'jquery-migrate', get_template_directory_uri() . '/inc/jquery/jquery-migrate.min.js', false, '1.0.0', true );

	wp_enqueue_style( 'libraries', get_template_directory_uri() . '/resources/css/libraries.min.css', false, time() );
	wp_enqueue_script( 'libraries', get_template_directory_uri() . '/resources/js/libraries.min.js', false, time(), true );

	wp_enqueue_style( 'site', get_template_directory_uri() . '/resources/css/site.min.css', false, time() );
	wp_enqueue_script( 'site', get_template_directory_uri() . '/resources/js/site.min.js', false, time(), true );

	wp_localize_script( 'site', 'np_data_config_object', array(
		'nonce'                 => wp_create_nonce( 'ajax-nonce' ),
		'google-captcha-public' => get_acf_option( 'google_captcha_public_code' )
	) );
} );

//Advanced Custom Fields (ACF)

add_filter( 'acf/settings/save_json', function () {
	return get_stylesheet_directory() . '/inc/acf-json';
} );

add_filter( 'acf/settings/load_json', function ( $paths ) {
	unset( $paths[0] );
	$paths[] = get_stylesheet_directory() . '/inc/acf-json';

	return $paths;
} );

add_action( 'acf/init', function () {
	$gm_public = get_acf_option( 'google_maps_public_code' );
	acf_update_setting( 'google_api_key', $gm_public );

	if ( function_exists( 'acf_add_options_page' ) && function_exists( 'pll_languages_list' ) ) {
		foreach ( pll_languages_list() as $lang ) {
			acf_add_options_sub_page( [
				'page_title'  => "Opcje: $lang",
				'menu_title'  => __( "Opcje: $lang", 'textdomain' ),
				'menu_slug'   => "options-$lang",
				'post_id'     => "options-$lang",
				'parent_slug' => 'options'
			] );
		}
	}
} );

function get_acf_option( string $key, string $user_options_page_id = '' ) {
	$default_options_page_id = function_exists( 'pll_current_language' ) ? 'options-' . pll_current_language() : 'options';
	$options_page_id         = $user_options_page_id ?: $default_options_page_id;

	return get_field( $key, $options_page_id );
}

//Admin editor styles
function custom_editor_styles() {
	add_editor_style( 'custom-editor.css' );
}

add_action( 'init', 'custom_editor_styles' );

function custom_editor_formatting( $settings ) {
	$custom_formats = array(
		array(
			'title'    => 'Tekst z podkreśleniem',
			'selector' => 'p',
			'classes'  => 'text-underscore'
		)
	);

	$settings['style_formats'] = json_encode( $custom_formats );

	return $settings;
}

add_filter( 'tiny_mce_before_init', 'custom_editor_formatting' );

//Tweak Image sizes
add_image_size( 'fullhd', 1920 );
remove_image_size( '1536x1536' );
remove_image_size( '2048x2048' );
update_option( 'thumbnail_crop', 0 );

//Register menus
register_nav_menu( 'primary-menu', 'Menu główne' );
register_nav_menu( 'footer-menu', 'Menu w stopce' );

//Override e-mail settings
add_filter( 'wp_mail_from', function ( $original_email_address ) {
	return get_acf_option( 'contact_form_email_from' );
} );

add_filter( 'wp_mail_from_name', function ( $original_email_from ) {
	return get_acf_option( 'contact_form_email_from_name' );
} );

//Remove unnecessary WP code

//WP generator
remove_action( 'wp_head', 'wp_generator' );

//Emoji
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );

//WP-EMBED
add_action( 'wp_footer', function () {
	wp_dequeue_script( 'wp-embed' );
} );

//GUTENBERG
add_action( 'wp_enqueue_scripts', function () {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-block-style' );
	wp_dequeue_style( 'global-styles' );
}, 100 );

//Utilities
add_filter( 'sanitize_file_name', function ( $filename ) {
	if ( extension_loaded( 'intl' ) ) {
		$filename = normalizer_normalize( $filename );
	}

	return preg_replace( "#[^A-Za-z0-9_\.]#", "", $filename );
}, 10, 1 );