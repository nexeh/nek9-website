<?php
//Render  content.
function abcfsl_cnt_list($scodeArgs){

    $clsPfix = $scodeArgs['prefix'];
    $pversion = $scodeArgs['pversion'];
    $tplateID = $scodeArgs['id'];
    $tplateOptns = get_post_custom( $tplateID );

    $lstCntrW = isset( $tplateOptns['_lstCntrW'] ) ? esc_attr( $tplateOptns['_lstCntrW'][0] ) : '';
    $lstACenter = isset( $tplateOptns['_lstACenter'] ) ? esc_attr( $tplateOptns['_lstACenter'][0] ) : 'Y';
    //$lstCntrTM = isset( $tplateOptns['_lstCntrTM'] ) ? esc_attr( $tplateOptns['_lstCntrTM'][0] ) : '';
    $lstCntrCls = isset( $tplateOptns['_lstCntrCls'] ) ? esc_attr( $tplateOptns['_lstCntrCls'][0] ) : $clsPfix . 'LstCntrBB';
    $lstCntrStyle = isset( $tplateOptns['_lstCntrStyle'] ) ? esc_attr( $tplateOptns['_lstCntrStyle'][0] ) : '';

    $lstImgCls = isset( $tplateOptns['_lstImgCls'] ) ? esc_attr( $tplateOptns['_lstImgCls'][0] ) : $clsPfix . 'ImgCenter';
    $tplateOptns['_lstImgCls'] = array($lstImgCls);

    //List items
    $listItems = abcfsl_cnt_list_items_html( $tplateID, $tplateOptns, $clsPfix );

    //==========================================
    //Plugin container div
    $cntCntrStyle = abcfl_css_w_responsive($lstCntrW, $lstCntrW) . $lstCntrStyle;
    $centerCls = abcfsl_util_center_cls( $lstACenter, $clsPfix );
    $cntCntrCustomCls = $lstCntrCls . $centerCls . ' ' . $clsPfix . '_v' . $pversion;
    $lstCntr = abcfsl_cnt_generic_div($clsPfix, 'LstCntr', $cntCntrCustomCls, $cntCntrStyle, '', '', $tplateID, 'Y', false);

    //====================================

    //Return List container + all items.
    return $lstCntr['cntrS'] . $listItems . $lstCntr['cntrE'];
}

//List Items builder.
function abcfsl_cnt_list_items_html( $parentID, $tplateOptns, $clsPfix ){

    $listItems  = '';
    $lstItemDefaultCls = $clsPfix . 'PadBMB30';

    $colL = isset( $tplateOptns['_lstCols'] ) ? esc_attr( $tplateOptns['_lstCols'][0] ) : '6';
    $colR = (12 - $colL);
    $vAid = isset( $tplateOptns['_vAid'] ) ? esc_attr( $tplateOptns['_vAid'][0] ) : 'N';

    $lstItemCustomCls = isset( $tplateOptns['_lstItemCls'] ) ? esc_attr( $tplateOptns['_lstItemCls'][0] ) : $lstItemDefaultCls;
    $lstItemStyle = isset( $tplateOptns['_lstItemStyle'] ) ? esc_attr( $tplateOptns['_lstItemStyle'][0] ) : '';

    //Add item class ? TODO
    $addItemCls = isset( $tplateOptns['_icls'] ) ? esc_attr( $tplateOptns['_icls'][0] ) : 'N';
    $lstLayout = isset( $tplateOptns['_lstLayout'] ) ? esc_attr( $tplateOptns['_lstLayout'][0] ) : '1';

    $postIDs = abcfsl_db_list_item_ids($parentID);

    //1.Image left, text right;
    if ( $postIDs ) {
        foreach ( $postIDs as $itemID ) {
            switch ($lstLayout) {
                case 1:
                    $listItems .= abcfsl_cnt_list_item_cntr_1($itemID, $tplateOptns, $colL, $colR, $vAid, $lstItemCustomCls, $lstItemStyle, $clsPfix, $lstLayout, $addItemCls);
                    break;
                default:
                    break;
            }
        }
   }
   return $listItems;
}

