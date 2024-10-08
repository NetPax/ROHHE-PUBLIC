<?php
/*
	Template name: Strona główna
*/
?>

<?php get_header(); ?>

<main class="homepage">
	<section class="cta top top-type-image">
		<div class="container cta-container">
			<?php $cta_slider = get_field('cta_slider'); ?>
			<?php if ($cta_slider): ?>
				<div class="swiper swiper-cta">
					<div class="swiper-wrapper">
						<?php foreach($cta_slider as $slide): ?>
							<div class="swiper-slide">
								<div class="top-wrapper">
									<?php if ($slide['caption']): ?>
										<p class="as-h2 top-caption anim-slide-bottom"><?php echo $slide['caption']; ?></p>
									<?php endif; ?>
									<h1 class="top-headline"><?php echo $slide['headline']; ?></h1>
									<div class="top-content">
										<div class="top-text text-border anim-slide-right">
											<?php echo $slide['text']; ?>
										</div>
										<?php $link = $slide['link']; ?>
										<?php if ($link): ?>
											<?php
											$link_url = $link['url'];
											$link_title = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self';
											?>
											<div class="anim-slide-right">
												<a class="top-link button button-white button-large" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
													<?php echo esc_html($link_title); ?>
													<?php get_template_part('resources/img/arrow-link.svg'); ?>
												</a>
											</div>
										<?php endif; ?>
									</div>
									<?php $image = $slide['image']; ?>
									<?php if ($image): ?>
										<?php echo wp_get_attachment_image($image['ID'], 'fullhd', false, [ 'class' => 'top-image' ]); ?>
									<?php endif; ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>
			<div class="swiper-button-prev"><?php get_template_part('resources/img/arrow-slider.svg'); ?></div>
			<div class="swiper-button-next"><?php get_template_part('resources/img/arrow-slider.svg'); ?></div>
		</div>
	</section>

	<section class="about">
		<div class="container about-container">
			<?php $about_image = get_field('about_image'); ?>
			<?php if ($about_image): ?>
				<div class="about-image anim-slide-bottom">
					<?php echo wp_get_attachment_image($about_image['ID'], 'fullhd', false, [ 'class' => 'about-image-img' ]); ?>
				</div>
			<?php endif; ?>
			<div class="about-text">
				<h2 class="as-h1 section-headline"><?php echo get_field('about_headline'); ?></h2>
				<div class="text-content">
					<p class="text-lead text-upper anim-slide-bottom"><?php echo get_field('about_lead'); ?></p>
					<div class="text-border anim-slide-bottom">
						<?php echo get_field('about_text'); ?>
					</div>
					<?php $about_link = get_field('about_link'); ?>
					<?php if ($about_link): ?>
						<?php
						$link_url = $about_link['url'];
						$link_title = $about_link['title'];
						$link_target = $about_link['target'] ? $link['target'] : '_self';
						?>
						<div class="anim-slide-bottom">
							<a class="text-link button button-brand button-large" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
								<?php echo esc_html($link_title); ?>
								<?php get_template_part('resources/img/arrow-link.svg'); ?>
							</a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<section class="products">
		<div class="container products-container">
			<h2 class="as-h1 section-headline"><?php echo get_field('products_headline'); ?></h2>
			<ul class="products-list">
				<?php $products_selected_list = get_field('products_selected_list'); ?>
				<?php if ($products_selected_list): ?>
					<?php foreach($products_selected_list as $post): ?>
						<?php setup_postdata($post); ?>
						<li class="anim-slide-bottom">
							<?php get_template_part('parts/product-excerpt'); ?>
						</li>
						<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</ul>
			<?php $products_page_link = get_field('products_page_link'); ?>
			<?php if ($products_page_link): ?>
				<?php
				$link_url = $products_page_link['url'];
				$link_title = $products_page_link['title'];
				$link_target = $products_page_link['target'] ? $link['target'] : '_self';
				?>
				<a class="products-link button button-dark button-large" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
					<?php echo esc_html($link_title); ?>
					<?php get_template_part('resources/img/arrow-link.svg'); ?>
				</a>
			<?php endif; ?>
		</div>
	</section>

	<section class="reference">
		<div class="container">
			<h2 class="as-h1 section-headline section-headline-mobile"><?php echo get_field('reference_headline'); ?></h2>
		</div>
		<div class="container reference-container">
			<div class="reference-images">
				<?php $reference_image_bg = get_field('reference_image_bg'); ?>
				<?php if ($reference_image_bg): ?>
					<div class="reference-image-bg anim-fade-in">
						<?php echo wp_get_attachment_image($reference_image_bg['ID'], 'fullhd', false, [ 'class' => 'reference-image-bg-img' ]); ?>
					</div>
				<?php endif; ?>
				<?php $reference_image_main = get_field('reference_image_main'); ?>
				<?php if ($reference_image_main): ?>
					<div class="reference-image-main anim-fade-in">
						<?php echo wp_get_attachment_image($reference_image_main['ID'], 'fullhd', false, [ 'class' => 'reference-image-main-img' ]); ?>
						<p><?php echo get_field('reference_image_main_caption'); ?></p>
					</div>
				<?php endif; ?>
			</div>
			<div class="reference-text">
				<h2 class="as-h1 section-headline section-headline-desktop"><?php echo get_field('reference_headline'); ?></h2>
				<div class="text-content">
					<p class="text-lead text-upper text-underscore anim-slide-bottom"><?php echo get_field('reference_lead'); ?></p>
					<?php $reference_link = get_field('reference_link'); ?>
					<?php if ($reference_link): ?>
						<?php
						$link_url = $reference_link['url'];
						$link_title = $reference_link['title'];
						$link_target = $reference_link['target'] ? $link['target'] : '_self';
						?>
						<div class="anim-slide-bottom">
							<a class="text-link button button-brand button-large" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
								<?php echo esc_html($link_title); ?>
								<?php get_template_part('resources/img/arrow-link.svg'); ?>
							</a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
