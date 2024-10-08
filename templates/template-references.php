<?php
/*
	Template name: Obiekty referencyjne
*/
?>

<?php get_header(); ?>

<main class="subpage references">
	<?php include(locate_template('parts/top.php')); ?>

	<section class="references-list">
		<div class="container">

			<?php
			$refs_objects_types = get_terms(array(
				'taxonomy'   => 'rodzaj-obiektu',
				'hide_empty' => false,
			));
			?>

			<?php foreach ($refs_objects_types as $refs_objects_type): ?>
				<?php
				$refs_objects_type_slug = $refs_objects_type->slug;
				$refs_objects_type_name = $refs_objects_type->name;

				$ref_objects_query = new WP_Query(array(
					'post_type'      => 'obiekt-referencyjny',
					'posts_per_page' => -1,
					'tax_query'      => array(
						array(
							'taxonomy' => 'rodzaj-obiektu',
							'field'    => 'slug',
							'terms'    => array($refs_objects_type_slug),
							'operator' => 'IN'
						)
					)
				));
				?>

				<div id="<?php echo $refs_objects_type_slug; ?>" class="references-objects-group">

					<?php if ($ref_objects_query->have_posts()): ?>
						<?php $query_ctn = 0; ?>
						<?php while ($ref_objects_query->have_posts()): $ref_objects_query->the_post(); ?>

							<?php if ($query_ctn == 0): ?>
								<div class="references-objects-toggle">
									<div class="reference-object">
										<div class="reference-object-graphic anim-fade-in">
											<?php $object_graphic = get_field('object-graphic'); ?>
											<?php if ($object_graphic): ?>
												<?php echo wp_get_attachment_image( $object_graphic['ID'], 'medium_large', false, [ 'class' => 'object-graphic' ] ); ?>
											<?php endif; ?>
										</div>
										<div class="reference-object-text anim-slide-bottom">
											<h2 class="object-type-title"><?php echo $refs_objects_type_name; ?></h2>
											<p class="object-title"><?php echo get_the_title(); ?></p>
											<p class="object-localisation"><?php echo get_field('object-localisation'); ?></p>
											<button class="object-toggle button button-brand button-large button-label-toggle js-object-toggle">
												<span><?php echo get_acf_option('trans_more_examples'); ?></span>
												<span><?php echo get_acf_option('trans_collapse'); ?></span>
												<?php get_template_part('resources/img/arrow-link.svg'); ?>
											</button>
										</div>
									</div>
								</div>
							<?php else: ?>
								<?php if ($query_ctn == 1): ?>
									<div class="references-objects-rest">
								<?php endif; ?>
								<div class="reference-object">
									<div class="reference-object-wrap">
										<div class="reference-object-graphic">
											<?php $object_graphic = get_field('object-graphic'); ?>
											<?php if ($object_graphic): ?>
												<?php echo wp_get_attachment_image( $object_graphic['ID'], 'medium_large', false, [ 'class' => 'object-graphic' ] ); ?>
											<?php endif; ?>
										</div>
										<div class="reference-object-text">
											<p class="object-title"><?php echo get_the_title(); ?></p>
											<p class="object-localisation"><?php echo get_field('object-localisation'); ?></p>
										</div>
									</div>
								</div>
							<?php endif; ?>

							<?php $query_ctn++; ?>

							<?php if ($query_ctn == $ref_objects_query->post_count): ?>
								</div>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>

					<?php
					$ref_objects_query = null;
					wp_reset_postdata();
					?>

				</div>
			<?php endforeach; ?>

		</div>
	</section>

	<section id="references-list-full" class="references-list-full">
		<div class="container">
			<h2><?php echo get_field('see_all_references_headline'); ?></h2>

			<div class="references-all">
				<div class="anim-slide-bottom"><?php echo get_field('see_all_references_full_list_1'); ?></div>
				<div class="anim-slide-bottom"><?php echo get_field('see_all_references_full_list_2'); ?></div>
				<div class="anim-slide-bottom"><?php echo get_field('see_all_references_full_list_3'); ?></div>
				<div class="anim-slide-bottom"><?php echo get_field('see_all_references_full_list_4'); ?></div>
			</div>

			<button class="all-references-toggle button button-brand button-large button-label-toggle js-all-references-toggle">
				<span><?php echo get_field('see_all_references_link_label'); ?></span>
				<span><?php echo get_acf_option('trans_collapse'); ?></span>
				<?php get_template_part('resources/img/arrow-link.svg'); ?>
			</button>
		</div>
	</section>
</main>

<?php get_footer(); ?>