//--LAYOUT 1.---------------------------------------------------------------------------------------
//ITEM container: Image left, text right.
function abcfsl_cnt_list_item_cntr_1( $itemID, $tplateOptns, $colL, $colR, $vAid, $lstItemCustomCls, $lstItemStyle, $clsPfix, $lstLayout, $addItemCls ){

    $div = abcfsl_cnt_list_item_cntr_div( $itemID, $lstItemCustomCls, $lstItemStyle, $clsPfix, $lstLayout, $addItemCls );
    $itemOptns = get_post_custom( $itemID );

    $imgCntr = abcfsl_cnt_image_cntr( $lstLayout, $itemID, $tplateOptns, $itemOptns, $colL, $clsPfix, $vAid, $addItemCls );
    $itemLinesCntr = abcfsl_cnt_list_item_txt_cntr_1( $itemID, $itemOptns, $tplateOptns, $colR, $clsPfix, $vAid, $addItemCls );

    return $div['itemCntrS'] . $imgCntr . $itemLinesCntr . $div['itemCntrE'];
}

//TEXT container. All text lines for a single record.
function abcfsl_cnt_list_item_txt_cntr_1( $itemID, $itemOptns, $tplateOptns, $colSize, $clsPfix, $vAid, $addItemCls ){

    $itemLinesHTML  = '';
    $bkgColor = 0;
    if($vAid == 'Y') { $bkgColor = 2; }

    $lstTxtCntrCustomCls = isset( $tplateOptns['_lstTxtCntrCls'] ) ? esc_attr( $tplateOptns['_lstTxtCntrCls'][0] ) : $clsPfix . 'PadLPc5';
    $lstTxtCntrCustomStyle = isset( $tplateOptns['_lstTxtCntrStyle'] ) ? esc_attr( $tplateOptns['_lstTxtCntrStyle'][0] ) : '';

    $custCls = $lstTxtCntrCustomCls;

    $div = abcfsl_cnt_list_item_section_cntr_1($colSize, $clsPfix, 'Lst1Txt', $custCls, $lstTxtCntrCustomStyle, $itemID, $bkgColor, $addItemCls);

    //List of all fields in sort order. Get all text lines for a single record.
    $lineSort = abcfsl_util_field_order( $tplateOptns );
    foreach ( $lineSort as $F ) {
        $itemLinesHTML .= abcfsl_cnt_txt_field($itemOptns, $tplateOptns, $itemID, $F, $clsPfix);
    }
    return $div['cntrS'] . $itemLinesHTML . $div['cntrE'];
}

//DIV. Item section container. Used by Image and Text.
function abcfsl_cnt_list_item_section_cntr_1($colSize, $clsPfix, $colBaseCls, $customCls, $customStyle, $itemID, $bkgColor, $addItemCls){

    $colCls = ' ' . $clsPfix . $colBaseCls . 'Col';
    $itemCls = '';
    if($addItemCls == 'Y'){ $itemCls = ' ' . $colCls . '_' . $itemID; }
    if(!empty($customCls)){ $customCls = ' ' . $customCls; }

    $colCls = $clsPfix . 'LstCol ' . $clsPfix . 'LstCol-' . $colSize . $colCls . $itemCls;
    $colS = abcfl_html_tag( 'div', '', $colCls, '' );
    $cntrS = abcfl_html_tag( 'div', '', $clsPfix . $colBaseCls . 'Cntr' . $customCls, $customStyle );

    $div['cntrS'] = $colS . $cntrS;
    $div['cntrE'] = abcfl_html_tag_ends( 'div,div');

    return $div;
}

//====Used by 1 and 2 ============================================================
function abcfsl_cnt_list_item_cntr_div( $itemID, $customCls, $lstItemStyle, $clsPfix, $lstLayout, $addItemCls ){

    $itemCls = '';
    $clr = '';
    if(!empty($customCls)){ $customCls = ' ' . $customCls; }
    if($lstLayout == 1){ $clr = ' abcfClrFix'; }
    if($addItemCls == 'Y'){ $itemCls = ' ' . $clsPfix . 'LstRowCntr_' . $itemID; }

    //Item container DIV
    $div['itemCntrS'] = abcfl_html_tag( 'div', '', $clsPfix . 'LstRowCntr' . $customCls . $clr . $itemCls, $lstItemStyle );
    $div['itemCntrE'] = abcfl_html_tag_end( 'div');

    return $div;
}

//    // TODO
//    $lstCntrW = abcfl_css_w_responsive($lstCntrW, $lstCntrW) . abcfl_css_mt($lstCntrTM) . $lstCntrStyle;
//
//    $bkgColor = 0;
//    if($vAid == 'Y') { $bkgColor = 3; }
//
//    //Plugin container
//    $lstCntrCustomCls = $lstCntrCustomCls . ' ' . $clsPfix . '_' . $pversion;
//    $lstCntr = abcfsl_cnt_generic_div($clsPfix, 'LstCntr', $lstCntrCustomCls, $lstCntrStyle, $bkgColor, '', $tplateID, 'Y');