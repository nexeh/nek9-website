<?php
/*
 * Admin tab: Demos.
 * Creates demo posts: template + items.
 */
function abcfsl_admin_demos() {

    $obj = ABCFSL_Main();
    $slug = $obj->pluginSlug;

    echo  abcfl_html_tag('div', '', 'wrap' );
    echo abcfl_html_tag( 'h3', '', '' );
    echo abcfsl_txta(294);
    echo abcfl_html_tag_end('h3');



    if ( isset($_POST['btnAddDefaultPosts']) ){
        check_admin_referer( $slug . '_nonce' );

        $insertOut = abcfsl_admin_demos_add_default_pages();

        $defaults = array( 'errorMsg' => 'M', 'outTplate' => 'T', 'outItem1' => '1', 'outItem2' => '2', 'outItem3' => '3' );
        $out = wp_parse_args( $insertOut, $defaults );

        //Return status messages.
        if($insertOut['status'] == 'KO') { echo abcfl_input_info_lbl($out['errorMsg'], 'abcflMTop15 abcflRed', 16, 'SB'); }
         echo abcfl_input_info_lbl($out['outTplate'], 'abcflMTop15', 14, 'SB');
         echo abcfl_input_info_lbl($out['outItem1'], 'abcflMTop10', 14, 'SB');
         echo abcfl_input_info_lbl($out['outItem2'], 'abcflMTop10', 14, 'SB');
         echo abcfl_input_info_lbl($out['outItem3'], 'abcflMTop10', 14, 'SB');
    }
    //------------------------------------------------------------
    echo abcfl_html_form( 'frm-mm-defaults', '');
    wp_nonce_field($slug . '_nonce');
   //-------------------------------------------------------------

    echo abcfl_input_hline('2', '20', '50P');

    echo abcfl_html_tag('div','', 'submit' );
    echo abcfl_input_btn( 'btnAddDefaultPosts', 'btnAddDefaultPosts', 'submit', abcfsl_txta(241), 'button-primary abcficBtnWide' );
    echo abcfl_html_tag_ends('div,form,div');
}

function abcfsl_admin_demos_add_default_pages() {

    $cptTtplate = 'cpt_staff_lst';
    $titleTplate = 'Staff Template - Demo';
    $cptItem = 'cpt_staff_lst_item';
    $titleStaffMember = 'Staff Member';

    $par['pgSuffix'] = 0;
    $out['errorMsg'] = '';
    $out['outTplate'] = '';
    $out['tplateID'] = 0;

    $out['status'] = 'KO';
    $out = abcfsl_admin_demos_check_post_type($cptTtplate, $out);
    if($out['status'] == 'KO') { return $out; }

    $out['status'] = 'KO';
    $out = abcfsl_admin_demos_check_post_type($cptItem, $out);
    if($out['status'] == 'KO') { return $out; }

    //Check if custom post type with the same name already exists. If so append
    $pgExists = abcfsl_admin_demos_check_post_title($cptTtplate, $titleTplate);
    $pgExists += abcfsl_admin_demos_check_post_title($cptItem, $titleStaffMember);

//    if($pgExists > 0){
//        wp_die( __('You Can\'t Create any more demo records.') );
//        exit;
//    }

    $out['status'] = 'KO';
    $out = abcfsl_admin_demos_create_template($cptTtplate, $titleTplate, $par, $out);
    if($out['status'] == 'KO') { return $out; }

    //====================================================

    $suffix = $par['pgSuffix'];

    $par['recordNo'] = '1';
    $par['F1'] = 'Stephanie More';
    $par['F2'] = 'Assistant Principal';
    $par['F3'] = 'Phone: 123-5555-2323';
    $par['F4L'] = 'Email';
    $par['F4U'] = 'myemail@mydomain.com';
    $title = abcfsl_admin_demos_item_title($titleStaffMember, $par['recordNo'], $suffix);
    //$title1 = $titleStaffMember . ' ' . $par['recordNo'];

    $out['status'] = 'KO';
    $out = abcfsl_admin_demos_create_item($cptItem, $title, $par, $out);
    if($out['status'] == 'KO') { return $out; }

    //------------------------------------------------------------
    $par['recordNo'] = '2';
    $par['F1'] = 'Michael Gordon';
    $par['F2'] = 'Language Arts Teacher';
    $par['F3'] = 'Phone: 123-2828-2828';
    $par['F4L'] = 'myemail@mydomain.com';
    $par['F4U'] = 'myemail@mydomain.com';
    $title = abcfsl_admin_demos_item_title($titleStaffMember, $par['recordNo'], $suffix);

    $out['status'] = 'KO';
    $out = abcfsl_admin_demos_create_item($cptItem, $title, $par, $out);
    if($out['status'] == 'KO') { return $out; }

    //------------------------------------------------------------
    $par['recordNo'] = '3';
    $par['F1'] = 'Laura Taylor';
    $par['F2'] = 'Social Studies Teacher';
    $par['F3'] = 'Phone: 989-6667-6262';
    $par['F4L'] = 'Contact';
    $par['F4U'] = 'myemail@mydomain.com';
    $title = abcfsl_admin_demos_item_title($titleStaffMember, $par['recordNo'], $suffix);

    $out['status'] = 'KO';
    $out = abcfsl_admin_demos_create_item($cptItem, $title, $par, $out);
    if($out['status'] == 'KO') { return $out; }

    return $out;
}

function abcfsl_admin_demos_item_title($titleStaffMember, $recordNo, $pgSuffix){

    $suffix = '';
    if($pgSuffix > 0) { $suffix = $pgSuffix; }
    return $titleStaffMember . ' ' . $recordNo . ' - Demo ' . $suffix;
}

