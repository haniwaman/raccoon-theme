<?php
/**
 * Drawer
 *
 * @package Raccoon
 */

?>

<div class="c-drawer">
	<div class="c-drawer__close for-drawer01 js-drawer" data-target="for-drawer01"></div>
	<div class="c-drawer__content for-drawer01 c-drawer__content--left">
	<?php if ( is_active_sidebar( 'sp-menu' ) ) : ?>
		<div class="p-drawer-widget">
			<?php dynamic_sidebar( 'sp-menu' ); ?>
		</div><!-- /p-drawer-widget -->
	<?php else : ?>
		<?php if ( has_nav_menu( 'header' ) ) : ?>
			<?php
			wp_nav_menu(
				array(
					'container'       => false,
					'depth'           => 2,
					'theme_location'  => 'header',
					'container'       => 'nav',
					'container_class' => 'p-drawer-nav',
				)
			);
			?>
		<?php else : ?>
			<?php
			wp_nav_menu(
				array(
					'container'       => false,
					'depth'           => 2,
					'container'       => 'nav',
					'container_class' => 'p-drawer-nav',
				)
			);
			?>
<?php endif; ?>
	<?php endif; ?>
	</div><!-- /c-drawer__content -->
</div><!-- /c-drawer -->
