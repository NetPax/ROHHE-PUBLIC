<?php
$texts_side = get_sub_field('texts-side');
?>
<section class="module texts-image texts-side-<?php echo $texts_side; ?>">
	<div class="container">
		<span class="texts-image-label-horizontal"><?php echo get_sub_field('texts-label-horizontal'); ?></span>
		<div class="texts-image-container">
			<div class="texts anim-slide-bottom">
				<div class="texts-text"><?php echo get_sub_field('texts-text'); ?></div>
			</div>
			<?php $image = get_sub_field('image');  ?>
			<?php if ($image): ?>
				<?php echo wp_get_attachment_image($image['ID'], 'fullhd', false, ['class' => 'image anim-fade-in']); ?>
			<?php endif; ?>
		</div>
	</div>
</section>
