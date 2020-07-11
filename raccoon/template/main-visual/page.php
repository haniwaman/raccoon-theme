<?php
/**
 * Main Visual
 */

?>

<?php if ( get_header_image() ) : ?>

<div class="p-main-visual p-main-visual--page">
	<?php if ( get_header_image() ) : ?>
	<img src="<?php echo esc_url( get_header_image() ); ?>" alt="">
<?php endif; ?>

</div><!-- /p-main-visual -->
<?php endif ?>
