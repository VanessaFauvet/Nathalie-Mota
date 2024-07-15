<?php get_header(); ?>

<?php
// Récupère l'image de la photo
$photo = get_the_post_thumbnail(null, 'full');
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
?>

<div class="bloc_photo">
    <!-- Affiche l'image avec son URL et un texte alternatif -->
    <img src="<?php echo $photo; ?>" alt="<?php the_title_attribute(); ?>">
    
    <div class="similar_overlay">
        <!-- Affiche le titre de la photo -->
        <h2><?php echo esc_html($title); ?></h2>
        <!-- Affiche la catégorie -->
        <h3><?php echo esc_html($categorie_name); ?></h3>
        <!-- Affiche l'icône pour le détail de la photo -->
        <div class="eye">
            <a href="<?php echo esc_url($post_url); ?>">
                <img src="<?php echo get_theme_file_uri() . '/assets/img/Icon_eye.png'; ?>" alt="Icone Eye">
            </a>
        </div>
        <!-- Affichage icône fullscreen -->
        <div class="fullscreen" data-full="<?php echo esc_attr($photo); ?>" data-category="<?php echo esc_attr($categorie_name); ?>" data-reference="<?php echo esc_attr($reference); ?>">
            <img src="<?php echo get_theme_file_uri() . '/assets/img/Icon_fullscreen.png'; ?> alt="Icone fullscreen">
        </div>
    </div>
</div>

<?php get_footer(); ?>