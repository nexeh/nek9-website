<?php

if(! function_exists('outliner_footer_credits') ) {
	function outliner_footer_credits() { 
		printf( __('<p>Powered by <a href="%1$s">WordPress</a>', 'outliner'), esc_url( 'http://wordpress.org/') );
		printf( '<span class="sep"> .</span>' );
		printf( __( 'Theme: Outliner by <a href="%1$s" rel="designer">Webulous Themes</a></p>', 'outliner' ), esc_url('http://www.webulousthemes.com/') );
    }  
}
	
	add_action('outliner_credits','outliner_footer_credits');

if(! function_exists('outliner_before_branding_widgets') ) {
	function outliner_before_branding_widgets() {
		?>
			<?php if( is_active_sidebar('top-right' ) ) : ?>
				<div class="social">
					<?php dynamic_sidebar('top-right' ); ?> 
				</div>
			<?php endif; ?>     
		<?php
	}
	
}
add_action('outliner_before_branding','outliner_before_branding_widgets');

/* MORE TEXT VALUE */

add_filter( 'the_content_more_link','outliner_more_text_value');
if(! function_exists('outliner_more_text_value') ) {
	function outliner_more_text_value( ) {
		$more_text = get_theme_mod('more_text');
		if( $more_text && !empty( $more_text ) ) {
			$more_link_text = sprintf(__( '%1$s', 'outliner' ), $more_text );
		}else{
			$more_link_text = __('Read More','outliner'); 
		}
		return '<p class="portfolio-readmore"><a class="more-link" href="' . get_permalink() . '">'.$more_link_text.'</a></p>';
	} 
}

/**
 * Configuration sample for the Kirki Customizer.
 * The function's argument is an array of existing config values
 * The function returns the array with the addition of our own arguments
 * and then that result is used in the kirki/config filter
 *
 * @param $config the configuration array
 *
 * @return array
 */

function outliner_demo_configuration_sample_styling( $config ) {
	return wp_parse_args( array(
		'color_accent' => '#e5493a',
		'color_back'   => '#FFFFFF',
		'width'   => '320px',
	), $config );
}
add_filter( 'kirki/config', 'outliner_demo_configuration_sample_styling' );    

add_action('outliner_blog_layout_class_wrapper_before','outliner_blog_layout_wrapper_class_before');
if(! function_exists('outliner_blog_layout_wrapper_class_before') ) {

	function outliner_blog_layout_wrapper_class_before() {
		$blog_layout = get_theme_mod('blog_layout',1 );
		switch ( $blog_layout ) {
			case 2: ?>
				<div class="eight columns blog-box">	
	<?php	break;
	        case 3: ?>
			    <div class="one-third column blog-box">
	<?php	break;
	        case 4: ?>
			    <div class="eight columns masonry-post blog-box">
	<?php	break;
			case 5: ?>  
			   <div class="one-third column masonry-post blog-box">	
	<?php	break;

		}
	}
}
   
add_action('outliner_blog_layout_class_wrapper_after','outliner_blog_layout_wrapper_class_after');
if(! function_exists('outliner_blog_layout_wrapper_class_after') ) {
	function outliner_blog_layout_wrapper_class_after() {
	    $blog_layout = get_theme_mod('blog_layout',1 );
		   if(  isset( $blog_layout ) && $blog_layout  > 1 ) { ?>
	          </div>
	<?php	}
	}
}

add_action('wp_head', 'outliner_masonry_custom_js');
if(! function_exists('outliner_masonry_custom_js') ) {

	function outliner_masonry_custom_js() {

	  if( get_theme_mod('blog_layout',1) == 4 || get_theme_mod('blog_layout',1) == 5 ) { ?>

	    <script type="text/javascript">
		    jQuery(document).ready( function($) {   
				  $('.masonry-blog-content').imagesLoaded(function () {
			            $('.masonry-blog-content').masonry({
			                itemSelector: '.masonry-post',  
			                gutter: 0,
			                transitionDuration: 0,
			            }).masonry('reloadItems'); 
			      });
		    });
	    </script> 

<?php }
	}
}
