<div id="modale" class="popup-overlay">
	<div class="popup-contact">
		<div class="popup-header">
                  <img class="popup-img" src="<?php echo get_theme_file_uri("/assets/images/contact_header.png") . ''; ?>">
		</div>
		<div class="popup-details">
            <?php
            // On insère le formulaire de contact
            echo do_shortcode('[contact-form-7 id="d4e6d95" title="Modale contact"]');
            ?>
	</div>
</div>