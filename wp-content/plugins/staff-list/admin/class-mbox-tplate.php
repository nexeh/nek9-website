<?php
if ( ! defined( 'ABSPATH' ) ) {exit;}
class ABCFSL_MBox_List {

    public function __construct() {
        add_action( 'add_meta_boxes_cpt_staff_lst', array( $this, 'add_meta_box' ) );
        add_action( 'save_post_cpt_staff_lst', array( $this, 'save_post' ) );
    }

    public function add_meta_box() {
        add_meta_box(
            'abcfsl_mbox_staff_lst',
            abcfsl_txta(19),
            array( $this, 'display_mbox_lst_optns' ),
            'cpt_staff_lst',
            'normal',
            'high'
        );
        add_meta_box(
            'abcfsl_mbox_staff_lst_fields',
            abcfsl_txta(217),
            array( $this, 'display_mbox' ),
            'cpt_staff_lst',
            'normal',
            'default'
        );
    }

    public function display_mbox_lst_optns() {
        include_once( 'mbox-tplate-tabs.php' );
        abcfsl_mbox_tplate_tabs();
    }

    public function display_mbox() {
	abcfsl_mbox_tplate_fields();
    }

    public function save_post( $postID ) {

        $obj = ABCFSL_Main();
        $slug = $obj->pluginSlug;

        //Exit if user doesn't have permission to save
        if (!$this->user_can_save( $postID, $slug ) ) { return; }

        //Save data.---------------------------------------------
        //New record.
        $lstLayoutH = ( isset( $_POST['lstLayoutH']) ? esc_attr( $_POST['lstLayoutH'] ) : '0' );
        $lstLayout = ( isset( $_POST['lstLayout' ]) ? esc_attr( $_POST['lstLayout' ] ) : $lstLayoutH );

        if ($lstLayout == '0' ){ return; }
        if ($lstLayoutH == '0'){
            abcfl_mbsave_save_cbo( $postID, 'lstLayout', '_lstLayout', '0');
            abcfl_mbsave_save_field( $postID, '_lstLayoutH', $lstLayout);
            return;
        }

        abcfl_mbsave_save_cbo( $postID, 'lstCols', '_lstCols', '6');
        abcfl_mbsave_save_txt($postID, 'lstCntrW', '_lstCntrW');
        abcfl_mbsave_save_txt($postID, 'lstCntrTM', '_lstCntrTM');
        abcfl_mbsave_save_cbo( $postID, 'lstACenter', '_lstACenter', 'Y');
        abcfl_mbsave_save_txt($postID, 'lstCntrCls', '_lstCntrCls');
        abcfl_mbsave_save_txt($postID, 'lstCntrStyle', '_lstCntrStyle');

        //abcfl_mbsave_save_cbo( $postID, 'gridCols', '_gridCols', '2');
        abcfl_mbsave_save_decimal( $postID, 'itemMarginL', '_itemMarginL' , '');

        // TODO
        abcfl_mbsave_save_decimal( $postID, 'itemMarginB', '_itemMarginB' , '');

        //abcfl_mbsave_save_chekbox($postID, 'advancedCSS', '_advancedCSS');
        //abcfl_mbsave_save_cbo( $postID, 'lstVAid', '_vAid', 'N');
        abcfl_mbsave_save_txt($postID, 'lstItemCls', '_lstItemCls');
        abcfl_mbsave_save_txt($postID, 'lstItemStyle', '_lstItemStyle');
        abcfl_mbsave_save_txt($postID, 'lstImgCls', '_lstImgCls');
        abcfl_mbsave_save_txt($postID, 'lstImgStyle', '_lstImgStyle');
        abcfl_mbsave_save_txt($postID, 'lstTxtCntrCls', '_lstTxtCntrCls');
        abcfl_mbsave_save_txt($postID, 'lstTxtCntrStyle', '_lstTxtCntrStyle');
        abcfl_mbsave_save_cbo( $postID, 'addMaxW', '_addMaxW', 'N');

        for ( $i = 1; $i <= 10; $i++ ) {
            $this->save_line_option( $postID, 'F' . $i );
        }
    }

