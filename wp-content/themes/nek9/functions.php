<?php

add_theme_support('excerpts', 'post');
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo', array(
	'height'      => 50,
	'width'       => 50,
	'flex-height' => true,
) );
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 1200, 9999 );
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'nek9sar' ),
	'social'  => __( 'Social Links Menu', 'nek9sar' ),
) );
add_theme_support( 'html5', array(
	'gallery',
	'caption',
) );
add_theme_support( 'post-formats', array(
	'aside',
	'image',
	'video',
	'quote',
	'link',
	'gallery',
	'status',
	'audio',
	'chat',
) );
// Indicate widget sidebars can use selective refresh in the Customizer.
add_theme_support( 'customize-selective-refresh-widgets' );

// Add scripts and stylesheets
function startwordpress_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6' );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true );
}
add_action( 'wp_enqueue_scripts', 'startwordpress_scripts' );

// Add Google Fonts
function startwordpress_google_fonts() {
				wp_register_style('OpenSans', '//fonts.googleapis.com/css?family=Open+Sans:400,600,700,800');
				wp_enqueue_style( 'OpenSans');
		}
add_action('wp_print_styles', 'startwordpress_google_fonts');

// WordPress Titles
function startwordpress_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() ) {
		return $title;
	} 
	// Add the site name.
	$title .= get_bloginfo( 'name' );
	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}
	return $title;
} 
add_filter( 'wp_title', 'startwordpress_wp_title', 10, 2 );

// Rotating Header picture configuration
function custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '888888',
		'width'                  => 1500,
		'height'                 => 300,
		'flex-height'            => true,
		'admin-head-callback'    => 'admin_header_style',
		'admin-preview-callback' => 'admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'custom_header_setup' );

function admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="heading">
		<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="displaying-header-text" id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>" >
		<?php endif; ?>
	</div>
<?php
}

add_action( 'init', 'cptui_register_my_cpts_members' );
function cptui_register_my_cpts_members() {
	$labels = array(
		"name" => __( 'Members', '' ),
		"singular_name" => __( 'Member', '' ),
		);

	$args = array(
		"label" => __( 'Members', '' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "members", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "http://localhost:8888/wp-content/uploads/2016/12/NEK9_favicon.png",
		"supports" => array( "title", "editor", "thumbnail",),					);
	register_post_type( "members", $args );

// End of cptui_register_my_cpts_members()
}




