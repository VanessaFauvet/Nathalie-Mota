<?php get_header(); ?>

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

if(get_previous_post()!==null && get_previous_post()!=='') {
    $previous_post = get_previous_post();
} else {
    $args = array(
        'numberposts'      => 1,
        'category'         => 0,
        'orderby'          => 'date',
        'order'            => 'DESC',
        'include'          => array(),
        'exclude'          => array(),
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'photo',
        'suppress_filters' => true,
    );

    $previous_post = get_posts($args)[0];
}

$previous_id = $previous_post->ID;
$previous_img = get_the_post_thumbnail_url($previous_post, 'post_thumbnail');
$previous_link = get_permalink($previous_post);

if(get_next_post()!==null && get_next_post()!=='') {
    $next_post = get_next_post();
} else {
    $args = array(
        'numberposts'      => 1,
        'category'         => 0,
        'orderby'          => 'date',
        'order'            => 'ASC',
        'include'          => array(),
        'exclude'          => array(),
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'photo',
        'suppress_filters' => true,
    );

    $next_post = get_posts($args)[0];
}

$next_id = $next_post->ID;
$next_img = get_the_post_thumbnail_url($next_post, 'post_thumbnail');
$next_link = get_permalink($next_post);
?>

<section class="page-photo">
    <div class="photo-contenu">
        <div class="bloc-photo">
            <?php echo $photo; ?>
        </div>

        <div class="bloc-infos">
            <h2 class="title-infos"><?php echo esc_html($title); ?></h2>
            <p class="txt-infos">Référence : <?php echo $reference; ?></p>
            <p class="txt-infos">Catégorie : <?php foreach( $categories as $category ) {
                echo $category->name;
                } ?>
            </p>
            <p class="txt-infos">Format : <?php foreach( $formats as $format ) {
                echo $format->name;
                } ?>
            </p>
            <p class="txt-infos">Type : <?php echo $type; ?></p>
            <p class="txt-infos">Année : <?php echo get_the_date(); ?></p>
        </div>
    </div>

    <div class="contact-container">
        <div class="contact-ref">
            <p class="interested">Cette photo vous intéresse ?</p>
            <button id="ref-btn" data-ref="<?php echo $reference; ?>">Contact</button>
        </div>

        <div class="navigationPhoto">
            <div class="miniaturePhoto" id="miniaturePhoto"></div>
            <div class="arrowNav">
                <?php if (!empty($previous_id)) : ?>
                    <img class="arrow arrow-left" src="<?php echo get_theme_file_uri() . '/assets/img/left_arrow.png'; ?>" alt="Photo précédente" data-thumbnail-url="<?php echo $previous_img; ?>" data-target-url="<?php echo esc_url(get_permalink($previous_post->ID)); ?>">
                <?php endif; ?>

                <?php if (!empty($previous_id)) : ?>
                    <img class="arrow arrow-right" src="<?php echo get_theme_file_uri() . '/assets/img/right_arrow.png'; ?>" alt="Photo précédente" data-thumbnail-url="<?php echo $next_img; ?>" data-target-url="<?php echo esc_url(get_permalink($next_post->ID)); ?>">
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="suggestions">
        <div class="title-suggestion">
            <h3>Vous aimerez aussi</h3>
        </div>

        <div class="suggestions-pics">
        <?php
            $categorie = get_the_terms(get_the_ID(), 'categories');
            $args = array(
                'post_type' => 'photo',
                'posts_per_page' => 2,
                'post__not_in' => array(get_the_ID()),
                'orderby' => 'rand',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categorie',
                        'field' => 'id',
                        'terms' => $categories ? wp_list_pluck($categories, 'term_id') : array(),
                    ),
                ),
            );
            
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    get_template_part('/template-parts/photo_block');
                endwhile;
            else :
                echo '<p class="photoNotFound">Pas de photo similaire trouvée dans cette catégorie.</p>';
            endif;
            wp_reset_postdata();
            ?>      
        </div>
    </div>
</section>

<?php get_footer(); ?>