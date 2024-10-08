<?php $products_link_label = get_acf_option('trans_read_more'); ?>
<a class="product-excerpt" href="<?php the_permalink(); ?>">
	<?php $decor = rand(1, 3); ?>
	<img class="product-decor product-decor-<?php echo $decor; ?>" src="<?php echo get_template_directory_uri(); ?>/resources/img/triangles<?php echo $decor; ?>.png" alt="">
	<p class="product-name as-h2"><?php echo get_the_title(); ?></p>
	<?php $product_image = get_field('product_image'); ?>
	<?php if ($product_image): ?>
		<?php echo wp_get_attachment_image($product_image['ID'], 'medium_large', false, [ 'class' => 'product-image' ]); ?>
	<?php endif; ?>
	<p class="product-short-desc text-upper"><?php echo get_field('product_short_desc'); ?></p>
	<div class="product-link button button-brand button-large">
		<?php echo $products_link_label; ?>
		<?php get_template_part('resources/img/arrow-link.svg'); ?>
	</div>
</a>