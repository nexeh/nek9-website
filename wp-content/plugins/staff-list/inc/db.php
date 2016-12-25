<?php

function abcfsl_db_list_item_ids( $parentID ) {
    global $wpdb;
        $postIDs = $wpdb->get_col( $wpdb->prepare(
        "SELECT ID
        FROM $wpdb->posts
        WHERE post_parent = %d
        AND post_status = 'publish'
        ORDER BY menu_order ASC", $parentID ));

    return $postIDs;
}

function abcfsl_db_image_meta($postID) {
    global $wpdb;
    $meta = $wpdb->get_col(
    "SELECT meta_value
    FROM $wpdb->postmeta
    WHERE post_id = ' . $postID .
    ' AND meta_key = '_wp_attachment_metadata'");
    return $meta;
}
