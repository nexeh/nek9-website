<?php
add_action( 'wp_ajax_update_field_order', 'abcfsl_ajax_update_field_order' );

function abcfsl_ajax_update_field_order() {

    if(!$_POST){
        $out = array( 'error' => true, 'error_msg' => 'Error: POST is missing.');
        wp_send_json( $out );
        die();
    }

    $check = check_ajax_referer( 'abcfolio-staff-list', 'security', false );
    if(!$check){
        $out = array( 'error' => true, 'msg' => 'Error: Permissions check failed');
        wp_send_json( $out );
        die();
    }

    $defaults = array(
        'order' => array('L_0'),
        'postid' => 'ul_0'
     );

    $post = wp_parse_args( $_POST, $defaults );
    $order = $post['order'];
    $postID = str_ireplace( 'ul_', '', $post['postid'] );

    if($order[0] == 'L_0'){
        $out = array( 'error' => true, 'error_msg' => 'Error: Order is missing.');
        wp_send_json( $out );
        die();
    }

    // TODO
//    if($order[0] != 'L_0'){
//        //$out = array( $order );
//        //$postID = ( isset( $_POST['ID'] ) ? esc_attr( $_POST['ID'] ) : '0' );
//        $out = array( $_POST );
//        wp_send_json( $out );
//        die();
//    }

    $fieldOrder = 0;
    $fieldOrder_L = '';

    foreach( $order as $F ) {
        $fieldOrder ++;
        $fieldOrder_L[$fieldOrder] = $F;
    }

    //A passed array will be serialized into a string.
    if(!empty($fieldOrder_L)){
        update_post_meta( $postID, '_fieldOrder', $fieldOrder_L );
    }

    die();
}

//----------------------------------------------------------------
add_action( 'wp_ajax_update_list_order', 'abcfsl_ajax_update_list_order' );

function abcfsl_ajax_update_list_order() {

    if(!$_POST){
        $out = array( 'error' => true, 'error_msg' => 'Error: POST is missing.');
        wp_send_json( $out );
        die();
    }

    $check = check_ajax_referer( 'abcfolio-staff-list', 'security', false );
    if(!$check){
        $out = array( 'error' => true, 'msg' => 'Error: Permissions check failed');
        wp_send_json( $out );
        die();
    }

    $defaults = array(
        'order' => array('post_0')
     );

    $post = wp_parse_args( $_POST, $defaults );
    $order = $post['order'];

    if($order[0] == 'post_0'){
        $out = array( 'error' => true, 'error_msg' => 'Error: Order is missing.');
        wp_send_json( $out );
        die();
    }

    $postID = 0;
    $menuOrder = 0;

    foreach( $order as $post_id ) {
        $postID  = intval( str_ireplace( 'item_', '', $post_id ) );
        $menuOrder ++;
        abcfsl_dba_update_items_order( $postID, $menuOrder);
    }
    die();
}

function abcfsl_dba_update_items_order($postID, $menuOrder ) {
    global $wpdb;
    $wpdb->query($wpdb->prepare(
        "UPDATE $wpdb->posts
        SET menu_order = %d
        WHERE ID = %d", $menuOrder, $postID ));
}