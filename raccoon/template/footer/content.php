<?php
/**
 * Footer Content
 *
 * @package Raccoon
 */

?>

<footer class="l-footer p-footer">

<div class="l-footer__copy">
<div class="l-inner">
	<div class="p-footer__copy"><?php esc_html_e( 'Copyright', 'raccoon' ); ?><span>&copy;</span><?php echo date_i18n( __( 'Y', 'raccoon' ) ); ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a><?php esc_html_e( 'All Rights Reserved.', 'raccoon' ); ?></div><!-- /p-footer__copy -->
</div><!-- /l-inner -->
</div><!-- /l-footer__copy -->

</footer><!-- /l-footer -->

<div class="p-floating"><a href="#a-top"><span></span></a></div><!-- /p-floating -->
