<section class="module iso">
	<div class="container">
		<div class="iso-container">

			<?php $graphic_left = get_sub_field('graphic-left');  ?>
			<?php if ($graphic_left): ?>
				<?php echo wp_get_attachment_image($graphic_left['ID'], 'fullhd', false, ['class' => 'graphic-left anim-fade-in']); ?>
			<?php endif; ?>

			<div class="texts anim-slide-bottom">
				<span class="iso-label-horizontal"><?php echo get_sub_field('texts-label-horizontal'); ?></span>
				<h2 class="texts-headline"><?php echo get_sub_field('texts-headline'); ?></h2>
				<div class="texts-text"><?php echo get_sub_field('texts-text'); ?></div>

				<?php $files = get_sub_field('files-to-download'); ?>
				<?php get_template_part('parts/files-to-download-tpl', null, $files); ?>
			</div>

			<?php $graphic_right = get_sub_field('graphic-right');  ?>
			<?php if ($graphic_right): ?>
				<?php echo wp_get_attachment_image($graphic_right['ID'], 'fullhd', false, ['class' => 'graphic-right anim-fade-in']); ?>
			<?php endif; ?>

		</div>
	</div>
</section>
