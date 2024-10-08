<?php get_header(); ?>
<?php
$top_title = get_the_title();
$top_image = get_field('product_image_page');

$top_type_class = 'top-type-product-single';
?>
<main class="subpage products products-single">
	<section class="top <?php echo $top_type_class; ?>">
		<div class="container">
			<?php include(locate_template('parts/breadcrumbs.php')); ?>
		</div>
		<div class="container">
			<div class="top-wrapper">
				<div class="top-product-image anim-fade-in">
					<?php if ($top_image): ?>
						<?php echo wp_get_attachment_image($top_image['ID'], 'fullhd', false, [ 'class' => 'top-image' ]); ?>
					<?php endif; ?>
				</div>
				<div class="top-product-content anim-slide-bottom">
					<p class="top-product-short-desc"><?php echo get_field('product_short_desc'); ?></p>
					<h1 class="smaller top-headline"><?php echo $top_title; ?></h1>
					<?php echo get_field('product_longer_desc'); ?>
				</div>
			</div>
		</div>
	</section>

	<?php include(locate_template('mods/modules.php')); ?>

	<section>
		<div class="container">
			<?php
			$products_list = get_acf_option('produkt_posts_list');
			$products_list_link = get_permalink($products_list->ID);
			?>
			<a class="products-link button button-dark button-large" href="<?php echo esc_url($products_list_link); ?>" target="_self">
				<?php echo get_acf_option('trans_see_all_products'); ?>
				<?php get_template_part('resources/img/arrow-link.svg'); ?>
			</a>
		</div>
	</section>
</main>

<?php get_footer(); ?>
