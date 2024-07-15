<div class="hero">

    <h1 class="hero_title">Photographe event</h1>
    
    <?php
    // Récupération d'une photo aléatoire
    $hero_args = array(
        'post_type'      => 'photo',
        'posts_per_page' => 1,
        'orderby'        => 'rand', // Tri aléatoire
    );

    $hero_query = new WP_Query($hero_args);
    // Vérification si des photos sont disponibles
    if ($hero_query->have_posts()) {
        // Boucle à travers les photos
        while ($hero_query->have_posts()) {
            $hero_query->the_post();
            // Affichage de la vignette de la photo en taille complète
            echo get_the_post_thumbnail(null, 'full');
        }
        // Réinitialisation des données de publication après la boucle
        wp_reset_postdata();
    }
    ?>
</div>