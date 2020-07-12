<?php
/**
 * Page
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


<div class="l-content">
<div class="l-inner l-content__inner">

<main id="a-main" class="l-primary">

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>

		<?php get_template_part( 'template/content/page' ); ?>

		<?php
endwhile;
endif;
?>

</main><!-- /l-primary -->


<?php get_sidebar(); ?>


</div><!-- /l-inner -->
</div><!-- /l-content -->


<?php get_footer(); ?>
