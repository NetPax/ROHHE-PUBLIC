<?php
$tech_data_side = get_sub_field('tech-data-side');
?>
<section class="module tech-data tech-data-<?php echo $tech_data_side; ?> anim-slide-bottom">
	<div class="container">
		<div class="tech-data-container">
			<h2 class="as-h4 tech-data-headline"><?php echo get_sub_field('tech-data-headline'); ?></h2>
			<?php $graphic = get_sub_field('tech-data-graphic');  ?>
			<?php if ($graphic): ?>
				<div class="tech-data-graphic">
					<?php echo wp_get_attachment_image($graphic['ID'], 'full'); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
