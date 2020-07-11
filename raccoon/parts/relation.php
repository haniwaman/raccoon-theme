<?php
/**
 * Relation
 */

?>

<?php if ( 'post' === get_post_type() ) : ?>
<!-- p-relation -->
<div class="p-relation">
	<div class="p-relation__head"><?php esc_html_e( 'Relation Posts', 'raccoon' ); ?></div><!-- /p-relation__head -->

	<?php
	$raccoon_relation_query = new WP_Query(
		array(
			'post_type'      => 'post',
			'posts_per_page' => 8,
			'cat'            => get_the_category()[0]->term_id,
			'post__not_in'   => array( get_the_ID() ),
		)
	);
	?>

	<?php if ( $raccoon_relation_query->have_posts() ) : ?>
<div class="p-relation__entries">
		<?php while ( $raccoon_relation_query->have_posts() ) : ?>
			<?php $raccoon_relation_query->the_post(); ?>

<div <?php post_class( array( 'p-relation__entry', 'p-relation-entry' ) ); ?>>

<div class="p-relation-entry__img">
	<div class="p-relation-entry__img-cover">
		<a href="<?php the_permalink(); ?>">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'raccoon_thumbnail' );
				} else {
					echo '<img src="' . esc_url( get_template_directory_uri() ) . '/src/img/no-img.png" alt="">';
				}
				?>
		</a>
	</div><!-- /p-relation-entry__img-cover -->
</div><!-- /p-relation-entry__img -->

<div class="p-relation-entry__body">
	<div class="p-relation-entry__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div><!-- /p-relation-entry__title -->
</div><!-- /p-relation-entry__body -->

</div><!-- /p-relation-entry__item -->
	<?php endwhile; ?>
<div class="p-relation__btn">
<a class="c-button" href="<?php echo esc_url( get_category_link( get_the_category()[0]->cat_ID ) ); ?>"><?php esc_html_e( 'More Relation Posts', 'raccoon' ); ?></a>
</div><!-- /p-relation__btn -->
</div><!-- /p-relation__entries -->
	<?php else: ?>
			<p class="p-relation__no-entry">関連記事はありません。</p>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>

</div><!-- /p-relation -->
<?php endif; ?>
