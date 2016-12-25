<?php
function abcfsl_mbox_list_order( $postID ) {

    echo  abcfl_html_tag('div','','inside  hidden');

        $dbRows = abcfsl_dba_items_for_order($postID);
        if ($dbRows) {
            echo abcfl_input_info_lbl(abcfsl_txta(255), 'abcflMTop15', 14, 'SB');
            abcfsl_list_items_order($dbRows);
        }
        else{
            echo abcfl_input_info_lbl(abcfsl_txta(266), 'abcflMTop15 abcflGreen', 14, 'SB');
        }

    echo abcfl_html_tag_end('div');
}

function abcfsl_list_items_order($dbRows) {

    echo  abcfl_html_tag('div', '', 'wrap wrapSort');
        echo abcfl_html_tag( 'table', 'sort-items-tbl', 'wp-list-table widefat fixed striped posts' );
        echo abcfl_html_tag( 'tbody', '' );
            foreach ( $dbRows as $dbRow ) { abcfsl_list_order_item($dbRow->ID, $dbRow->post_title, $dbRow->menu_order ); }
        echo abcfl_html_tag_ends( 'tbody,table' );
    echo abcfl_html_tag_end( 'div' );
}

function abcfsl_list_order_item($postID, $postTitle, $menuOrder){

    $optns = get_post_custom($postID);

    $imgUrl = isset( $optns['_imgUrlL'] ) ? esc_attr( $optns['_imgUrlL'][0] ) : '';

    echo abcfl_html_tag( 'tr', 'item_' . $postID );

    echo abcfl_html_tag( 'td', '', 'column-order' );
    echo abcfl_html_img_tag('', ABCFSL_PLUGIN_URL . 'images/move-icon.png', 'Move Icon', '', 24, 24);
    echo abcfl_html_tag_end( 'td' );

    echo abcfl_html_tag( 'td', '', 'column-photo' );
    echo abcfl_html_img_tag('', $imgUrl, '', '', 0, 60);
    echo abcfl_html_tag_end( 'td' );

    echo abcfl_html_tag( 'td', '', 'menu-orsder' );
    echo $menuOrder;
    echo abcfl_html_tag_end( 'td' );

    echo abcfl_html_tag( 'td', '', 'column-name' );
    echo $postTitle;
    echo abcfl_html_tag_ends( 'td,tr' );

}



