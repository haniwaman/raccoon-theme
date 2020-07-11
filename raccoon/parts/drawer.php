<?php
/**
 * Drawer
 */

?>

<!-- c-drawer -->
<div class="c-drawer">
	<button class="c-drawer__icon js-drawer for-drawer01" data-target="for-drawer01">
		<div class="c-drawer__bars">
				<span class="c-drawer__bar"></span>
				<span class="c-drawer__bar"></span>
				<span class="c-drawer__bar"></span>
		</div><!-- /c-drawer__bars -->
	</button><!-- /c-drawer__icon -->
	<div class="c-drawer__close for-drawer01" data-target="for-drawer01"></div>
	<div class="c-drawer__content for-drawer01 c-drawer__content--left">
	<?php if ( is_active_sidebar( 'spmenu' ) ) : ?>
		<div class="p-drawer-widget">
			<?php dynamic_sidebar( 'spmenu' ); ?>
		</div><!-- /p-drawer-widget -->
	<?php else : ?>
		<?php if ( has_nav_menu( 'header' ) ) : ?>
			<?php
			wp_nav_menu(
				array(
					'container'       => false,
					'depth'           => 1,
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
					'depth'           => 1,
					'container'       => 'nav',
					'container_class' => 'p-drawer-nav',
				)
			);
			?>
<?php endif; ?>
	<?php endif; ?>
	</div><!-- /c-drawer__content -->
</div><!-- /c-drawer -->
