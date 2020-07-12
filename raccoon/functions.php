<?php
/**
 * Functions
 *
 * @package Raccoon
 */

/**
 * WordPress Init
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
function raccoon_setup() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
	add_theme_support( 'editor-styles' );
	add_theme_support(
		'custom-logo',
		array(
			'width'       => 400,
			'height'      => 160,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	add_theme_support(
		'custom-header',
		array(
			'width'       => 1920,
			'height'      => 700,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	add_theme_support( 'custom-background' );
	if ( ! isset( $content_width ) ) {
		$content_width = 840;
	}
	load_theme_textdomain( 'raccoon', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'raccoon_setup' );



/**
 * Load CSS and JavaScript
 *
 * @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
 */
function raccoon_script() {

	/* Library */
	wp_enqueue_style( 'raccoon_font-awesome', get_template_directory_uri() . '/src/lib/font-awesome/css/all.min.css', array(), '5.13.1', 'all' );
	wp_enqueue_script( 'raccoon_object-fit', get_template_directory_uri() . '/src/lib/object-fit-images/ofi.min.js', array(), '3.2.4', true );

	/* CSS */
	if ( ! get_theme_mod( 'raccoon_performance_inline_check' ) ) {
		wp_enqueue_style( 'raccoon_header', get_template_directory_uri() . '/src/css/header.min.css', array(), '1.3', 'all' );
	}
	wp_enqueue_style( 'raccoon_main', get_template_directory_uri() . '/src/css/style.css', array(), '1.3', 'all' );
	wp_enqueue_style( 'raccoon_default', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ), 'all' );

	/* JavaScript */
	wp_enqueue_script( 'raccoon_main', get_template_directory_uri() . '/src/js/script.js', array( 'jquery' ), '1.0.1', true );

	/* Post or Single */
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'raccoon_script' );



/**
 * Add Text Before </head>Tag
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/wp_head
 */
function raccoon_wp_head() {

	require_once get_template_directory() . '/inc/customizer/export.php';
}
add_action( 'wp_head', 'raccoon_wp_head' );



if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Action wp_body_open
	 *
	 * @codex https://developer.wordpress.org/reference/functions/wp_body_open/
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/**
 * Load CSS and JavaScript for WP Admin
 *
 * @return void
 */
function raccoon_admin_script() {
	add_editor_style( get_template_directory_uri() . '/src/css/admin/editor-style.css' );
}
add_action( 'admin_enqueue_scripts', 'raccoon_admin_script' );



/**
 * Add WP Admin Menu
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */
function raccoon_menu_init() {
	register_nav_menus(
		array(
			'header' => __( 'Header', 'raccoon' ),
		)
	);
}
add_action( 'init', 'raccoon_menu_init' );



/**
 * Add WP Admin Widget
 *
 * @codex http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_sidebar
 */
function raccoon_widget_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'raccoon' ),
			'id'            => 'sidebar',
			'before_widget' => '<div id="%1$s" class="p-widget %2$s">',
			'after_widget'  => '</div><!-- /p-widget -->',
			'before_title'  => '<div class="p-widget__title">',
			'after_title'   => '</div><!-- /p-widget__title -->',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Sticky', 'raccoon' ),
			'id'            => 'sidebar-fixed',
			'before_widget' => '<div id="%1$s" class="p-widget %2$s">',
			'after_widget'  => '</div><!-- /p-widget -->',
			'before_title'  => '<div class="p-widget__title">',
			'after_title'   => '</div><!-- /p-widget__title -->',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Smartphone Menu', 'raccoon' ),
			'id'            => 'sp-menu',
			'before_widget' => '<div id="%1$s" class="p-widget %2$s">',
			'after_widget'  => '</div><!-- /p-widget -->',
			'before_title'  => '<div class="p-widget__title">',
			'after_title'   => '</div><!-- /p-widget__title -->',
		)
	);
}
add_action( 'widgets_init', 'raccoon_widget_init' );



/**
 * Image Size
 */
add_image_size( 'raccoon_thumbnail', 840, 600, true );




/**
 * Template Tags
 */
require_once get_template_directory() . '/inc/tags.php';




/**
 * Breadcrumb List
 */
require_once get_template_directory() . '/inc/breadcrumb.php';

/**
 * Change Breadcrumb List Title
 *
 * @param string $title Before Title.
 * @return string $title After Title.
 */
function raccoon_breadcrumb_title( $title ) {
	if ( is_home() ) {
		$title = esc_html__( 'Blog', 'raccoon' );
	} else {
		$title = mb_strimwidth( $title, 0, 64, '&hellip;', 'UTF-8' );
	}
	return $title;
}
add_filter( 'raccoon_breadcrumb_title', 'raccoon_breadcrumb_title' );



