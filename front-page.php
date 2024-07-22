<?php

/**
 * Template Name: Page d'accueil du site
 */

?>

<?php get_header(); ?>

<?php get_template_part('/template-parts/hero'); ?>

<section class="filtres_container">
    <?php get_template_part('template-parts/filtres'); ?>
</section>

<section class="catalogue_container">
    <?php get_template_part('/template-parts/catalogue'); ?>
</section>

<?php get_footer(); ?>