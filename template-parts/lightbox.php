<?php
// Récupère l'image de la photo
$photo = get_the_post_thumbnail_url(null, 'full');
?>

<div class="lightboxContainer">
    <!-- Conteneur principal de la lightbox -->
    <div id="lightboxWrapper" class="lightboxWrapper">
        <!-- Div pour le contenu de la lightbox -->
        <div class="lightboxContent">
            
            <!-- Croix pour fermer la lightbox -->
            <img class="closeLightbox" src="<?php echo get_stylesheet_directory_uri() . '/assets/img/white_cross.png'; ?>" alt="fermeture de la lightbox">
            
            <!-- Div pour afficher la photo -->
            <div class="lightboxImageContainer">
                <img src="<?php echo $photo; ?>" class="lightboxImage" alt="">
            </div>

            <!-- Flèche pour la navigation vers la photo précédente -->
            <span><img class="lightboxPrevious" src="<?php echo get_stylesheet_directory_uri() . '/assets/img/previous.png'; ?>" alt="navigation précedente"></span>
            
            <!-- Flèche pour la navigation vers la photo suivante -->
            <span><img class="lightboxNext" src="<?php echo get_stylesheet_directory_uri() . '/assets/img/next.png'; ?>" alt="navigation suivante"></span>

            <!-- Section pour afficher la référence de la photo -->
            <span class="lightboxReference"></span>

            <!-- Section pour afficher la catégorie de la photo -->
            <span class="lightboxCategory"></span>
        </div>
    </div>
</div>