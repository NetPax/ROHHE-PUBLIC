<section class="module text-graphic-tiles anim-slide-bottom">
	<div class="container">
		<div class="text-graphic-tiles-container">
			<?php $graphic = get_sub_field('text-graphic-tiles-graphic');  ?>
			<?php if ($graphic): ?>
				<div class="text-graphic-tiles-graphic anim-fade-in">
					<?php echo wp_get_attachment_image($graphic['ID'], 'full'); ?>
				</div>
			<?php endif; ?>
			<div class="text-graphic-tiles-text anim-slide-bottom">
				<h2 class="as-h1 smaller text-graphic-tiles-headline"><?php echo get_sub_field('text-graphic-tiles-headline'); ?></h2>
				<div class="text-border">
					<?php echo get_sub_field('text-graphic-tiles-text'); ?>
				</div>

				<?php $tiles_list = get_sub_field('text-graphic-tiles-list'); ?>
				<?php include(locate_template('parts/graphic-tile-tpl.php')); ?>
			</div>
		</div>
	</div>
</section>