function abcfsl_admin_demos_create_template($postType, $pgTitle, $par, $out) {

    if($par['pgSuffix'] > 0) { $pgTitle = $pgTitle . ' ' . $par['pgSuffix']; }

    $postData = array (
        'comment_status'    => 'closed',
        'ping_status'       => 'closed',
        'post_title'        => $pgTitle,
        'post_status'       => 'publish',
        'post_type'         => $postType,
    );

    $postID = wp_insert_post( $postData );

    if ( is_wp_error( $postID ) ) {
        $out['status'] = 'KO';
        $out['outTplate'] = $postID->get_error_message();
        return $out;
    }
    if ( !$postID ) {
        $out['status'] = 'KO';
        $out['outTplate'] = 'Error: Staff Member Template Demo not created.';
        return $out;
    }

    // insert post meta
    add_post_meta($postID, '_lstLayout', '1');
    add_post_meta($postID, '_lstLayoutH', '1');
    add_post_meta($postID, '_singleLayout', '1');
    add_post_meta($postID, '_singleLayoutH', '1');

    add_post_meta($postID, '_lstCols', '5');
    add_post_meta($postID, '_lstImgCls', 'abcfslImgCenter abcfslImgBorder1');

    //add_post_meta($postID, '_itemMarginB', '1');
    add_post_meta($postID, '_spgCols', '5');
    add_post_meta($postID, '_spgImgCls', 'abcfslImgCenter abcfslImgBorder1');
    add_post_meta($postID, '_spgCntrCls', 'abcfslMB200');

    add_post_meta($postID, '_fieldType_F1', 'T');
    add_post_meta($postID, '_fieldTypeH_F1', 'T');
    add_post_meta($postID, '_showField_F1', 'Y');
    add_post_meta($postID, '_tagType_F1', 'h3');
    add_post_meta($postID, '_inputLbl_F1', 'Staff Member Name');

    add_post_meta($postID, '_fieldType_F2', 'T');
    add_post_meta($postID, '_fieldTypeH_F2', 'T');
    add_post_meta($postID, '_showField_F2', 'Y');
    add_post_meta($postID, '_tagType_F2', 'p');
    add_post_meta($postID, '_inputLbl_F2', 'Job Title');

    add_post_meta($postID, '_fieldType_F3', 'T');
    add_post_meta($postID, '_fieldTypeH_F3', 'T');
    add_post_meta($postID, '_showField_F3', 'Y');
    add_post_meta($postID, '_tagType_F3', 'p');
    add_post_meta($postID, '_inputLbl_F3', 'Phone Number');

    add_post_meta($postID, '_fieldType_F4', 'EM');
    add_post_meta($postID, '_fieldTypeH_F4', 'EM');
    add_post_meta($postID, '_showField_F4', 'S');
    add_post_meta($postID, '_tagType_F4', 'p');
    add_post_meta($postID, '_inputLbl_F4', 'Email');


    $out['status'] = 'OK';
    $out['outTplate'] = 'Created: ' . $pgTitle;
    $out['tplateID'] = $postID;

    return $out;
}

function abcfsl_admin_demos_create_item($postType, $pgTitle, $par, $out) {

    //if($par['pgSuffix'] > 0) { $pgTitle = $pgTitle . ' ' . $par['pgSuffix']; }

    $postData = array (
        'comment_status'    => 'closed',
        'ping_status'       => 'closed',
        'post_title'        => $pgTitle,
        'post_status'       => 'publish',
        'post_type'         => $postType,
        'post_parent'  => $out['tplateID']
    );

    $postID = wp_insert_post( $postData );

    if ( is_wp_error( $postID ) ) {
        $out['status'] = 'KO';
        $out['outItem'] = $postID->get_error_message();
        return $out;
    }
    if (!$postID) {
        $out['status'] = 'KO';
        $out['outItem'] = 'Error: Staff Member Demo not created.';
        return $out;
    }

    $recordNo = $par['recordNo'];
    $src = ABCFSL_PLUGIN_URL . '/images/staff-member-'. $recordNo . '.jpg';


    // Add post meta
    add_post_meta($postID, '_imgIDL', '0');
    add_post_meta($postID, '_imgUrlL', $src);
    add_post_meta($postID, '_imgLnkL', 'SP');
    add_post_meta($postID, '_imgIDS', '0');
    add_post_meta($postID, '_imgUrlS', 'SP');

    add_post_meta($postID, '_txt_F1', $par['F1']);
    add_post_meta($postID, '_txt_F2', $par['F2']);
    add_post_meta($postID, '_txt_F3', $par['F3']);
    add_post_meta($postID, '_url_F4', $par['F4U']);
    add_post_meta($postID, '_urlTxt_F4', $par['F4L']);

    //$outItem = 'outItem' . $par['recordNo'];

    $out['status'] = 'OK';
    $out['outItem' . $recordNo] = 'Created: ' . $pgTitle;
    $out['itemID'] = $postID;

    return $out;
}

function abcfsl_admin_demos_check_post_type($postType, $out) {

    $out['status'] = 'OK';

    if ( !post_type_exists( $postType ) ) {
        $out['errorMsg'] = 'Error: Custom post type doesn\'t exist: ' . $postType;
        $out['status'] = 'KO';
    }
    return $out;
}

function abcfsl_admin_demos_check_post_title( $postType, $pgTitle ) {

    $qty = 0;
    $pg = get_page_by_title( $pgTitle, 'OBJECT', $postType );
    if ($pg !== null) { $qty = 1; }
    return $qty;
}

