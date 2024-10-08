<?php
$texts_side = get_sub_field('texts-side');
?>
<section class="module texts-graphic-border texts-side-<?php echo $texts_side; ?>">
	<div class="container">
		<div class="texts-graphic-border-container">
			<div class="texts anim-slide-bottom">
				<p class="texts-caption"><?php echo get_sub_field('texts-caption'); ?></p>
				<h2 class="as-h1 texts-headline"><?php echo get_sub_field('texts-headline'); ?></h2>
				<div class="texts-text"><?php echo get_sub_field('texts-text'); ?></div>
				<span class="texts-label-vertical"><?php echo get_sub_field('texts-label-vertical'); ?></span>
			</div>
			<div class="graphics">
				<?php $graphic = get_sub_field('graphic');  ?>
				<?php if ($graphic): ?>
					<?php echo wp_get_attachment_image($graphic['ID'], 'fullhd', false, ['class' => 'graphic']); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