    private function save_line_option( $postID, $F ) {

        //New field type not selected.
        $fieldTypeH = ( isset( $_POST['fieldTypeH_' . $F ]) ? esc_attr( $_POST['fieldTypeH_' . $F ] ) : 'N' );
        $fieldType = ( isset( $_POST['fieldType_' . $F ]) ? esc_attr( $_POST['fieldType_' . $F ] ) : $fieldTypeH );

        //---- TODO
        if ($fieldType == 'N' ){ return 0; }

        if ($fieldTypeH == 'N'){
            abcfl_mbsave_save_cbo( $postID, 'fieldType_' . $F, '_fieldType_' . $F, 'N');
            abcfl_mbsave_save_field( $postID, '_fieldTypeH_' . $F, $fieldType);
            return 0;
        }

        //Add a new field to the sort fields array.
        abcfsl_autil_add_new_field_to_field_order( $postID, $F );

        //Checkbox Locked
        if (isset( $_POST['lineLocked_' . $F ])){
            abcfl_mbsave_save_chekbox($postID, 'lineLocked_' . $F, '_fieldLocked_' . $F);
            //return $bitValue;
        }

        if (isset( $_POST['showField_' . $F ])){
            $showField = ( isset( $_POST['showField_' . $F ]) ? esc_attr( $_POST['showField_' . $F ] ) : 'L' );

            if($showField == 'D'){
                $this->delete_fields( $postID, $F );
                return 0;
            }
        }

        abcfl_mbsave_save_cbo( $postID, 'showField_' . $F, '_showField_' . $F, 'L');
        abcfl_mbsave_save_chekbox($postID, 'lineLocked_' . $F, '_fieldLocked_' . $F);
        //-----------------------------------------------------
        abcfl_mbsave_save_cbo( $postID,'tagType_' . $F, '_tagType_' . $F, 'div');
        abcfl_mbsave_save_cbo( $postID,'tagFont_' . $F, '_tagFont_' . $F, 'D');
        abcfl_mbsave_save_cbo( $postID,'tagMarginT_' . $F, '_tagMarginT_' . $F, 'D');
        abcfl_mbsave_save_txt($postID, 'tagCls_' . $F, '_tagCls_' . $F);
        abcfl_mbsave_save_txt($postID, 'tagStyle_' . $F, '_tagStyle_' . $F);
        //-----------------------------------------------------
        abcfl_mbsave_save_txt($postID, 'lblTxt_' . $F, '_lblTxt_' . $F);
        abcfl_mbsave_save_txt($postID, 'lblTag_' . $F, '_lblTag_' . $F);
        abcfl_mbsave_save_txt($postID, 'lblCls_' . $F, '_lblCls_' . $F);
        abcfl_mbsave_save_txt($postID, 'lblStyle_' . $F, '_lblStyle_' . $F);
        //-----------------------------------------------------
        abcfl_mbsave_save_txt($postID, 'txtCls_' . $F, '_txtCls_' . $F);
        abcfl_mbsave_save_txt($postID, 'txtStyle_' . $F, '_txtStyle_' . $F);
        //-----------------------------------------------------
        abcfl_mbsave_save_txt($postID, 'lnkCls_' . $F, '_lnkCls_' . $F);
        abcfl_mbsave_save_txt($postID, 'lnkStyle_' . $F, '_lnkStyle_' . $F);
        //-- Input field labels ---------------------------------------------------
        abcfl_mbsave_save_txt($postID, 'inputLbl_' . $F, '_inputLbl_' . $F);
        abcfl_mbsave_save_txt($postID, 'lnkLblLbl_' . $F, '_lnkLblLbl_' . $F);
        abcfl_mbsave_save_txt($postID, 'lnkUrlLbl_' . $F, '_lnkUrlLbl_' . $F);

    }

    private function delete_fields( $postID, $F ) {

        delete_post_meta( $postID, '_fieldType_' . $F );
        delete_post_meta( $postID, '_fieldTypeH_' . $F );
        delete_post_meta( $postID, '_showField_' . $F );
        delete_post_meta( $postID, '_fieldLocked_' . $F );
        delete_post_meta( $postID, '_tagTypeL_' . $F );
        delete_post_meta( $postID, '_tagType_' . $F );
        delete_post_meta( $postID, '_tagFont_' . $F );
        delete_post_meta( $postID, '_tagMarginT_' . $F );

        delete_post_meta( $postID, '_tagCls_' . $F );
        delete_post_meta( $postID, '_lblTxt_' . $F );
        delete_post_meta( $postID, '_lblTag_' . $F );

        delete_post_meta( $postID, '_lblCls_' . $F );
        delete_post_meta( $postID, '_lblStyle_' . $F );
        delete_post_meta( $postID, '_txtCls_' . $F );
        delete_post_meta( $postID, '_txtStyle_' . $F );

        delete_post_meta( $postID, '_lnkCls_' . $F );
        delete_post_meta( $postID, '_lnkStyle_' . $F );

        delete_post_meta( $postID, '_inputLbl_' . $F );
        delete_post_meta( $postID, '_lnkLblLbl_' . $F );
        delete_post_meta( $postID, '_lnkUrlLbl_' . $F );
    }

    private function user_can_save( $postID, $action ) {

        $nonce = isset( $_POST[$action .'_nonce'] ) ? $_POST[$action .'_nonce'] : '';
        if(empty($nonce)){ return false; }
        $validNonce = wp_verify_nonce( $nonce, $action );
        if(!$validNonce) { wp_die('Security check fail. T');}

        $is_autosave = wp_is_post_autosave( $postID );
        $is_revision = wp_is_post_revision( $postID );
        return !( $is_autosave || $is_revision );
    }
}