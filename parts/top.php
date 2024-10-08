<?php
$top_type = get_field('top_type');
$top_title = get_field('top_other_title') ?: get_the_title();
$top_image = get_field( 'top_image' ) ?: get_acf_option('subpage_default_image');
$top_introduction = get_field('top_introduction');

if (is_search()) {
	$top_type = 'top_type_simple';
	$top_title = get_acf_option('search_title');
	$top_introduction = null;
}

if (is_404()) {
	$top_type = 'top_type_image';
	$top_title = get_acf_option('error404_title');
	$top_image = get_acf_option('error404_image');
}

switch ($top_type) {
	case 'top_type_image':
		$top_type_class = 'top-type-image';
		break;
	case 'top_type_gradient':
		$top_type_class = 'top-type-gradient';
		break;
	case 'top_type_two_cols':
		$top_type_class = 'top-type-two-cols';
		break;
	case 'top_type_two_pictures':
		$top_type_class = 'top-type-two-pictures';
		break;
	default:
		$top_type_class = 'top-type-simple';
}
?>
<?php if ($top_type == 'top_type_two_cols'): ?>
	<?php include(locate_template('parts/parts-top/top-type-two-cols.php')); ?>
<?php elseif ($top_type = 'top_type_two_pictures'): ?>
	<?php include(locate_template('parts/parts-top/top-type-two-pictures.php')); ?>
<?php else: ?>
	<?php include(locate_template('parts/parts-top/top-default.php')); ?>
<?php endif; ?>

