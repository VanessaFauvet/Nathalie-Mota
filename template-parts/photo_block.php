<?php
// Récupère l'image de la photo
$photo = get_the_post_thumbnail(null, 'full');
// Récupère le titre de la photo
$title = get_the_title();
// Récupère la référence de la photo
$reference = get_field('reference');
// Récupère le champs personnalisé "type"
$type = get_field('type');
// Récupère la taxonomie "Catégorie"
$categories = get_the_terms( $post->ID, 'categorie' );
// Récupère la taxonomie "Format"
$formats = get_the_terms( $post->ID, 'format' );
?>