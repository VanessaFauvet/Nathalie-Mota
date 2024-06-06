<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage nathalie-mota
 */
?>
	<footer id="footer-menu">
    <?php wp_nav_menu(array(
            'theme_location' => 'footer',
            'container' => 'ul', // afin d'éviter d'avoir une div autour
        )); ?>	
        <p class="copyright">Tous droits réservés</p>	
	</footer>

	<!-- Lance la popup contact -->
	<?php get_template_part('/template-parts/modale'); ?>

    <?php wp_footer(); ?>
    </body>
</html>