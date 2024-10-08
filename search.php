<?php get_header(); ?>

	<main class="subpage search">
		<?php include( locate_template( 'parts/top.php' ) ); ?>

		<section class="module search-results">
			<div class="container-narrow">
				<h2>
					<?php echo get_acf_option( 'trans_search_results_text' ); ?>
					<span><?php the_search_query(); ?></span>
				</h2>
				<?php if ( have_posts() ) : ?>
					<ul class="search-results-list">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php $link = get_permalink(); ?>
							<li>
								<a href="<?php echo $link; ?>" target="_self">
									<?php relevanssi_the_title() ?>
								</a>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php else: ?>
					<h3><?php echo get_acf_option( 'trans_search_no_results_text' ); ?></h3>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</section>
	</main>

<?php get_footer(); ?>