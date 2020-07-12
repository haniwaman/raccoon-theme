<?php
/**
 * Export Customize CSS
 *
 * @package Raccoon
 */

echo '<style>';

if ( get_theme_mod( 'raccoon_performance_inline_check' ) ) {
	/* First View */
	load_template( get_template_directory() . '/src/css/header.min.css' );
}

/* Site Key Color */
if ( get_theme_mod( 'raccoon_colors_site' ) ) {
	echo '.p-main-visual{background-color:' . esc_attr( get_theme_mod( 'raccoon_colors_site' ) ) . ';}';
	echo '.p-widget__title{background-color:' . esc_attr( get_theme_mod( 'raccoon_colors_site' ) ) . ';}';
	echo '.rc-heading01 h2{background-color:' . esc_attr( get_theme_mod( 'raccoon_colors_site' ) ) . ';}';
	echo '.rc-heading01 h3,.rc-heading01 h4{border-color:' . esc_attr( get_theme_mod( 'raccoon_colors_site' ) ) . ';}';
	echo '.rc-heading01 h5,.rc-heading01 h6{color:' . esc_attr( get_theme_mod( 'raccoon_colors_site' ) ) . ';}';
	echo '#toc_container .toc_title{background-color:' . esc_attr( get_theme_mod( 'raccoon_colors_site' ) ) . ';}';
	echo '#toc_container{border-color:' . esc_attr( get_theme_mod( 'raccoon_colors_site' ) ) . ';}';
	echo '.p-header-nav .sub-menu li a{background-color:' . esc_attr( get_theme_mod( 'raccoon_colors_site' ) ) . ';}';
	echo '.p-pagination .page-numbers.current,.p-pagination a:hover,.p-pagination .next:hover,.p-pagination .prev:hover{background-color:' . esc_attr( get_theme_mod( 'raccoon_colors_site' ) ) . ';border-color:' . esc_attr( get_theme_mod( 'raccoon_colors_site' ) ) . ';}';
	echo '.p-page-links .post-page-numbers.current, .p-page-links a:hover{background-color:' . esc_attr( get_theme_mod( 'raccoon_colors_site' ) ) . ';border-color:' . esc_attr( get_theme_mod( 'raccoon_colors_site' ) ) . ';}';
}

/* Site Accent Color */
if ( get_theme_mod( 'raccoon_colors_accent' ) ) {
	echo '.p-header-nav > ul > li.m--button > a{background-color:' . esc_attr( get_theme_mod( 'raccoon_colors_accent' ) ) . ';}';
	echo '.p-search-form .search-submit{background-color:' . esc_attr( get_theme_mod( 'raccoon_colors_accent' ) ) . ';}';
	echo '.c-button,[type=submit],[type=button],.post_password .post_password-submit{background-color:' . esc_attr( get_theme_mod( 'raccoon_colors_accent' ) ) . ';}';
	echo '.p-floating a{background-color:' . esc_attr( get_theme_mod( 'raccoon_colors_accent' ) ) . ';}';
}

/* Site Text Color */
if ( get_theme_mod( 'raccoon_colors_site_text' ) ) {
	echo 'body{color:' . esc_attr( get_theme_mod( 'raccoon_colors_site_text' ) ) . ';}';
}

/* Header Text Color */
if ( get_header_textcolor() ) {
	echo '.p-header-nav li > a{color:' . esc_attr( '#' . get_header_textcolor() ) . ';}';
}

/* Footer Background Color */
if ( get_theme_mod( 'raccoon_colors_footer_background' ) ) {
	echo esc_attr( '.p-footer{background:' . get_theme_mod( 'raccoon_colors_footer_background' ) . ';}' );
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
