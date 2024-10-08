<section class="module text-graphic anim-slide-bottom">
	<div class="container">
		<div class="text-graphic-container">
			<div class="text-graphic-text anim-slide-bottom">
				<h2 class="as-h1 smaller text-graphic-headline"><?php echo get_sub_field('text-graphic-headline'); ?></h2>
				<?php echo get_sub_field('text-graphic-text'); ?>
			</div>
			<?php $graphic = get_sub_field('text-graphic-graphic');  ?>
			<?php if ($graphic): ?>
				<div class="text-graphic-graphic anim-fade-in">
					<?php echo wp_get_attachment_image($graphic['ID'], 'full'); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
