    <footer id="footer-menu" class="menu">
    <?php wp_nav_menu(array(
            'theme_location' => 'footer',
            // 'container' => 'ul', // afin d'éviter d'avoir une div autour
        ));
    echo '<span class="copyright">Tous droits réservés</span>'; ?>  
        <!-- <p class="copyright">Tous droits réservés</p>    -->
    </footer>

    <?php get_template_part('/template-parts/modale'); ?>

    <?php get_template_part('/template-parts/lightbox'); ?>

    <?php wp_footer(); ?>
    </body>
</html>
