<?php
$texts_side = get_sub_field('texts-side');
?>
<section class="module texts-asymetric-graphics texts-side-<?php echo $texts_side; ?>">
	<div class="container">
		<div class="texts-asymetric-graphics-container">
			<div class="texts anim-slide-bottom">
				<p class="texts-caption"><?php echo get_sub_field('texts-caption'); ?></p>
				<h2 class="as-h1 texts-headline"><?php echo get_sub_field('texts-headline'); ?></h2>
				<div class="texts-text"><?php echo get_sub_field('texts-text'); ?></div>
				<span class="texts-label-vertical"><?php echo get_sub_field('texts-label-vertical'); ?></span>
			</div>
			<div class="graphics">
				<?php $graphic_bg = get_sub_field('graphic-bg');  ?>
				<?php if ($graphic_bg): ?>
					<?php echo wp_get_attachment_image($graphic_bg['ID'], 'fullhd', false, ['class' => 'graphic-bg anim-fade-in']); ?>
				<?php endif; ?>

				<?php $graphic_main = get_sub_field('graphic-main');  ?>
				<?php if ($graphic_main): ?>
					<?php echo wp_get_attachment_image($graphic_main['ID'], 'fullhd', false, ['class' => 'graphic-main']); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
