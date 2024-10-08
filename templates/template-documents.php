<?php
/*
	Template name: Lista dokumentów
*/
?>

<?php get_header(); ?>

<main class="subpage documents">
    <?php include(locate_template('parts/top.php')); ?>
    <?php include(locate_template('parts/documents-list-tpl.php')); ?>
</main>

<?php get_footer(); ?>
