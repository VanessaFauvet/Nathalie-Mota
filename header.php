<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Nathalie Mota</title>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <nav>
            <div class="logo">
                <a href="<?php echo home_url( '/' ); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="Logo">
                </a>
            </div>
        </nav>

        <div class="burger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
            
        <div class="main-nav">
            <?php wp_nav_menu(array(
                'theme_location' => 'main',
                'container' => 'ul', // afin d'éviter d'avoir une div autour
                )); 
            ?>
        </div>
    </header>