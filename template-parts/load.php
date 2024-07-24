<?php
global $post;
// Récupère l'image de la photo
$photo = get_the_post_thumbnail_url(null, 'full');
// Récupère le titre de la photo
$title = get_the_title();
// Récupérer l'URL du post
$post_url = get_permalink();
// Récupère la référence de la photo
$reference = get_field('reference');
// Récupère la taxonomie "Catégorie"
$categories = get_the_terms( $post->ID, 'categorie' );
// Utilisation du nom de la catégorie si elle est trouvée
$categorie_name = $categories[0]->name;
$icon_eye = get_theme_file_uri() . '/assets/img/Icon_eye.png';
$icon_fullscreen = get_theme_file_uri() . '/assets/img/Icon_fullscreen.png';
$photo_id = get_the_ID();

$photo_content=<<<EOD

<div data-photo-id="$photo_id" class="photo_block">
    <!-- Affiche l'image avec son URL et un texte alternatif -->
    <img src="$photo">
    
    <div class="photo_overlay">
        <!-- Affiche le titre de la photo -->
        <h2>$title</h2>
        <!-- Affiche la catégorie -->
        <h3>$categorie_name</h3>
        <!-- Affiche l'icône pour le détail de la photo -->
        <div class="eye">
            <a href="$post_url">
                <img src="$icon_eye" alt="Icone Eye">
            </a>
        </div>
        <!-- Affichage icône fullscreen -->
        <div class="fullscreen" data-full="$photo" data-category="$categorie_name" data-reference="$reference">
            <img src="$icon_fullscreen" alt="Icone fullscreen">
        </div>
    </div>
</div>

EOD;