/**
 * Change Archive Title
 *
 * @param string $title Before Title.
 * @return string $title After Title.
 */
function raccoon_archive_title( $title ) {

	if ( is_category() ) { /* Category */
		$title = '' . single_cat_title( '', false ) . '';
	} elseif ( is_tag() ) { /* Tag */
		$title = '' . single_tag_title( '', false ) . '';
	} elseif ( is_search() ) { /* Search */
		$title = '"' . esc_html( get_query_var( 's' ) ) . '"' . esc_html__( ' of Search Results', 'raccoon' );
	} elseif ( is_post_type_archive() ) { /* PostType */
		$title = '' . post_type_archive_title( '', false ) . '';
	} elseif ( is_tax() ) { /* Term */
		$title = '' . single_term_title( '', false );
	} elseif ( is_author() ) { /* Archive */
		$title = '' . get_the_author() . '';
	} elseif ( is_date() ) { /* Date */
		$title = '';
		if ( get_query_var( 'year' ) ) {
			$title .= get_query_var( 'year' ) . esc_html__( 'Year', 'raccoon' );
		}
		if ( get_query_var( 'monthnum' ) ) {
			$title .= get_query_var( 'monthnum' ) . esc_html__( 'Month', 'raccoon' );
		}
		if ( get_query_var( 'day' ) ) {
			$title .= get_query_var( 'day' ) . esc_html__( 'Day', 'raccoon' );
		}
	} elseif ( is_home() ) {
		$title = esc_html__( 'Blog', 'raccoon' );
	}
	return $title;
};
add_filter( 'get_the_archive_title', 'raccoon_archive_title' );



/**
 * Password Protect Form
 *
 * @return $raccoon_password_form HTML Form.
 */
function raccoon_password_form() {
	$raccoon_password_form  = '<p>' . esc_html__( 'This content is password protected. Enter your password below to view it.', 'raccoon' ) . '</p>';
	$raccoon_password_form .= '<form class="post_password" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="post-password-form" method="post">';
	$raccoon_password_form .= '<input name="post_password" type="password" placeholder="' . esc_attr__( 'Enter Password', 'raccoon' ) . '" class="post_password-field">';
	$raccoon_password_form .= '<input type="submit" name="Submit" value="' . esc_attr__( 'Confirm', 'raccoon' ) . '" class="post_password-submit">';
	$raccoon_password_form .= '</form>';
	return $raccoon_password_form;
}
add_filter( 'the_password_form', 'raccoon_password_form' );



/**
 * Into a-Tag Posts Num
 *
 * @param string $output Before HTML Tag.
 * @return string $output After HTML Tag.
 */
function raccoon_list_anchor( $output ) {
	$output = preg_replace( '/<\/a>.*?\((\d+)\)/', ' <span>($1)</span></a>', $output );
	return $output;
}
add_filter( 'wp_list_categories', 'raccoon_list_anchor' );
add_filter( 'get_archives_link', 'raccoon_list_anchor' );



/**
 * Change Excerpt Num
 *
 * @param int $length Before Excerpt Num.
 * @return int $length After Excerpt Num.
 * @codex https://wpdocs.osdn.jp/%E3%83%86%E3%83%B3%E3%83%97%E3%83%AC%E3%83%BC%E3%83%88%E3%82%BF%E3%82%B0/the_excerpt
 */
function raccoon_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}
	$length = 100;
	return $length;
}
add_filter( 'excerpt_length', 'raccoon_excerpt_length', 999 );



/**
 * Change Excerpt Ellipsis
 *
 * @param string $more Before Ellipsis.
 * @return string After Ellipsis.
 * @codex https://wpdocs.osdn.jp/%E3%83%86%E3%83%B3%E3%83%97%E3%83%AC%E3%83%BC%E3%83%88%E3%82%BF%E3%82%B0/the_excerpt
 */
function raccoon_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}
	$more = '&hellip;';
	return $more;
}
add_filter( 'excerpt_more', 'raccoon_excerpt_more' );


/**
 * Add WP Admin Customizer
 */
require_once get_template_directory() . '/inc/customizer/base.php';
require_once get_template_directory() . '/inc/customizer/color.php';
require_once get_template_directory() . '/inc/customizer/parts.php';
require_once get_template_directory() . '/inc/customizer/layout.php';
require_once get_template_directory() . '/inc/customizer/performance.php';


/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function raccoon_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'raccoon_skip_link_focus_fix' );
