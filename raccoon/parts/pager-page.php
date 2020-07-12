<?php
/**
 * Pager Page
 *
 * @package Raccoon
 */

?>

<?php
	$prev_post = get_previous_post();
	$next_post = get_next_post();
?>
<nav class="p-page-pager l-primary__footer">
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
