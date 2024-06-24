<?php get_header(); ?>

<?php
$photo = get_the_post_thumbnail(null, 'full');
$title = get_the_title();
$reference = get_field('reference');
$type = get_field('type');
$categories = get_the_terms( $post->ID, 'categorie' );
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
    <div class="photo-container">
        <div class="photo-contenu">
            <div class="bloc-infos">
				<h2 class="title-infos"><?php echo esc_html($title) ?></h2>
				<p class="txt-infos">Référence : <?php echo $reference; ?></p>
				<p class="txt-infos">Catégorie : <?php foreach( $categories as $category ) {
					echo $category->name;
					} ?>
				</p>
				<p class="txt-infos">Format : <?php foreach( $formats as $format ) {
					echo $format->name;
					} 
				?></p>
				<p class="txt-infos">Type : <?php echo $type; ?></p>
				<p class="txt-infos">Année : <?php echo get_the_date(); ?></p>
            </div>

            <div class="bloc-photo">
				<?php echo $photo; ?>
            </div>
        </div>
    </div>

    <div class="contact-container">
        <div class="contact-ref">
            <p class="interested">Cette photo vous intéresse ?</p>
            <button id="contact-ref" data-ref="<?php echo $reference; ?>">Contactez-moi</button>
        </div>
        <div class="preview">
            <div class="miniature" id="miniature"></div>
            <div class="arrows">
                <?php if (!empty($previous_post)) : ?>
                    <img class="arrow arrow_left" src="<?php echo get_theme_file_uri() . '/assets/img/left_arrow.png'; ?>" 
                    alt="Photo précédente" data-thumbnail-url="<?php echo $previous_img; ?>" 
                    data-target-url="<?php echo esc_url(get_permalink($previous_post->ID)); ?>">
                <?php endif; ?>
                <?php if (!empty($next_post)) : ?>
                    <img class="arrow arrow_right" src="<?php echo get_theme_file_uri() . '/assets/img/right_arrow.png'; ?>" 
                    alt="Photo suivante" data-thumbnail-url="<?php echo $next_img; ?>" 
                    data-target-url="<?php echo esc_url(get_permalink($next_post->ID)); ?>">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="suggestions">
    <h3 class="title-suggestions">Vous aimerez aussi</h3>
    <div class="suggestions-pics">
        
    </div>
</section>


<?php get_footer(); ?>