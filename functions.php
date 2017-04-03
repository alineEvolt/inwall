<?php
/**
 * inwall functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package inwall
 */

if ( ! function_exists( 'inwall_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function inwall_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on inwall, use a find and replace
	 * to change 'inwall' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'inwall', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('testi', 340, 340, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'inwall' ),
			'menu-2' => esc_html__( 'Footer col 1', 'inwall' ),
			'menu-3' => esc_html__( 'Footer col 2', 'inwall' ),
			'menu-4' => esc_html__( 'Footer col 3', 'inwall' ),
			'menu-5' => esc_html__( 'Footer col 4', 'inwall' )
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'inwall_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'inwall_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function inwall_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'inwall_content_width', 640 );
}
add_action( 'after_setup_theme', 'inwall_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function inwall_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'inwall' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Ajoutez vos widgets ici', 'inwall' ),
		'before_widget' => '<section id="%1$s" class="%2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'inwall_widgets_init' );

/**
* Load font
*/
function load_fonts() {
   wp_register_style('googleFonts',
'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700');
   wp_enqueue_style('googleFonts');
     }

add_action('wp_enqueue_scripts', 'load_fonts');

/**
 * Enqueue scripts and styles.
 */
function inwall_scripts() {
	wp_enqueue_style( 'inwall-style', get_stylesheet_uri() );

	/* à remettre pour le build (prod)*/
	wp_enqueue_style( 'inwall-selectcss', get_template_directory_uri() . '/dist/css/vendor/jquery-ui.min.css' );
	wp_enqueue_style( 'evolt-styles', get_template_directory_uri() . '/dist/css/styles.min.css' );
  //A virer pour le build

	/*wp_enqueue_style( 'inwall-swiper', get_template_directory_uri() . '/bower_components/swiper/dist/css/swiper.css' );
	wp_enqueue_style( 'inwall-swiper', get_template_directory_uri() . '/bower_components/jquery-ui/themes/base/selectmenu.css' );
  wp_enqueue_style( 'inwall-styles', get_template_directory_uri() . '/app/css/knacss.css' );*/
  // end a virer pour le build

  wp_enqueue_script( 'inwall-selectjs', get_template_directory_uri() . '/dist/js/vendor/jquery-ui.min.js', array("jquery"), '20171703', true );
  wp_enqueue_script( 'inwall-functions', get_template_directory_uri() . '/dist/js/main.min.js', array("jquery"), '20171703', true );

	wp_enqueue_script( 'inwall-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20171703', true );

}

add_action( 'wp_enqueue_scripts', 'inwall_scripts' );

/**
 * add custom posts type
 */

require get_template_directory() . '/inc/types.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
