<?php get_header(); ?>

<?php
$photo = get_the_post_thumbnail(null, 'full');
$title = get_the_title();
$reference = get_field('reference');
$type = get_field('type');
?>

<section class="photo-contenu">
	<div class="bloc-infos">
		<h2><?php echo esc_html($title) ?></h2>
		<?php echo $photo; ?>
		<?php echo $reference; ?>
		<?php echo $type; ?>
		<?php echo get_the_date(); ?>
	</div>

	<div class="bloc-photo">

	</div>

	<div class="bloc-interaction">
		<button id="contact-ref" data-ref="<?php echo $reference; ?>">
			Contactez-moi
		</button>
	</div>
</section>

<?php get_footer(); ?>