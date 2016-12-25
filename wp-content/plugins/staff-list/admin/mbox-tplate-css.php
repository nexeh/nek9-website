<?php
function abcfsl_mbox_tplate_css( $tplateOptns ){

  echo  abcfl_html_tag('div','','inside hidden');

    $lstLayout = isset( $tplateOptns['_lstLayout'] ) ? esc_attr( $tplateOptns['_lstLayout'][0] ) : '0';
    $lstLayoutH = isset( $tplateOptns['_lstLayoutH'] ) ? esc_attr( $tplateOptns['_lstLayoutH'][0] ) : $lstLayout;
    $lstItemCls = isset( $tplateOptns['_lstItemCls'] ) ? esc_attr( $tplateOptns['_lstItemCls'][0] ) : '';
    $lstItemStyle = isset( $tplateOptns['_lstItemStyle'] ) ? esc_attr( $tplateOptns['_lstItemStyle'][0] ) : '';

    $lstTxtCntrCls = isset( $tplateOptns['_lstTxtCntrCls'] ) ? esc_attr( $tplateOptns['_lstTxtCntrCls'][0] ) : '';
    $lstTxtCntrStyle = isset( $tplateOptns['_lstTxtCntrStyle'] ) ? esc_attr( $tplateOptns['_lstTxtCntrStyle'][0] ) : '';

    $imgCenter = isset( $tplateOptns['_imgCenter'] ) ? esc_attr( $tplateOptns['_imgCenter'][0] ) : 'Y';
    $lstImgCls = isset( $tplateOptns['_lstImgCls'] ) ? esc_attr( $tplateOptns['_lstImgCls'][0] ) : '';
    $lstImgStyle = isset( $tplateOptns['_lstImgStyle'] ) ? esc_attr( $tplateOptns['_lstImgStyle'][0] ) : '';

    switch ($lstLayoutH) {
        case 1:
            abcfsl_mbox_tplate_css_item_cntr_list( $lstItemCls, $lstItemStyle );
            abcfsl_mbox_tplate_css_img_cntr( $imgCenter, $lstImgCls, $lstImgStyle, 'staff-list-img-cntr.png' );
            abcfsl_mbox_tplate_css_txt_cntr_list( $lstTxtCntrCls, $lstTxtCntrStyle );
            break;
        default:
            break;
    }
    echo abcfl_html_tag_end('div');
}
//=============================================================================
//Section header
function abcfsl_mbox_tplate_css_section_hdr( $iconName, $lblID, $helpID, $hline = true, $hlineH = '2' ){

    $src = ABCFSL_PLUGIN_URL . 'images/' . $iconName;

    if( $hline ){ echo abcfl_input_hline($hlineH); }

    echo abcfl_html_tag_cls(  'div', 'abcflPosRel', false );
    echo abcfl_html_tag( 'div', '', 'abcflFloatL abcflPTop2 abcflLineH1' );
        echo abcfl_html_img_tag('', $src, '', '');
    echo abcfl_html_tag_end('div');

    echo abcfl_html_tag( 'div', '', 'abcflFloatL abcflPLeft20' );
        echo abcfl_input_info_lbl(abcfsl_txta($lblID), 'abcflMTop10', 16, 'SB');
        echo abcfl_input_info_lbl(abcfsl_txta($helpID), 'abcflMTop5', 12, 'SB');
    echo abcfl_html_tag_end('div');

    echo abcfl_html_tag_cls(  'div', 'abcflClr', true );
    echo abcfl_html_tag_end('div');
}

//LIST Item Style Container.
function abcfsl_mbox_tplate_css_item_cntr_list( $lstItemCls, $lstItemStyle ){

    abcfsl_mbox_tplate_css_section_hdr( 'staff-list-item-cntr.png', 301, 0 );
    abcfsl_mbox_tplate_css_style_and_class( 'lstItemCls', $lstItemCls, 'lstItemStyle', $lstItemStyle);
}

//Image Style Container.
function abcfsl_mbox_tplate_css_img_cntr( $imgCenter, $lstImgCls, $lstImgStyle, $icon ){

    abcfsl_mbox_tplate_css_section_hdr( $icon, 43, 0 );
    abcfsl_util_center_yn( 'imgCenter', $imgCenter, 84, 0 );
    abcfsl_mbox_tplate_css_style_and_class( 'lstImgCls', $lstImgCls, 'lstImgStyle', $lstImgStyle, 243);
}

//Text Style Container.
function abcfsl_mbox_tplate_css_txt_cntr_list( $txtCntrCls, $txtCntrStyle ){

    abcfsl_mbox_tplate_css_section_hdr( 'staff-list-txt-cntr.png', 251, 0 );
    abcfsl_mbox_tplate_css_style_and_class( 'lstTxtCntrCls', $txtCntrCls, 'lstTxtCntrStyle', $txtCntrStyle, 252);
}

//Style and Class.
function abcfsl_mbox_tplate_css_style_and_class( $clsName, $clsValue, $styleName, $styleValue, $helpCls=223, $helpStyle=224){

    echo abcfl_input_txt($clsName, '', $clsValue, abcfsl_txta(323), abcfsl_txta($helpCls), '50%', '', '', 'abcflFldCntr', 'abcflFldLbl');
    echo abcfl_input_txt($styleName, '', $styleValue, abcfsl_txta(289), abcfsl_txta($helpStyle), '50%', '', '', 'abcflFldCntr', 'abcflFldLbl');
}











