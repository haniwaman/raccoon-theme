<?php
/**
 * Archive Content
 */

?>

<div <?php post_class( array( 'p-entry' ) ); ?>>

	<div class="p-entry__img">
		<div class="p-entry__img-cover">
			<a href="<?php the_permalink(); ?>">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'raccoon_thumbnail' );
				} else {
					echo '<img src="' . esc_url( get_template_directory_uri() ) . '/src/img/no-img.png" alt="">';
				}
				?>
			</a>
		</div><!-- /p-entry__img-cover -->
	</div><!-- /p-entry__img -->

	<div class="p-entry__body">
		<div class="p-entry__meta">
			<div class="p-entry__label"><?php raccoon_the_post_category(); ?></div><!-- /p-entry__label -->
			<time class="p-entry__published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time><!-- /p-entry__published -->
		</div><!-- /p-entry__meta -->
		<h2 class="p-entry__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><!-- /p-entry__title -->
		<div class="p-entry__excerpt"><?php the_excerpt(); ?></div><!-- /p-entry__excerpt -->
		<div class="p-entry__author">
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), 30 ); ?>
				<?php the_author_meta( 'display_name' ); ?>
			</a>
		</div><!-- /p-entry__author -->
	</div><!-- /p-entry__body -->

</div><!-- /p-entry -->
