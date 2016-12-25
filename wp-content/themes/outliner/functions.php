<?php
/**
 * outliner functions and definitions
 *
 * @package outliner
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 780; /* pixels */
}

if ( ! function_exists( 'outliner_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function outliner_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on outliner, use a find and replace
	 * to change 'outliner' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'outliner', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'outliner' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'outliner_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/*
	 * Add Additional image sizes
	 *
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'recent_posts_img', 600, 200, true );
	add_image_size( 'recent_page_img', 150, 150, true );
    add_image_size( 'outliner-blog-full-width', 1200,350, true );
	add_image_size( 'outliner-small-featured-image-width', 450,300, true );
	add_image_size( 'outliner-blog-large-width', 800,300, true );
	add_image_size( 'outliner_recent_posts_img', 300, 300, true );
	add_image_size( 'outliner_home_page_img', 360, 220, true );

}
endif; // outliner_setup
add_action( 'after_setup_theme', 'outliner_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function outliner_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'outliner' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sidebar Left', 'outliner' ),
		'id'            => 'sidebar-left',
		'description'   => __( 'Left Sidebar', 'outliner' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebars( 4, array(
		'name'          => __( 'Footer %d', 'outliner' ),
		'id'            => 'footer',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Nav', 'outliner' ),
		'id'            => 'footer-nav',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'outliner_widgets_init' );


add_theme_support( 'custom-background' );
	

add_theme_support( 'custom-logo' );
  
/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/includes/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';
/**
 * Free Theme upgrade page 
 */
require get_template_directory() . '/includes/theme_upgrade.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';
/**
 * Implement the Custom Header feature.
 */
require  get_template_directory()  . '/includes/custom-header.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

/**
 * Load Theme Options Panel
 */
require get_template_directory() . '/admin/theme-options.php';
/**
 * Inline style ( Theme Options )
 */
require get_template_directory() . '/includes/styles.php';

/**
 * hooks-filter
 */
require get_template_directory() . '/includes/hooks-filters.php';

/* Woocommerce support */

add_theme_support('woocommerce'); 

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');
add_action('woocommerce_before_main_content', 'outliner_output_content_wrapper');

function outliner_output_content_wrapper() {
	$woocommerce_sidebar = get_theme_mod('woocommerce_sidebar',true ) ;
	if( $woocommerce_sidebar ) {
        $woocommerce_sidebar_column = 'eleven';
    }else {
        $woocommerce_sidebar_column = 'sixteen'; 
        remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar');  
    }
	echo '<div class="site-content container" id="content"><div id="primary" class="content-area '. $woocommerce_sidebar_column .' columns">';	
}

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end' );
add_action( 'woocommerce_after_main_content', 'outliner_output_content_wrapper_end' );

function outliner_output_content_wrapper_end () {
	echo "</div>";
}

add_action( 'init', 'outliner_remove_wc_breadcrumbs' );
function outliner_remove_wc_breadcrumbs() {
   	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}


