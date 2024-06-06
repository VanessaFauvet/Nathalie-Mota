<div id="modale" class="popup-overlay">
    <div class="popup-contact">
        <div class="popup-header">
            <img src="<?php echo get_theme_file_uri("assets/img/Contact-header.png"). ''; ?>" alt="" class="popup-img">
        </div>
        <div class="popup-details">
            <?php
            // On insère le formulaire CF7
            echo do_shortcode('[contact-form-7 id="d4e6d95" title="Modale contact"]');
            ?>
        </div>
    </div>
</div>