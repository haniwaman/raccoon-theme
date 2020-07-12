<?php
/**
 * 404
 *
 * @package Raccoon
 */

get_header(); ?>

<?php get_template_part( 'template/main-visual/page' ); ?>
<div class="l-breadcrumb">
	<div class="l-inner l-breadcrumb__inner">
		<?php raccoon_breadcrumb(); ?>
	</div><!-- /l-inner -->
</div><!-- /l-breadcrumb -->

<!-- l-content -->
<div class="l-content">
<div class="l-inner l-content__inner">

<!-- l-primary -->
<main id="a-main" class="l-primary">

<!-- p-archive-header -->
<div class="p-archive-header l-primary__header">
	<h1 class="p-archive-header__title">404</h1>
	<div class="p-archive-header__description"><p><?php esc_html_e( 'Contents is not found.', 'raccoon' ); ?></p></div>
	<div class="p-archive-header__form"><?php get_search_form(); ?></div>
</div><!-- /p-archive-header -->

<article <?php post_class( array( 'p-not-found', 'l-primary__body' ) ); ?>>

	<div class="p-not-found__body">
		<p><?php esc_html_e( 'Sorry. Contents is not found.', 'raccoon' ); ?></p>
	</div><!-- /p-not-found__body -->
	<div class="p-not-found__link"><a class="c-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to Home', 'raccoon' ); ?></a></div>

</article><!-- /p-not-found -->

</main><!-- /l-primary -->


<?php get_sidebar(); ?>

</div><!-- /l-inner -->
</div><!-- /l-content -->



<?php get_footer(); ?>
