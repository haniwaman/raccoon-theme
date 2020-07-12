<?php
/**
 * Single Content
 *
 * @package Raccoon
 */

?>

<article <?php post_class( array( 'l-page', 'p-page' ) ); ?>>

	<div class="l-page__header">
		<div class="p-page-header">
			<h1 class="p-page-header__title"><?php the_title(); ?></h1><!-- /p-page-header__title -->
			<div class="p-page-header__meta">
				<div class="p-page-header__label"><?php raccoon_the_post_category(); ?></div><!-- /p-page-header__label -->
				<time class="p-page-header__published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
			</div><!-- /p-page-header__meta -->
			<?php
			$raccoon_meta_bottom_content = '';
			apply_filters( 'raccoon_single_meta_bottom', $raccoon_meta_bottom_content );
			?>
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
				'before'         => '<nav class="p-page-links l-page__links">',
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

	<div class="l-page__tags">
		<?php raccoon_the_post_tags(); ?>
	</div><!-- /.l-page__tags -->

	<?php
	$raccoon_tags_bottom_content = '';
	apply_filters( 'raccoon_single_tags_bottom', $raccoon_tags_bottom_content );
	?>

	<?php if ( get_theme_mod( 'raccoon_parts_relation_check' ) ) : ?>
		<div class="l-page__relation">
			<?php get_template_part( 'parts/relation' ); ?>
		</div><!-- /.l-page__relation -->
	<?php endif; ?>

	<?php comments_template(); ?>

</article><!-- /p-page -->
