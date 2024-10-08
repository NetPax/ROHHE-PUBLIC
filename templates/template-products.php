<?php
/*
	Template name: Lista produktów
*/
?>

<?php get_header(); ?>

<main class="subpage products">
    <?php include(locate_template('parts/top.php')); ?>
    <?php include(locate_template('parts/products-list-tpl.php')); ?>
</main>

<?php get_footer(); ?>
