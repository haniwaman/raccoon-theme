<?php
/**
 * Comment
 */

if ( post_password_required() || ! comments_open() ) {
	return;
}
?>

<!-- p-comments -->
<div class="p-comments">
	<?php if ( have_comments() ) : ?>
	<div class="p-comments__title"><?php esc_html_e( 'Comments', 'raccoon' ); ?> (<?php echo esc_html( get_comments_number() ); ?>)</div><!-- /p-comments__title -->
	<div class="p-comments__list">
		<ul class="p-comments-list">
			<?php
			wp_list_comments(
				array(
					'avatar_size' => '54',
					'type'        => 'all', /* all / comment / trackback / pingback / pings */
				)
			);
			?>
		</ul><!-- /p-comments-list -->
	</div><!-- /p-comments__list -->
	<?php endif; ?>

	<?php if ( get_comment_pages_count() > 1 ) : ?>
	<div class="p-comments__nav">
		<nav class="p-comments-nav">
			<ul>
				<li class="p-comments-nav__prev"><?php previous_comments_link( esc_html__( 'Prev Comments', 'raccoon' ) ); ?></li><!-- /p-comments-nav__prev -->
				<li class="p-comments-nav__next"><?php next_comments_link( esc_html__( 'Next Comments', 'raccoon' ) ); ?></li><!-- /p-comments-nav__next -->
			</ul>
		</nav><!-- /p-comments-nav -->
	</div><!-- /p-comments__nav -->
	<?php endif; ?>

	<div class="p-comments__form"><?php comment_form(); ?></div><!-- /p-comments__form -->
</div><!-- /p-comments -->
