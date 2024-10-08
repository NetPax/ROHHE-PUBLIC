<?php get_header(); ?>

<main class="subpage error-404">
    <?php include(locate_template('parts/top.php')); ?>

	<section>
		<div class="container">
            <h2><?php echo get_acf_option('error404_text'); ?></h2>
		</div>
	</section>

</main>

<?php get_footer(); ?>
