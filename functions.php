<?php 

function nathalie_mota_scripts() {
	// Chargement du thème
    wp_enqueue_style('nathalie-mota-style', get_template_directory_uri() . '/assets/css/theme.css', array(), 1.0);
	// Chargement du script JS
    wp_enqueue_script('nathalie-mota-style', get_stylesheet_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0', time(), true);
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
   	 'name'          	=> __( 'Catégorie' ),
   	 'singular_name' 	=> __( 'Catégorie' ),
   	 'search_items'  	=> __( 'Rechercher une catégorie' ),
   	 'all_items'     	=> __( 'Toutes les catégories' ),
   	 'parent_item'   	=> __( 'Parent Catégorie' ),
   	 'parent_item_colon' => __( 'Parent Catégorie:' ),
   	 'edit_item'     	=> __( 'Modifier la catégorie' ),
   	 'add_new_item'  	=> __( 'Ajouter une nouvelle catégorie' ),
   	 'new_item_name' 	=> __( 'Nouvelle catégorie' ),
   	 'menu_name'     	=> __( 'Catégorie' )
    );

    $args = array(
   	'hierarchical'  	=> true,
   	'labels'        	=> $labels,
   	'show_ui'       	=> true,
   	'show_admin_column' => true,
    'query_var'     	=> true,
    'show_in_rest'  	=> true,
   	'rewrite'       	=> array( 'slug' => 'categorie' )
    );

    register_taxonomy('categorie', array( 'photo' ), $args);

    $labels = array(
   	 'name'          	=> __( 'Format' ),
   	 'singular_name' 	=> __( 'Format' ),
   	 'search_items'  	=> __( 'Rechercher un format' ),
   	 'all_items'     	=> __( 'Tous les formats' ),
   	 'parent_item'   	=> __( 'Parent Format' ),
   	 'parent_item_colon' => __( 'Parent Format:' ),
   	 'edit_item'     	=> __( 'Modifier le format' ),
   	 'add_new_item'  	=> __( 'Ajouter un nouveau format' ),
   	 'new_item_name' 	=> __( 'Nouveau format' ),
   	 'menu_name'     	=> __( 'Format' )
    );

    $args = array(
   	'hierarchical'  	=> true,
   	'labels'        	=> $labels,
   	'show_ui'       	=> true,
   	'show_admin_column' => true,
    'query_var'     	=> true,
    'show_in_rest'  	=> true,
   	'rewrite'       	=> array( 'slug' => 'format' )
    );

    register_taxonomy('format', array( 'photo' ), $args);
}

add_action('init', 'nathalie_mota_custom_post_types');
add_action('init', 'nathalie_mota_taxonomies');
