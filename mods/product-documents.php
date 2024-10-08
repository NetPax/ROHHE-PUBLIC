<?php
$product_id = get_the_ID();

$documents_query_args = array(
	'post_type'      => 'dokument',
	'posts_per_page' => - 1,
	'meta_query'     => array(
		array(
			'key'     => 'document-product',
			'value'   => $product_id,
			'compare' => 'LIKE'
		)
	)
);
?>

<?php $documents_query = new WP_Query($documents_query_args); ?>
<?php if ($documents_query->have_posts()): ?>
	<section class="module documents product-documents">
		<div class="container">
			<div class="product-documents-container">
				<ul class="documents-list">
					<?php while ($documents_query->have_posts()) : $documents_query->the_post(); ?>
						<li class="anim-slide-bottom">
							<?php get_template_part( 'parts/document-excerpt' ); ?>
						</li>
					<?php endwhile; ?>
				</ul>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
<?php endif; ?>