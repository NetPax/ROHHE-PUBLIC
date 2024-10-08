<?php get_header(); ?>
<?php
$top_title = get_the_title();
$top_image = get_field('news_single_image');

$top_type_class = 'top-type-news-single';
?>
<main class="subpage news">
	<section class="top <?php echo $top_type_class; ?>">
		<div class="container">
			<?php include(locate_template('parts/breadcrumbs.php')); ?>
		</div>
		<div class="container">
			<div class="top-wrapper">
				<?php if ($top_image): ?>
					<?php echo wp_get_attachment_image($top_image['ID'], 'fullhd', false, [ 'class' => 'top-image' ]); ?>
				<?php endif; ?>
				<h1 class="top-headline"><?php echo $top_title; ?></h1>
			</div>
		</div>
	</section>

	<section class="news-single">
		<?php include(locate_template('mods/modules.php')); ?>
	</section>
</main>

<?php get_footer(); ?>
