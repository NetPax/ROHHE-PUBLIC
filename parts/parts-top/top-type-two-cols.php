<section class="top <?php echo $top_type_class; ?>">
	<div class="container">
		<?php include(locate_template('parts/breadcrumbs.php')); ?>
	</div>
	<div class="container">
		<div class="top-wrapper">
			<?php if ($top_image): ?>
				<div class="top-image-wrapper">
					<?php echo wp_get_attachment_image($top_image['ID'], 'fullhd', false, [ 'class' => 'top-image' ]); ?>
				</div>
			<?php endif; ?>
			<div class="top-content">
				<h1 class="top-headline"><?php echo $top_title; ?></h1>
				<div class="top-text anim-slide-right">
					<?php echo $top_introduction; ?>
				</div>
			</div>
		</div>
	</div>
</section>