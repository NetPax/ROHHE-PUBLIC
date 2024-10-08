<?php
$type = get_sub_field( 'type' );
$display_as = get_sub_field( 'display_as' );
$content = get_sub_field( 'content' );
?>

<section class="module headline">
	<div class="container-narrow">
		<?php echo '<' . $type . ' class="as-' . $display_as . '">' . $content . '</' . $type . '>'; ?>
	</div>
</section>
