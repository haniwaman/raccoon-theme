<?php
/**
 * Header Content
 */

?>

<a class="skip-link screen-reader-text" href="#a-main"><?php esc_html_e( 'Skip to content', 'raccoon' ); ?></a>

<header class="l-header p-header">
<div class="l-inner l-header__inner">

<?php
$raccoon_logo_tag = is_front_page() ? 'h1' : 'div';
?>

<div class="l-header__logo">
<<?php echo esc_attr( $raccoon_logo_tag ); ?> class="p-header-logo">
<?php if ( has_custom_logo() ) : ?>
	<?php the_custom_logo(); ?>
<?php else : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( apply_filters( 'raccoon_logo', get_bloginfo( 'name' ) ) ); ?></a>
<?php endif; ?>
</<?php echo esc_attr( $raccoon_logo_tag ); ?>><!-- /p-header-logo -->
</div><!-- /l-header__logo -->

<div class="l-header__global">
<?php if ( has_nav_menu( 'header' ) ) : ?>
	<?php
	wp_nav_menu(
		array(
			'container'       => false,
			'depth'           => 1,
			'theme_location'  => 'header',
			'container'       => 'nav',
			'container_class' => 'p-header-nav',
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
			'container_class' => 'p-header-nav',
		)
	);
	?>
<?php endif; ?>
</div><!-- /l-header__global -->

<div class="l-header__drawer">
<?php get_template_part( 'parts/drawer' ); ?>
</div><!-- /l-header__drawer -->

</div><!-- /l-inner -->
</header><!-- /p-header -->
