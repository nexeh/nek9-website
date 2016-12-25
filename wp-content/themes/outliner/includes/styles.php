<?php

function outliner_custom_styles($custom) {
$custom = '';	
	$sticky_header_position = get_theme_mod('sticky_header_position');
	if( $sticky_header_position == 'bottom') {
		$custom .= ".sticky-header .branding {  top: auto!important;
			bottom:0; }"."\n";	
		$custom .= ".sticky-header .branding .nav-menu .sub-menu {  top: auto;
			bottom:100%; }"."\n";	
	}	

     $page_title_bar_status = get_theme_mod('page_titlebar_text');
     if( $page_title_bar_status == 2 ) {
	     $custom .= ".breadcrumb .breadcrumb-right {
			display: none;
		}"."\n";
     }

     /* home sidebar */
     if( get_theme_mod('home_sidebar',false) ) {
         $custom .= ".home .site-content {
               padding-top:0;
          }"."\n";
     }

     /* customize flexcaption */
     if( get_theme_mod('enable_flex_caption_edit',false) ) {
         $custom .= ".flexslider .slides .flex-caption, .home .flexslider .slides .flex-caption {
               bottom: auto;
               padding-left: 30px;
               padding-top: 30px;
               padding: 30px;
          }"."\n";
          $custom .= ".flexslider .flex-caption h1, .flexslider .flex-caption h2, .flexslider .flex-caption h3, .flexslider .flex-caption h4, .flexslider .flex-caption h5, .flexslider .flex-caption h6, .flexslider .flex-caption p, .flexslider .flex-caption li {
               width: 100%;
          }"."\n";
     }

     /* content background color - overwrite */
     if(  get_theme_mod('enable_content_background_color') && empty( get_theme_mod('content_background_image') ) ) {
         $custom .= " .site-content {
               background-image: none;
          }"."\n";
     }

     /* general background color - overwrite */
     if(  get_theme_mod('enable_general_background_color') && empty( get_theme_mod('general_background_image') ) ) {
         $custom .= " body {
              background-image: none;
          }"."\n";
     }

	//Output all the styles
	wp_add_inline_style( 'outliner-style', $custom );    	
}


add_action( 'wp_enqueue_scripts', 'outliner_custom_styles' );  

