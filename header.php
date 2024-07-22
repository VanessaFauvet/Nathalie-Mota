<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Nathalie Mota</title>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header id="main-menu">
        <a href="<?php echo home_url( '/' ); ?>">
            <img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="Logo">
        </a>
            <?php wp_nav_menu(array(
                'theme_location' => 'main',
                'container' => 'ul', // afin d'éviter d'avoir une div autour
                )); 
            ?>
        
        <!-- Menu mobile -->
        <!-- <div class="hamburger-icon">
            <img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/Burger_open.png" alt="Icone burger">
        </div>
        <div class="cross-icon">
            <img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/Burger_close.png" alt="Icone croix">
        </div> -->
    </header>