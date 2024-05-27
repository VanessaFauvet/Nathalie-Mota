<?php 

function nathalie_mota_scripts() {
	// Chargement du thème
    wp_enqueue_style('nathalie-mota-style', get_template_directory_uri() . '/assets/css/theme.css', array(), 1.0);
	// Chargement du script JS
    wp_enqueue_script('nathalie-mota-style', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), '1.0', time(), true);
}

add_action('wp_enqueue_scripts', 'nathalie_mota_scripts');

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );