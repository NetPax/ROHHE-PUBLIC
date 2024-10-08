<section class="module timeline">
	<div class="container">
		<div class="timeline-container">
			<p class="timeline-caption"><?php echo get_sub_field('timeline-caption'); ?></p>
			<h2 class="as-h1 timeline-headline"><?php echo get_sub_field('timeline-headline'); ?></h2>
			<?php $timeline_axis = get_sub_field('timeline-axis'); ?>

			<?php if ($timeline_axis): ?>
				<div class="timeline-axis">

					<div class="timeline-row timeline-events">
						<div class="swiper swiper-timeline-events">
							<div class="swiper-wrapper">
								<?php foreach ($timeline_axis as $year): ?>
									<div class="swiper-slide">
										<div class="timeline-col">
											<div class="events"><?php echo $year['timeline-events']; ?></div>
											<div class="year"><?php echo $year['timeline-year']; ?></div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
							<div class="swiper-button-prev"></div>
							<div class="swiper-button-next"><span><?php echo get_acf_option('trans_scroll'); ?></span></div>
						</div>
					</div>

					<div class="timeline-row timeline-media">
						<div class="swiper swiper-timeline-media">
							<div class="swiper-wrapper">
								<?php foreach ($timeline_axis as $year): ?>
									<div class="swiper-slide">
										<div class="timeline-col">
											<div class="media">
												<?php $picture = $year['timeline-picture'];  ?>
												<?php if ($picture): ?>
													<?php echo wp_get_attachment_image($picture['ID'], 'fullhd', false, ['class' => 'picture']); ?>
												<?php endif; ?>
												<?php if ($year['timeline-highlighted-text']): ?>
													<p class="high-text"><?php echo $year['timeline-highlighted-text']; ?></p>
												<?php endif; ?>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>

				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
