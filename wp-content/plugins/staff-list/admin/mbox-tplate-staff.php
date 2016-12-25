<?php

function abcfsl_mbox_tplate_staff( $tplateOptns ){

    //echo"<pre>", print_r($tplateOptns), "</pre>";  die;

    echo  abcfl_html_tag('div','','inside');
    $lstLayout = isset( $tplateOptns['_lstLayout'] ) ? esc_attr( $tplateOptns['_lstLayout'][0] ) : '0';
    $lstLayoutH = isset( $tplateOptns['_lstLayoutH'] ) ? esc_attr( $tplateOptns['_lstLayoutH'][0] ) : $lstLayout;

    $lstCntrW = isset( $tplateOptns['_lstCntrW'] ) ? esc_attr( $tplateOptns['_lstCntrW'][0] ) : '';
    $lstACenter = isset( $tplateOptns['_lstACenter'] ) ? esc_attr( $tplateOptns['_lstACenter'][0] ) : 'Y';
    //$lstCntrTM = isset( $tplateOptns['_lstCntrTM'] ) ? esc_attr( $tplateOptns['_lstCntrTM'][0] ) : '';
    $lstCntrCls = isset( $tplateOptns['_lstCntrCls'] ) ? esc_attr( $tplateOptns['_lstCntrCls'][0] ) : '';
    $lstCntrStyle = isset( $tplateOptns['_lstCntrStyle'] ) ? esc_attr( $tplateOptns['_lstCntrStyle'][0] ) : '';

    //-- ADD NEW Record Screen. Display only Add New Field cbo ------------------------------------------------------------------------
    if($lstLayoutH == '0'){
        abcfsl_mbox_tplate_staff_list_layout( $lstLayout );
        echo abcfl_html_tag_end('div');
        return;
    }

    $lstCols = isset( $tplateOptns['_lstCols'] ) ? esc_attr( $tplateOptns['_lstCols'][0] ) : '6';
    $gridCols = isset( $tplateOptns['_gridCols'] ) ? esc_attr( $tplateOptns['_gridCols'][0] ) : '2';

    //---------------------------
    echo abcfl_input_hidden( '', 'lstLayoutH', $lstLayoutH );

    switch ($lstLayoutH) {
        case 1:
            abcfsl_mbox_tplate_staff_list( $lstCols, $lstCntrW, $lstCntrCls, $lstCntrStyle, 'staff-list-pg.png', $lstACenter );
            break;
        default:
            break;
    }
    echo abcfl_html_tag_end('div');
}

//=====================================================================
//Layout selection: Rows or Grid
function abcfsl_mbox_tplate_staff_list_layout( $lstLayout ){

    $cboLstLayout = abcfsl_cbo_staff_pg_layout();
    echo abcfl_input_cbo('lstLayout', '',$cboLstLayout, $lstLayout, abcfsl_txta(213), '', '50%', true, '', '', 'abcflFldCntr', 'abcflFldLbl');
}
//LIST Content Container Style
function abcfsl_mbox_tplate_staff_list( $lstCols, $lstCntrW, $lstCntrCls, $lstCntrStyle, $icon, $lstACenter ){

    $cboCols = abcfsl_cbo_list_columns();
    abcfsl_mbox_tplate_css_section_hdr( $icon , 303, 215, false );
    echo abcfl_input_cbo('lstCols', '', $cboCols, $lstCols, abcfsl_txta_reqired(253, '', true), abcfsl_txta(308), '50%', true, '', '', 'abcflFldCntr', 'abcflFldLbl');
    echo abcfl_input_txt('lstCntrW', '', $lstCntrW, abcfsl_txta(48), abcfsl_txta(260), '50%', '', '', 'abcflFldCntr', 'abcflFldLbl');
    abcfsl_util_center_yn( 'lstACenter', $lstACenter );
    echo abcfl_input_hline('1');
    abcfsl_mbox_tplate_css_style_and_class( 'lstCntrCls', $lstCntrCls, 'lstCntrStyle', $lstCntrStyle, 224);
}

