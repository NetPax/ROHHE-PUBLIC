<?php
$products_query_args = array(
	'post_type'      => 'produkt',
	'posts_per_page' => -1,
);

$tax_query_product_type = [];

$t = '';
$pid = null;

if (!isset($_REQUEST['pid']) || $_REQUEST['pid'] === '') {
	if (isset( $_REQUEST['t'] ) && $_REQUEST['t'] !== '') {
		$t = sanitize_title($_REQUEST['t']);
		$tax_query_product_type[] = array(
			'taxonomy' => 'typ',
			'field'    => 'slug',
			'terms'    => $t,
		);
	}

	if (count($tax_query_product_type) > 0) {
		$products_query_args['tax_query'] = $tax_query_product_type;
	}
}

if (isset($_REQUEST['pid']) && $_REQUEST['pid'] !== '') {
	$pid = sanitize_title($_REQUEST['pid']);
}
?>

<section id="ajax-section" class="ajax-section">
	<div class="container ajax-info">
		<div class="ajax-loading">
			<div class="loader"></div>
		</div>
		<h2 class="ajax-error"><?php echo get_acf_option('trans_ajax_error'); ?></h2>
	</div>
	<div class="container">
		<form id="products-filter-form" class="filters">
			<?php
			$products_types = get_terms(array(
				'taxonomy'   => 'typ',
				'hide_empty' => false,
			));
			?>
			<?php if ($products_types): ?>
				<div class="filter-field">
					<label for="product-type"><?php echo get_acf_option('trans_product_type'); ?></label>
					<select name="product-type" id="product-type">
						<option value=""><?php echo get_acf_option('trans_all'); ?></option>
						<?php foreach ($products_types as $products_type): ?>
							<?php
							$type_slug = $products_type->slug;
							$type_name = $products_type->name;
							?>
							<option<?php echo $type_slug === $t ? ' selected' : ''; ?> value="<?php echo $type_slug; ?>">
								<?php echo $type_name; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>
			<?php endif; ?>

			<?php $products_query = new WP_Query($products_query_args); ?>
			<?php if ($products_query->have_posts()): ?>
				<div class="filter-field">
					<label for="product-item"><?php echo get_acf_option('trans_product'); ?></label>
					<select name="product-item" id="product-item">
						<option value=""><?php echo get_acf_option('trans_all_products'); ?></option>
						<?php while ($products_query->have_posts()) : $products_query->the_post(); ?>
							<?php
							$product_id = get_the_ID();
							?>
							<option <?php echo $product_id == $pid ? ' selected' : ''; ?> value="<?php echo get_the_ID(); ?>"><?php echo get_the_title(); ?></option>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					</select>
				</div>
			<?php endif; ?>
		</form>
	</div>

	<div class="container">
		<?php
		if ($pid) {
			$products_query_args['p'] = $pid;
		}
		?>

		<?php $products_query = new WP_Query($products_query_args); ?>
		<?php if ($products_query->have_posts()): ?>
			<ul class="products-list">
				<?php while ($products_query->have_posts()) : $products_query->the_post(); ?>
					<li class="<?php echo isset($_POST['nonce']) ? '' : 'anim-slide-bottom'; ?>">
						<?php get_template_part('parts/product-excerpt'); ?>
					</li>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</ul>
		<?php else: ?>
			<h2 class="products-message"><?php echo get_acf_option('trans_no_products_found'); ?></h2>
		<?php endif; ?>
	</div>
</section>