<?php 

function nathalie_mota_scripts() {
    // Chargement du thème
    wp_enqueue_style('nathalie-mota-style', get_template_directory_uri() . '/assets/css/theme.css', array(), 1.1);
    // Chargement du script de la modale
    wp_enqueue_script('modale', get_stylesheet_directory_uri() . '/assets/js/modale.js', array('jquery'), '1.0', time(), true);
    // Chargement du script des miniatures
    wp_enqueue_script('miniatures', get_stylesheet_directory_uri() . '/assets/js/miniatures.js', array('jquery'), '1.0', time(), true);
    // Chargement du script de la lightbox
    wp_enqueue_script('lightbox', get_stylesheet_directory_uri() . '/assets/js/lightbox.js', array('jquery'), '1.0', time(), true);
    // Chargement du script du menu burger
    wp_enqueue_script('burger', get_stylesheet_directory_uri() . '/assets/js/burger.js', array('jquery'), '1.0', time(), true);
}

add_action('wp_enqueue_scripts', 'nathalie_mota_scripts');

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

// Ajoutd de menu
add_theme_support('menus');

// Ajout du Custom Post Type "Photo"
function nathalie_mota_custom_post_types() {    
    $labels = array(    
        'menu_name'         => __('Photo'),    
        'name_admin_bar'    => __('Photo'),       
        'add_new_item'      => __('Ajouter une nouvelle photo'),       
        'new_item'          => __('Nouvelle photo'),       
        'edit_item'         => __('Modifier la photo'),    
    ); 
    
    $args = array(    
        'label'             => __('Photo'),    
        'description'       => __('Photos'),    
        'labels'            => $labels,    
        'supports'          => array('title', 'thumbnail', 'excerpt', 'editor'),    
        'hierarchical'      => false,    
        'public'            => true,    
        'show_ui'           => true,    
        'show_in_menu'      => true,    
        'menu_position'     => 5,    
        'show_in_admin_bar' => true,    
        'show_in_nav_menus' => true,    
        'can_export'        => true,    
        'has_archive'       => true,    
        'exclude_from_search'   => false,    
        'publicly_queryable' => true,    
        'capability_type'   => 'post',    
        'menu_icon'  => 'dashicons-camera',    
    ); 
    
    register_post_type('photo', $args);    
}

// Ajout des taxonomies "Catégorie" et "Format"
function nathalie_mota_taxonomies() {

    $labels = array(
     'name'             => __( 'Catégorie' ),
     'singular_name'    => __( 'Catégorie' ),
     'search_items'     => __( 'Rechercher une catégorie' ),
     'all_items'        => __( 'Toutes les catégories' ),
     'parent_item'      => __( 'Parent Catégorie' ),
     'parent_item_colon' => __( 'Parent Catégorie:' ),
     'edit_item'        => __( 'Modifier la catégorie' ),
     'add_new_item'     => __( 'Ajouter une nouvelle catégorie' ),
     'new_item_name'    => __( 'Nouvelle catégorie' ),
     'menu_name'        => __( 'Catégorie' )
    );

    $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'show_in_rest'      => true,
    'rewrite'           => array( 'slug' => 'categorie' )
    );

    register_taxonomy('categorie', array( 'photo' ), $args);

    $labels = array(
     'name'             => __( 'Format' ),
     'singular_name'    => __( 'Format' ),
     'search_items'     => __( 'Rechercher un format' ),
     'all_items'        => __( 'Tous les formats' ),
     'parent_item'      => __( 'Parent Format' ),
     'parent_item_colon' => __( 'Parent Format:' ),
     'edit_item'        => __( 'Modifier le format' ),
     'add_new_item'     => __( 'Ajouter un nouveau format' ),
     'new_item_name'    => __( 'Nouveau format' ),
     'menu_name'        => __( 'Format' )
    );

    $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'show_in_rest'      => true,
    'rewrite'           => array( 'slug' => 'format' )
    );

    register_taxonomy('format', array( 'photo' ), $args);
}

