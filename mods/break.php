<?php
$is_line = get_sub_field('is_line');
$height = get_sub_field('height');
?>
<section class="module break<?php echo $is_line ? ' is-line' : ''; ?>">
	<div class="container-narrow break-container" style="height: <?php echo $height; ?>px;"></div>
</section>
