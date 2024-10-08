<!DOCTYPE html>
<html lang="<?php echo pll_current_language(); ?>">
	<head>
		<meta charset="utf-8">
		<title>
			<?php
			if (is_404()) {
				echo get_acf_option( 'trans_page_was_not_found' ) . ' - ' . get_bloginfo();
			} else if (is_search()) {
				echo get_acf_option( 'trans_search_results_for' ) . ' "' . get_search_query() . '" - ' . get_bloginfo();
			} else {
				wp_title('-', true, 'right');
			}
			?>
		</title>
		<link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/resources/img/favicon.ico">
		<meta name="theme-color" content="#9A0C19">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<header class="site-header">
		<div class="container">
			<div class="site-branding">
				<a class="site-logo" href="<?php echo esc_url(pll_home_url()); ?>">
					<?php $logo = get_acf_option('site_logo'); ?>
					<?php if ($logo): ?>
						<?php echo wp_get_attachment_image($logo['ID'], 'full'); ?>
					<?php endif; ?>
				</a>
			</div>
			<div class="site-nav">
				<div class="site-tools">
					<?php get_template_part( 'parts/parts-tools/social-links' ); ?>
					<?php get_template_part( 'parts/parts-tools/search' ); ?>
					<?php get_template_part( 'parts/parts-tools/language-switch' ); ?>
					<?php get_template_part( 'parts/parts-tools/menu-toggle' ); ?>
				</div>
				<div class="site-main-menu">
					<?php
					wp_nav_menu(array(
						'depth'           => 10,
						'container'       => 'nav',
						'container_class' => 'header-main-menu-container',
						'container_id'    => 'header-main-menu-container',
						'menu_class'      => 'header-main-menu',
						'menu_id'         => 'header-main-menu',
						'theme_location'  => 'primary-menu',
						'walker'          => new WP_Bootstrap_Navwalker(),
						'items_wrap'      => '<ul id="%1$s" class="%2$s" data-level="1">%3$s</ul>'
					));
					?>
				</div>
			</div>
		</div>
	</header>