add_action('init', 'nathalie_mota_custom_post_types');
add_action('init', 'nathalie_mota_taxonomies');


// Gestion de la requête Ajax "Charger plus"
// Register the AJAX action for logged-in users
add_action('wp_ajax_load_more_photos', 'load_more_photos');
add_action('wp_ajax_load_more_photos_process', 'load_more_photos_process');

// Register the AJAX action for non-logged-in users
add_action('wp_ajax_nopriv_load_more_photos', 'load_more_photos');
add_action('wp_ajax_nopriv_load_more_photos_process', 'load_more_photos_process');

function load_more_photos() {
    echo (load_more_photos_process());
    exit;
}

function load_more_photos_process() {
    if(isset($_POST['photoArray'])) {
        $photoArray = $_POST['photoArray'];
    } else {
        $photoArray = null;
    }

    if(isset($_POST['source'])&& $_POST['source'] != "") {
        $source = $_POST['source'];
    } else {
        $source = null;
    }

        $tax_filter = array(
            'relation' => 'AND'
        );

if(isset($_POST['category']) && $_POST['category'] != "")  {
    $category = $_POST['category'];
    array_push($tax_filter, [
        'taxonomy' => 'categorie',
        'field' => 'slug',
        'terms' => $category,
    ]);
    } else {
    $category = null;
    }

    if(isset($_POST['format']) && $_POST['format'] != "") {
        $format = $_POST['format'];
        array_push($tax_filter, [
            'taxonomy' => 'format',
            'field' => 'slug',
            'terms' => $format,
        ]);
    } else {
        $format = null;
    }

    if(isset($_POST['year']) && $_POST['year'] != "") {
        $year = $_POST['year'];
    } else {
        $year = null;
    }

    
    $tax_query = is_null($category) && is_null($format) && is_null($year) ? '' :  [
        'tax_query' => 
            $tax_filter
        ];
    
    $photoArgs = array(
        'post_type'      => 'photo',
        'posts_per_page' => 8,
        'orderby'        => 'date',
        'order'          => 'ASC',
        'post_status'    => 'publish',
    );

    if(!(is_null($category) && is_null($format))) {
        $photoArgs['tax_query']= $tax_filter;
    }

    if(!(is_null($year))) {
        $photoArgs['order_by']= 'date';
        $photoArgs['order']= $year;
    }

    if($source==null) {
        $photoArgs['post__not_in']= $photoArray;
    } else if (!(is_null($year))){
        $photoArgs['posts_per_page']= -1;
        $photoArgs['post__in']= $photoArray;
    }

    error_log(print_r($photoArgs, true));
    
    $photo_block = new WP_Query($photoArgs);

    // Vérification s'il y a des photos
    if ($photo_block->have_posts()) :

        $photo_contents = "";
    
        // Définir les arguments pour le bloc photo
        // set_query_var('photo_block_args', array('context' => 'front-page'));
    
        // Boucle pour afficher chaque photo
        while ($photo_block->have_posts()) :
            $photo_block->the_post();
            include(get_template_directory() . '/template-parts/load.php');
            

            $photo_contents.=$photo_content;
        endwhile;
    
        // Réinitialisation de la requête
        wp_reset_postdata();


        return($photo_contents);

    else :
        return 'Aucune photo trouvée.';
    endif;
}

// Enqueue the script
add_action('wp_enqueue_scripts', 'enqueue_my_ajax_script');

function enqueue_my_ajax_script() {
    wp_enqueue_script('load-more', get_stylesheet_directory_uri() . '/assets/js/load-more.js', array('jquery'), '1.0', true);

    // Localize the script with new data
    wp_localize_script('load-more', 'MyAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
}

// Add shortcode to display the button and date
add_shortcode('my_ajax_button', 'display_my_ajax_button');

function display_my_ajax_button() {
    return  '<div id="load-moreContainer">'. load_more_photos_process() . '</div><button id="btnLoad-more">Charger Plus</button>';
}
