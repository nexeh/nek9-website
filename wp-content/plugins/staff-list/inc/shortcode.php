<?php
/**
 * Process shortcode
*/
if ( ! defined( 'ABSPATH' ) ) {exit;}

//Add a hook for a shortcode tag. 1.Shortcode tag to be searched in post content. 2-Functio to run when shortcode is found.
add_shortcode( 'abcf-staff-list', 'abcfsl_scode_add_list' );

//Render page - LIST layout.
function abcfsl_scode_add_list( $scodeArgs ) {

    $args = shortcode_atts( abcfsl_scode_defaults(), $scodeArgs );
    return abcfsl_cnt_list($args);
}

function abcfsl_scode_defaults() {

    $obj = ABCFSL_Main();
    $ver = str_replace('.', '' , $obj->pluginVersion);
    $prefix = $obj->prefix;

    return array( 'id' => '0', 'template' => '', 'pversion' => $ver, 'prefix' => $prefix );
}

//---------------------------------------------------------------------------------
//Shortcode builder
function abcfsl_scode_build_scode( $esc = true ) {

    global $post;
    $listID = $post->ID;
    $scodeL = '[abcf-staff-list' . ' id="' . $listID . '"]';

    if($esc){
        $scodeL = esc_attr( $scodeL );
    }
    $scodes['scodeL'] = $scodeL;
    return $scodes;
}

