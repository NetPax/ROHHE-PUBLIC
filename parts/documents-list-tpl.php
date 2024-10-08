<?php
global $wp_query;
$paged                   = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$documents_list_per_page = get_acf_option( 'documents_list_per_page' );

$documents_query_args = array(
	'post_type'      => 'dokument',
	'posts_per_page' => $documents_list_per_page,
	'paged'          => $paged,
	'orderby'        => 'title',
	'order'          => 'asc'
);

$tax_query_document_type = [];

$t   = '';
$pid = null;

if ( isset( $_REQUEST['t'] ) && $_REQUEST['t'] !== '' ) {
	$t                         = sanitize_title( $_REQUEST['t'] );
	$tax_query_document_type[] = array(
		'taxonomy' => 'rodzaj',
		'field'    => 'slug',
		'terms'    => $t,
	);
}

if ( count( $tax_query_document_type ) > 0 ) {
	$documents_query_args['tax_query'] = $tax_query_document_type;
}

if ( isset( $_REQUEST['pid'] ) && $_REQUEST['pid'] !== '' ) {
	$pid = sanitize_title( $_REQUEST['pid'] );
}
?>

<section id="ajax-section" class="ajax-section">
	<div class="container ajax-info">
		<div class="ajax-loading">
			<div class="loader"></div>
		</div>
		<h2 class="ajax-error"><?php echo get_acf_option( 'trans_ajax_error' ); ?></h2>
	</div>
	<div class="container">
		<form id="documents-filter-form" class="filters">
			<?php
			$products_query_args = array(
				'post_type'      => 'produkt',
				'posts_per_page' => - 1,
			);
			?>
			<?php $products_query = new WP_Query( $products_query_args ); ?>
			<?php if ( $products_query->have_posts() ): ?>
				<div class="filter-field">
					<label for="product-item"><?php echo get_acf_option( 'trans_product' ); ?></label>
					<select name="product-item" id="product-item">
						<option value=""><?php echo get_acf_option( 'trans_all_products' ); ?></option>
						<?php while ( $products_query->have_posts() ) : $products_query->the_post(); ?>
							<?php
							$product_id = get_the_ID();
							?>
							<option <?php echo $product_id == $pid ? ' selected' : ''; ?> value="<?php echo get_the_ID(); ?>"><?php echo get_the_title(); ?></option>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					</select>
				</div>
			<?php endif; ?>
			<?php
			$documents_types = get_terms( array(
				'taxonomy'   => 'rodzaj',
				'hide_empty' => false,
			) );
			?>
			<?php if ( $documents_types ): ?>
				<div class="filter-field">
					<label for="document-type"><?php echo get_acf_option( 'trans_document_type' ); ?></label>
					<select name="document-type" id="document-type">
						<option value=""><?php echo get_acf_option( 'trans_all_documents' ); ?></option>
						<?php foreach ( $documents_types as $documents_type ): ?>
							<?php
							$type_slug = $documents_type->slug;
							$type_name = $documents_type->name;
							?>
							<option<?php echo $type_slug === $t ? ' selected' : ''; ?> value="<?php echo $type_slug; ?>">
								<?php echo $type_name; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>
			<?php endif; ?>
		</form>
	</div>

	<div class="container">
		<?php
		if ( $pid ) {
			$documents_query_args['meta_query'] = array(
				array(
					'key'     => 'document-product',
					'value'   => $pid,
					'compare' => 'LIKE'
				)
			);
		}
		?>

		<?php $documents_query = new WP_Query( $documents_query_args ); ?>
		<?php if ( $documents_query->have_posts() ): ?>
			<ul class="documents-list">
				<?php while ( $documents_query->have_posts() ) : $documents_query->the_post(); ?>
					<li class="<?php echo isset( $_POST['nonce'] ) ? '' : 'anim-slide-bottom'; ?>">
						<?php get_template_part( 'parts/document-excerpt' ); ?>
					</li>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</ul>
		<?php else: ?>
			<h2 class="documents-message"><?php echo get_acf_option( 'trans_no_documents_found' ); ?></h2>
		<?php endif; ?>

		<?php if ( ! $t && ! $pid ): ?>
			<?php
			$count_posts = wp_count_posts( 'dokument' );

			if ( $count_posts ) {
				$published_posts = $count_posts->publish;
			}
			?>

			<?php if ( $published_posts > $documents_list_per_page ): ?>
				<div class="posts-pager">
					<?php
					echo paginate_links(
						array(
							'current'   => max( 1, $paged ),
							'total'     => $documents_query->max_num_pages,
							'prev_next' => true,
							'prev_text' => get_acf_option( 'trans_prev_page' ),
							'next_text' => get_acf_option( 'trans_next_page' ),
							'mid_size'  => 1
						)
					);
					?>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</section>