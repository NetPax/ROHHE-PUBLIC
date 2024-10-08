<?php if ( have_rows( 'modules' ) ): ?>
	<div class="modules">
		<?php while ( have_rows( 'modules' ) ) : the_row(); ?>
			<?php $template_filename = locate_template( 'mods/' . get_row_layout() . '.php' ); ?>
			<?php if ( file_exists( $template_filename ) ): ?>
				<?php include( $template_filename ); ?>
			<?php endif; ?>
		<?php endwhile; ?>
	</div>
<?php endif; ?>
