<section class="module text-files-image">
	<div class="container">
		<div class="text-files-image-container">
			<div class="texts anim-slide-bottom">
				<div class="texts-text"><?php echo get_sub_field('texts-text'); ?></div>

				<?php $files = get_sub_field('files-to-download'); ?>
				<?php get_template_part('parts/files-to-download-tpl', null, $files); ?>
			</div>
			<?php $image = get_sub_field('image');  ?>
			<?php if ($image): ?>
				<div class="image anim-fade-in">
					<?php echo wp_get_attachment_image($image['ID'], 'fullhd', false, ['class' => 'image-img']); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
