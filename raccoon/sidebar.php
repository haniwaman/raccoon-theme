<?php
/**
 * Sidebar
 *
 * @package Raccoon
 */

?>

<aside class="l-secondary">
<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
	<?php dynamic_sidebar( 'sidebar' ); ?>
<?php endif; ?>

<?php if ( is_active_sidebar( 'sidebar-fixed' ) ) : ?>
<div class="l-secondary__fixed">
	<?php dynamic_sidebar( 'sidebar-fixed' ); ?>
</div><!-- /l-secondary__fixed -->
<?php endif; ?>
</aside><!-- l-secondary -->

