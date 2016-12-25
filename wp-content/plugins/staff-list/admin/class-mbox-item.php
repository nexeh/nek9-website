<?php
if ( ! defined( 'ABSPATH' ) ) {exit;}
class ABCFSL_MBox_Item {

    public function __construct() {
        add_action( 'add_meta_boxes_cpt_staff_lst_item', array( $this, 'add_meta_box' ) );
        add_action( 'save_post_cpt_staff_lst_item', array( $this, 'save_post2' ) );
    }

    public function add_meta_box($post) {

        add_meta_box(
            'abcfsl_staff_member',
            abcfsl_txta(268),
            array( $this, 'display_staff_member' ),
            $post->post_type,
            'normal',
            'default'
        );

        add_meta_box(
            'abcfsl_staff_member_parent',
            abcfsl_txta(214),
            array( $this, 'display_staff_member_parent' ),
            $post->post_type,
            'side',
            'core'
        );

    }
//------------------------------------------------
    function remove_metabox() {
        remove_meta_box( 'wpseo_meta', 'cpt_img_txt_list', 'normal' );
    }

    public function display_staff_member() {
        //include_once( 'mbox-item-tabs.php' );
        include_once( 'mbox-item-text.php' );
        abcfsl_mbox_item();
    }

    public function display_staff_member_parent( $post ) {

        $parentID = $post->post_parent;
        $cboLists = abcfsl_dba_cbo_lists();

        echo abcfl_input_cbo('parent_id', 'parent_id', $cboLists, $parentID, '', abcfsl_txta(267), '100%', true, 'widefat');
    }

    public function save_post2( $postID ) {

        $obj = ABCFSL_Main();
        $slug = $obj->pluginSlug;

        //Exit if user doesn't have permission to save
        if (!$this->user_can_save( $postID, $slug ) ) { return; }

        //Save data.
        abcfl_mbsave_save_txt($postID, 'sortTxt', '_sortTxt');
        abcfl_mbsave_save_txt($postID, 'imgIDL', '_imgIDL');
        abcfl_mbsave_save_txt($postID, 'imgUrlL', '_imgUrlL');
        abcfl_mbsave_save_txt($postID, 'imgLnkL', '_imgLnkL');

        for ( $i = 1; $i <= 10; $i++ ) {
            $this->save_item( $postID, 'F' . $i );
        }

    }

    private function save_item( $postID, $F ) {

        //abcfl_mbsave_save_txt($postID, 'txt_' . $F, '_txt_' . $F);
        abcfl_mbsave_save_txt_html2($postID, 'txt_' . $F, '_txt_' . $F);
        abcfl_mbsave_save_txt($postID, 'url_' . $F, '_url_' . $F);
        abcfl_mbsave_save_txt($postID, 'urlTxt_' . $F, '_urlTxt_' . $F);
    }

    private function user_can_save( $postID, $action ) {

        $nonce = isset( $_POST[$action .'_nonce'] ) ? $_POST[$action .'_nonce'] : '';
        if(empty($nonce)){ return false; }
        $validNonce = wp_verify_nonce( $nonce, $action );
        if(!$validNonce) { wp_die('Security check fail. I');}

        $is_autosave = wp_is_post_autosave( $postID );
        $is_revision = wp_is_post_revision( $postID );
        return !( $is_autosave || $is_revision );
    }

}
