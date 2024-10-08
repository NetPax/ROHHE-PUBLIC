<section class="module accordion">
	<div class="container">
		<dl class="accordion">
			<?php if (have_rows('rows')): ?>
				<?php while (have_rows('rows')) : the_row(); ?>
					<dt class="accordion-nav anim-slide-bottom">
						<button class="accordion-toggle">
							<?php echo get_sub_field('title'); ?>
						</button>
					</dt>
					<dd class="accordion-content">
						<?php echo get_sub_field('content'); ?>
					</dd>
				<?php endwhile; ?>
			<?php endif; ?>
		</dl>
	</div>
</section>
