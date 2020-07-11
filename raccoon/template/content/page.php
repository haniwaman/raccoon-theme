<?php
/**
 * Page Content
 */

?>

<article <?php post_class( array( 'l-page', 'p-page' ) ); ?>>

	<div class="l-page__header">
		<div class="p-page-header">
			<h1 class="p-page-header__title"><?php the_title(); ?></h1><!-- /p-page-header__title -->
			<figure class="p-page-header__img">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'raccoon_thumbnail' );
			}
			?>
			</figure><!-- /p-page-header__img -->
		</div><!-- /p-page-header -->
	</div><!-- /l-page__header -->

	<?php $rc_heading = get_theme_mod( 'raccoon_parts_heading_select' ) ? 'rc-' . get_theme_mod( 'raccoon_parts_heading_select' ) : ''; ?>
	<div class="l-page__body">
		<div class="p-page-content <?php echo esc_attr( $rc_heading ); ?>">
		<?php the_content(); ?>
		<?php
		wp_link_pages(
			array(
				'before'         => '<nav class="p-page-links">',
				'after'          => '</nav>',
				'link_before'    => '',
				'link_after'     => '',
				'next_or_number' => 'number',
				'separator'      => '',
			)
		);
		?>
		</div><!-- /p-page-content -->
	</div><!-- /l-page__body -->

	<?php comments_template(); ?>

</article><!-- /p-page -->
