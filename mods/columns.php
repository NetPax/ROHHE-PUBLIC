<section class="module columns">
	<div class="container-narrow">
		<div class="columns-container">
			<?php if (get_sub_field('content')['first']): ?>
				<div class="columns-col columns-col-first">
					<?php echo get_sub_field('content')['first']; ?>
				</div>
			<?php endif; ?>

			<?php if (get_sub_field('content')['second']): ?>
				<div class="columns-col columns-col-second">
					<?php echo get_sub_field('content')['second']; ?>
				</div>
			<?php endif; ?>

			<?php if (get_sub_field('content')['third']): ?>
				<div class="columns-col columns-col-third">
					<?php echo get_sub_field('content')['third']; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
