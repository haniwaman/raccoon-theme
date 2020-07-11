<?php
/**
 * Export Customize CSS
 */

echo '<style>';

if ( get_theme_mod( 'raccoon_performance_inline_check' ) ) {
	/* First View */
	load_template( get_template_directory() . '/src/css/header.min.css' );
}

/* Header Text Color */
if ( get_header_textcolor() ) {
	echo '.p-header-nav li > a{color:' . esc_attr( '#' . get_header_textcolor() ) . ';}';
}

/* Layout */
if ( get_theme_mod( 'raccoon_layout_all_radio' ) ) {
	switch ( get_theme_mod( 'raccoon_layout_all_radio' ) ) {
		case 'one':
			echo '.l-primary{width:100%;margin-bottom:32px;}';
			echo '.l-secondary{width:100%;}';
			break;
		case 'two-right':
			echo '.l-primary{order:1}';
			echo '.l-secondary{margin-left:auto;margin-right:0;order:2}';
			break;
		case 'two-left':
			echo '.l-primary{order:2}';
			echo '.l-secondary{margin-left:0;margin-right:auto;order:1}';
			break;
	}
}

echo '</style>';
