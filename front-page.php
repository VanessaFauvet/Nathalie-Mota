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

<section id="load-moreContainer ">
    <?php echo do_shortcode('[my_ajax_button]'); ?>
</section>

<?php get_footer(); ?>