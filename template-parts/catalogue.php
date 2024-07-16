<?php
    // Tableau associatif pour demander une photo aléatoire
    $photoArgs = array(
        'post_type' => 'photo',
        'posts_per_page' => 8,
        'orderby' => 'rand',
    );

    // Exécute la requête WP_Query pour récupérer les infos auprès de WordPress
    $photoQuery = new WP_Query( $photoArgs );
    if ( $photoQuery->have_posts() ) {
        while ($photoQuery->have_posts() ) {
            $photoQuery->the_post();
            // Affiche la vignette de la photo en taille complète
            echo get_the_post_thumbnail(get_the_ID(), 'full');
    }

    // Réinitialise l'environnement de WordPress après une requête personnalisée
    wp_reset_postdata();
}
?>