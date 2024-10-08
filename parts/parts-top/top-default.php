<section class="top <?php echo $top_type_class; ?>">
	<div class="container">
		<?php include(locate_template('parts/breadcrumbs.php')); ?>
	</div>
	<div class="container">
		<div class="top-wrapper">
			<h1 class="top-headline"><?php echo $top_title; ?></h1>
			<?php if ($top_introduction): ?>
				<div class="top-content">
					<div class="top-text text-border anim-slide-right">
						<?php echo $top_introduction; ?>
					</div>
				</div>
			<?php endif; ?>
			<?php if ($top_type === 'top_type_image'): ?>
				<?php if ($top_image): ?>
					<?php echo wp_get_attachment_image($top_image['ID'], 'fullhd', false, [ 'class' => 'top-image' ]); ?>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
</section>