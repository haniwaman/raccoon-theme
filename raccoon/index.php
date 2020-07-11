<?php
/**
 * Index
 */

get_header(); ?>

<?php get_template_part( 'template/main-visual/page' ); ?>
<div class="l-breadcrumb">
	<div class="l-inner l-breadcrumb__inner">
		<?php raccoon_breadcrumb(); ?>
	</div><!-- /l-inner -->
</div><!-- /l-breadcrumb -->


<div class="l-content">
<div class="l-inner l-content__inner">

<main id="a-main" class="l-primary">

	<?php
	if ( have_posts() ) :
		?>
	<div class="p-archive-header">
		<h1 class="p-archive-header__title"><?php the_archive_title(); ?></h1>
		<div class="p-archive-header__description"><?php the_archive_description(); ?></div>
		<div class="p-archive-header__form"><?php get_search_form(); ?></div>
	</div><!-- /p-archive-header -->

	<!-- p-entries -->
		<?php
		$entry_type_class = 'p-entries--square';
		if ( 'horizon' === get_theme_mod( 'raccoon_layout_archive_check' ) ) {
			$entry_type_class = 'p-entries--square';
		} elseif ( 'vertical' === get_theme_mod( 'raccoon_layout_archive_check' ) ) {
			$entry_type_class = 'p-entries--vertical';
		}

		?>
	<div class="p-entries <?php echo esc_attr( $entry_type_class ); ?>">
		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<?php get_template_part( 'template/content/archive' ); ?>

			<?php
		endwhile;
		?>
		</div><!-- /p-entries -->

		<?php if ( paginate_links() ) : ?>
		<div class="p-pagination">
			<?php
			echo wp_kses_post(
				paginate_links(
					array(
						'end_size'  => 0,
						'mid_size'  => 1,
						'prev_next' => true,
						'prev_text' => '<i class="fas fa-chevron-left"></i>',
						'next_text' => '<i class="fas fa-chevron-right"></i>',
					)
				)
			);
			?>
		</div><!-- /p-pagination -->
		<?php endif; ?>
		<?php endif; ?>
</main><!-- /l-primary -->

<?php get_sidebar(); ?>

</div><!-- /l-inner -->
</div><!-- /l-content -->


<?php get_footer(); ?>
