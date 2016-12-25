<?php
// Tabs content
include_once( 'mbox-item-img.php' );
include_once( 'mbox-item-text.php' );

//-- Render content ---------------------------------------------
echo  abcfl_html_tag('div', 'abcfsl-tabs1' );

    echo abcfl_html_tag( 'h2', '', 'nav-tab-wrapper current' );
        echo abcfl_html_a_tag('javascript:;', abcfsl_txta(247), '', 'nav-tab  nav-tab-active');
        echo abcfl_html_a_tag('javascript:;', abcfsl_txta(2), '', 'nav-tab');
    echo abcfl_html_tag_end('h2');

    global $post;
    $postID = $post->ID;
    $itemOptns = get_post_custom( $postID );
    $lstID = $post->post_parent;
    $lstOptns = get_post_custom( $lstID );
    $lineSort = abcfsl_util_field_order( $lstOptns );

//--------------------------------------------------
    $imgSize = isset( $itemOptns['imgS'] ) ? esc_attr( $itemOptns['imgS'][0] ) : '';

    $imgIDL = isset( $itemOptns['_imgIDL'] ) ? esc_attr( $itemOptns['_imgIDL'][0] ) : 0;
    $imgUrlL = isset( $itemOptns['_imgUrlL'] ) ? esc_attr( $itemOptns['_imgUrlL'][0] ) : '';

    // TODO
    //$imgLnkL = isset( $itemOptns['_imgLnkL'] ) ? esc_attr( $itemOptns['_imgLnkL'][0] ) : '';

    abcfsl_mbox_item_text( $itemOptns, $lstOptns, $lineSort, 1, 20 );
    abcfsl_mbox_item_img( $imgUrlL, $imgIDL );

    $obj = ABCFSL_Main();
    $slug = $obj->pluginSlug;
    wp_nonce_field( $slug, $slug . '_nonce' );

echo abcfl_html_tag_end('div');

