<?php
/**
 * Add scripts, styles and icons
*/
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_enqueue_scripts', 'abcfsl_script_enq_css_list', 21 );

function abcfsl_script_enq_css_list() {

    // Add CSS only the the page that contains shortcode
//    global $post;
//    if(!$post){ return;}
//    $content = $post->post_content;
//    $shortcode = 'abcf-staff-list';
//    if( !has_shortcode( $content, $shortcode)) { return; }

    $prefix = 'abcfsl-';
    $cssFile = 'staff-list';
    $customURL = abcfl_util_custom_css_url( 'custom-' . $cssFile. '.css' );

    $obj = ABCFSL_Main();
    $ver = $obj->pluginVersion;

    wp_register_style($prefix . $cssFile , ABCFSL_PLUGIN_URL . 'css/' . $cssFile . '.css' , array(), $ver, 'all');
    wp_enqueue_style($prefix . $cssFile );

    if(!empty($customURL)){
        wp_register_style($prefix . 'custom-' . $cssFile , $customURL, array(), $ver, 'all');
        wp_enqueue_style( $prefix . 'custom-' . $cssFile);
    }
}
