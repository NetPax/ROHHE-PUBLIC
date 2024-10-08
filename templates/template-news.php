<?php
/*
	Template name: Lista aktualności
*/
?>

<?php get_header(); ?>

<main class="subpage news">
    <?php include(locate_template('parts/top.php')); ?>

	<section class="news-list">
		<div class="container">
			<?php
			global $wp_query;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$news_list_per_page = get_acf_option('news_list_per_page');
			?>

			<?php
			$query = new WP_Query(array(
				'post_type'      => 'aktualnosc',
				'posts_per_page' => $news_list_per_page,
				'paged'          => $paged,
			));
			?>

			<?php if ($query->have_posts()): ?>
				<?php while ($query->have_posts()) : $query->the_post(); ?>
					<?php
					$news_title = get_the_title();
					$news_list_text = get_field('news_list_text');
					$news_list_image = get_field('news_list_image');
					$news_link = get_the_permalink();
					?>
					<div class="news-excerpt anim-slide-bottom">
						<?php if ($news_list_image): ?>
							<?php echo wp_get_attachment_image( $news_list_image['ID'], 'fullhd', false, [ 'class' => 'news-excerpt-image' ] ); ?>
						<?php endif; ?>
						<div class="news-excerpt-text">
							<h2><?php echo $news_title; ?></h2>
							<div class="news-excerpt-content">
								<?php echo $news_list_text; ?>
								<?php if ($news_link): ?>
									<a class="button button-brand button-large button-more" href="<?php echo $news_link; ?>" target="_self">
										<?php echo get_acf_option('trans_read_more'); ?>
										<?php get_template_part('resources/img/arrow-link.svg'); ?>
									</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>

			<?php
			$count_posts = wp_count_posts('aktualnosc');

			if ($count_posts) {
				$published_posts = $count_posts->publish;
			}
			?>

			<?php if ($published_posts > $news_list_per_page): ?>
				<div class="posts-pager">
					<?php
					echo paginate_links(
						array(
							'current'   => max(1, $paged),
							'total' 	=> $query->max_num_pages,
							'prev_next' => true,
							'prev_text' => get_acf_option('trans_prev_page'),
							'next_text' => get_acf_option('trans_next_page'),
							'mid_size'  => 1
						)
					);
					?>
				</div>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php get_footer(); ?>
