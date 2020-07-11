<?php
/**
 * Single Content
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

		<?php raccoon_the_post_tags(); ?>

		<?php
		$raccoon_tags_bottom_content = '';
		apply_filters( 'raccoon_single_tags_bottom', $raccoon_tags_bottom_content );
		?>

		<?php if ( get_theme_mod( 'raccoon_parts_relation_check' ) ) : ?>
			<?php get_template_part( 'parts/relation' ); ?>
		<?php endif; ?>

		<?php comments_template(); ?>

</article><!-- /p-page -->

		<?php
		$prev_post = get_previous_post();
		$next_post = get_next_post();
		?>
<nav class="p-page-pager">
		<?php if ( $next_post ) : ?>
	<div class="p-page-pager__next">
			<a href="<?php the_permalink( $next_post->ID ); ?>" class="p-page-pager__head"><?php esc_html_e( 'Next Post', 'raccoon' ); ?></a>
			<a href="<?php the_permalink( $next_post->ID ); ?>" class="p-pager-card p-pager-card--left">
				<div class="p-pager-card__img">
				<?php
				if ( has_post_thumbnail( $next_post->ID ) ) {
					echo get_the_post_thumbnail( $next_post->ID, 'thumbnail' );
				} else {
					echo '<img src="' . esc_url( get_template_directory_uri() ) . '/src/img/no-thumbnail.png">';
				}
				?>
				</div><!-- /p-pager-card__img -->
				<div class="p-pager-card__body">
					<div class="p-pager-card__title"><?php echo esc_html( mb_strimwidth( get_the_title( $next_post->ID ), 0, 64, '&hellip;', 'UTF-8' ) ); ?></div>
				</div><!-- /p-pager-card__body -->
			</a><!-- /p-pager-card -->
	</div><!-- /p-page-pager__next -->
			<?php endif; ?>
		<?php if ( $prev_post ) : ?>
	<div class="p-page-pager__prev">
		<a href="<?php the_permalink( $prev_post->ID ); ?>" class="p-page-pager__head"><?php esc_html_e( 'Prev Post', 'raccoon' ); ?></a>
		<a href="<?php the_permalink( $prev_post->ID ); ?>" class="p-pager-card p-pager-card--right">
			<div class="p-pager-card__img">
			<?php
			if ( has_post_thumbnail( $prev_post->ID ) ) {
				echo get_the_post_thumbnail( $prev_post->ID, 'thumbnail' );
			} else {
				echo '<img src="' . esc_url( get_template_directory_uri() ) . '/src/img/no-thumbnail.png">';
			}
			?>
			</div><!-- /p-pager-card__img -->
			<div class="p-pager-card__body">
				<div class="p-pager-card__title"><?php echo esc_html( mb_strimwidth( get_the_title( $prev_post->ID ), 0, 64, '&hellip;', 'UTF-8' ) ); ?></div>
			</div><!-- /p-pager-card__body -->
		</a><!-- /p-pager-card -->
	</div><!-- /p-page-pager__prev -->
			<?php endif; ?>
</nav><!-- /p-page-pager -->
