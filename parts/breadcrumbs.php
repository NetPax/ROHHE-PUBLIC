<?php
$breadcrumbs_text  = get_acf_option( 'breadcrumbs_text' ) ? get_acf_option( 'breadcrumbs_text' ) : get_bloginfo();
$breadcrumbs_title = get_the_title();

if ( is_404() ) {
	$breadcrumbs_title = get_acf_option( 'error404_title' );
}

if ( is_search() ) {
	$breadcrumbs_title = get_acf_option( 'search_title' );
}
?>
<div class="breadcrumbs">
	<ul class="breadcrumbs-links">
		<li>
			<a href="<?php echo esc_url( pll_home_url() ); ?>">
				<?php echo $breadcrumbs_text; ?>
			</a>
		</li>

		<?php if ( is_single() ): ?>
			<?php $cpt_posts_list = get_acf_option( get_post_type() . '_posts_list' ); ?>
			<li>
				<a href="<?php echo esc_url( get_permalink( $cpt_posts_list->ID ) ); ?>">
					<?php echo esc_html( get_the_title( $cpt_posts_list->ID ) ); ?>
				</a>
			</li>
		<?php endif; ?>

		<li>
			<span>
				<?php echo $breadcrumbs_title; ?>
			</span>
		</li>
	</ul>
</div>