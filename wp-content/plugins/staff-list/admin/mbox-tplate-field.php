<?php
//Field options for a single field (F)
//function abcfsl_mbox_tplate_field( $tplateOptns, $F, $order ){
//Fatal error: Call to undefined function abcfsl_mbox_tplate_field_labels_hdr() in C:\UniServer\www\blog\wp-content\plugins\abcfolio-staff-list\admin\mbox-tplate-field.php on line 96

function abcfsl_mbox_tplate_field( $tplateOptns, $F ){

//    if($order == 1 || $order == 11 ) {echo  abcfl_html_tag('div','','inside');}
//    else {echo  abcfl_html_tag('div','','inside  hidden');}

    if( $F == 'F1' ) {echo  abcfl_html_tag('div','','inside');}
    else {echo  abcfl_html_tag('div','','inside hidden');}

    $fieldType = isset( $tplateOptns['_fieldType_' . $F] ) ? esc_attr( $tplateOptns['_fieldType_' . $F][0] ) : 'N';
    $fieldTypeH = isset( $tplateOptns['_fieldTypeH_' . $F] ) ? esc_attr( $tplateOptns['_fieldTypeH_' . $F][0] ) : 'N';

    //-- Field type not selected. Display only Add New Field cbo ------------------------------------------------------------------------
    if($fieldType == 'N'){
        abcfsl_mbox_tplate_field_add_field_cbo( $fieldType, $F );
        echo abcfl_html_tag_end('div');
        return;
    }

    $showField = isset( $tplateOptns['_showField_' . $F] ) ? esc_attr( $tplateOptns['_showField_' . $F][0] ) : 'L';
    $fieldLocked = isset( $tplateOptns['_fieldLocked_' . $F] ) ? esc_attr( $tplateOptns['_fieldLocked_' . $F][0] ) : '0';
    $showAll = isset( $tplateOptns['_showAll_' . $F] ) ? esc_attr( $tplateOptns['_showAll_' . $F][0] ) : '0';

    //Line container
    $tagType = isset( $tplateOptns['_tagType_' . $F] ) ? esc_attr( $tplateOptns['_tagType_' . $F][0] ) : 'div';
    $tagFont = isset( $tplateOptns['_tagFont_' . $F] ) ? esc_attr( $tplateOptns['_tagFont_' . $F][0] ) : 'D';
    $tagMarginT = isset( $tplateOptns['_tagMarginT_' . $F] ) ? esc_attr( $tplateOptns['_tagMarginT_' . $F][0] ) : 'N';
    $tagCls = isset( $tplateOptns['_tagCls_' . $F] ) ? esc_attr( $tplateOptns['_tagCls_' . $F][0] ) : '';
    $tagStyle = isset( $tplateOptns['_tagStyle_' . $F] ) ? esc_attr( $tplateOptns['_tagStyle_' . $F][0] ) : '';

    //Hyperlink & Email
    $inputLbl = isset( $tplateOptns['_inputLbl_' . $F] ) ? esc_attr( $tplateOptns['_inputLbl_' . $F][0] ) : '';
    $inputLinkLblLbl = isset( $tplateOptns['_lnkLblLbl_' . $F] ) ? esc_attr( $tplateOptns['_lnkLblLbl_' . $F][0] ) : '';
    $inputLinkUrlLbl = isset( $tplateOptns['_lnkUrlLbl_' . $F] ) ? esc_attr( $tplateOptns['_lnkUrlLbl_' . $F][0] ) : '';

    $advancedStyle = 'display: none;';
    if($showAll==1){ $advancedStyle = 'display: block;'; }

    //------------------------------------------------------------------------------
    //Field name & hidden Field Type
    abcfsl_mbox_tplate_field_number_and_datatype($fieldTypeH, $F);
    abcfsl_mbox_tplate_field_lock($showField, $fieldLocked, $F );

    //Field type (hidden value).
    switch ($fieldTypeH){
        case 'T':
            abcfsl_mbox_tplate_field_data_entry_optns_hdr();
            abcfsl_mbox_tplate_field_input_field_name( $inputLbl,$F, 208, 282, 'inputLbl_');
            //------------------------------------------------
            abcfsl_mbox_tplate_field_data_display_optns_hdr();
            abcfsl_mbox_tplate_field_show_field( $showField, $F );
            abcfsl_mbox_tplate_field_field_cntr_type( $tagType, $F, 'tagType_' );
            abcfsl_mbox_gallery_field_font( 'tagFont_', $tagFont, $F );
            abcfsl_mbox_gallery_field_margin_t( 'tagMarginT_', $tagMarginT, $F );
            abcfsl_mbox_tplate_field_class_and_style( $tagCls, $tagStyle, $F, 323, 289, 'tagCls_', 'tagStyle_' );
            //------------------------------------------------
            //abcfsl_mbox_tplate_field_data_entry_optns_hdr();
            //abcfsl_mbox_tplate_field_input_field_name( $inputLbl,$F, 208, 282, 'inputLbl_');
            break;
        case 'PT':
            abcfsl_mbox_tplate_field_data_entry_optns_hdr();
            abcfsl_mbox_tplate_field_input_field_name( $inputLbl,$F, 208, 282, 'inputLbl_');
            //------------------------------------------------
            abcfsl_mbox_tplate_field_data_display_optns_hdr();
            abcfsl_mbox_tplate_field_show_field( $showField, $F );
            //abcfsl_mbox_tplate_field_cntr_spg( $fieldCntrSPg, $F );
            //---------------------------------
            //abcfsl_mbox_tplate_field_style_hdr();
            abcfsl_mbox_tplate_field_field_cntr_type( $tagType, $F, 'tagType_' );
            abcfsl_mbox_gallery_field_font( 'tagFont_', $tagFont, $F );
            abcfsl_mbox_gallery_field_margin_t( 'tagMarginT_', $tagMarginT, $F );
            //----------------------------------
//            abcfsl_mbox_tplate_field_style_hdr_spg();
//            abcfsl_mbox_tplate_field_tag_type_spg( $tagTypeSPg, $F );
//            abcfsl_mbox_gallery_field_font_spg( $tagFontSPg, $F );
//            abcfsl_mbox_tplate_field_txt_margin_t_spg( $tagMarginTSPg, $F );
            //----------------------------------
            abcfsl_mbox_tplate_field_class_and_style( $tagCls, $tagStyle, $F, 323, 289, 'tagCls_', 'tagStyle_' );
            break;
        case 'H': //Hyperlink
            abcfsl_mbox_tplate_field_data_entry_optns_hdr();
            abcfsl_mbox_tplate_field_input_field_link_hdr();
            abcfsl_mbox_tplate_field_input_field_name( $inputLinkLblLbl, $F, 205, 282, 'lnkLblLbl_' );
            abcfsl_mbox_tplate_field_input_field_name( $inputLinkUrlLbl, $F, 302, 282, 'lnkUrlLbl_' );
            abcfsl_mbox_tplate_field_data_display_optns_hdr();
            abcfsl_mbox_tplate_field_show_field( $showField, $F );
            abcfsl_mbox_tplate_field_field_cntr_type( $tagType, $F, 'tagType_');
            abcfsl_mbox_gallery_field_font( 'tagFont_', $tagFont, $F );
            abcfsl_mbox_gallery_field_margin_t( 'tagMarginT_', $tagMarginT, $F );
            abcfsl_mbox_tplate_field_class_and_style( $tagCls, $tagStyle, $F, 323, 289, 'tagCls_', 'tagStyle_' );
            //------------------------------------------------
            abcfsl_mbox_tplate_field_data_entry_optns_hdr();
            abcfsl_mbox_tplate_field_input_field_link_hdr();
            break;
        case 'EM': //Email
            abcfsl_mbox_tplate_field_data_entry_optns_hdr();
            abcfsl_mbox_tplate_field_input_field_email_hdr();
            abcfsl_mbox_tplate_field_input_field_name( $inputLinkLblLbl, $F, 205, 282, 'lnkLblLbl_' );
            abcfsl_mbox_tplate_field_input_field_name( $inputLinkUrlLbl, $F, 300, 282, 'lnkUrlLbl_' );
            abcfsl_mbox_tplate_field_data_display_optns_hdr();
            abcfsl_mbox_tplate_field_show_field( $showField, $F );
            abcfsl_mbox_tplate_field_field_cntr_type( $tagType, $F, 'tagType_');
            abcfsl_mbox_gallery_field_font( 'tagFont_', $tagFont, $F );
            abcfsl_mbox_gallery_field_margin_t( 'tagMarginT_', $tagMarginT, $F );
            abcfsl_mbox_tplate_field_class_and_style( $tagCls, $tagStyle, $F, 323, 289, 'tagCls_', 'tagStyle_' );
            //------------------------------------------------
//            abcfsl_mbox_tplate_field_data_entry_optns_hdr();
//            abcfsl_mbox_tplate_field_input_field_email_hdr();
//            abcfsl_mbox_tplate_field_input_field_name( $inputLinkLblLbl, $F, 205, 282, 'lnkLblLbl_' );
//            abcfsl_mbox_tplate_field_input_field_name( $inputLinkUrlLbl, $F, 300, 282, 'lnkUrlLbl_' );
            break;

       default:
            break;
    }
echo abcfl_html_tag_end('div');
}

//== LABELS ==================================================================================
//Add new field
function abcfsl_mbox_tplate_field_add_field_cbo( $fieldType, $F ){
    echo abcfl_input_info_lbl(abcfsl_txta(320), 'abcflMTop15', 16, 'SB');
    $cboLineType = abcfsl_cbo_field_type();
    echo abcfl_input_cbo('fieldType_' . $F, '',$cboLineType, $fieldType, abcfsl_txta(222), abcfsl_txta(212), '50%', true, '', '', 'abcflFldCntr', 'abcflFldLbl');
}

//Field number and datatype
function abcfsl_mbox_tplate_field_number_and_datatype( $fieldTypeH, $F ){

    $cboLineType = abcfsl_cbo_field_type();
    $fieldType = $cboLineType[$fieldTypeH] . '.';

    echo abcfl_input_info_lbl( $F. '.&nbsp;&nbsp;' . $fieldType, 'abcflGreen abcflMTop15', '20', 'SB' );
    //echo abcfl_input_info_lbl(abcfsl_txta(285), 'abcflMTop10 abcflMBottom20 abcflGreen', 12);
    echo abcfl_input_hidden( '', 'fieldTypeH_' . $F, $fieldTypeH );
}

//Data Entry Options - labels
function abcfsl_mbox_tplate_field_data_entry_optns_hdr(){
    echo abcfl_input_hline('2', '20');
    //echo abcfl_input_info_lbl(abcfsl_txta(319), 'abcflMTop15', '16', 'SB');
}

//Data Display Options - labels
function abcfsl_mbox_tplate_field_data_display_optns_hdr(){
    echo abcfl_input_hline('2', '20');
    echo abcfl_input_info_lbl(abcfsl_txta(286), 'abcflMTop15', '16', 'SB');
}

//Input field: Hyperlink Header
function abcfsl_mbox_tplate_field_input_field_link_hdr(){
    echo abcfl_input_info_lbl(abcfsl_txta(230), 'abcflMTop15', 12);
}

//Input field: Email Header
function abcfsl_mbox_tplate_field_input_field_email_hdr(){
    echo abcfl_input_info_lbl(abcfsl_txta(200), 'abcflMTop15', 12);
}

function abcfsl_mbox_tplate_field_section_title( $titleTxt, $F, $advancedStyle ){

    echo  abcfl_html_tag('div','','abcfslAllOptns_' . $F, $advancedStyle);
        echo abcfl_input_hline('2');
        echo abcfl_input_info_lbl(abcfsl_txta($titleTxt), 'abcflMTop15', 16, 'SB');
    echo abcfl_html_tag_end('div');
}

//== FIELDS =========================================================================================
function abcfsl_mbox_tplate_field_lock($showField, $fieldLocked, $F ){

    if($showField == 'N'){ return;}

    $clsBoxlbl = '';
    $boxLbl = abcfsl_txta(296);
    if($fieldLocked == '1'){
        $clsBoxlbl = 'abcflBBRed';
        $boxLbl = abcfsl_txta(297);
    }
    echo abcfl_input_checkbox('lineLocked_'. $F,  '', $fieldLocked, $boxLbl, '', '', '', 'abcflFldCntr', '', '', $clsBoxlbl );
}

function abcfsl_mbox_tplate_field_show_field( $showField, $F ){
    $cboYNnls = abcfsl_cbo_show_field();
    echo abcfl_input_cbo('showField_' . $F, '',$cboYNnls, $showField, abcfsl_txta_reqired(219, '', true), abcfsl_txta(233), '50%', true, '', '', 'abcflFldCntr', 'abcflFldLbl');
}

//Field container type
function abcfsl_mbox_tplate_field_field_cntr_type( $tagType, $F, $typeL='tagType_'){
    $cboTxtCntr = abcfsl_cbo_txt_cntr();
    echo abcfl_input_cbo($typeL . $F, '',$cboTxtCntr, $tagType, abcfsl_txta_reqired(287, '', true), abcfsl_txta(279), '50%', true, '', '', 'abcflFldCntr', 'abcflFldLbl');
}

//Input field name and help
function abcfsl_mbox_tplate_field_input_field_name( $inputLbl, $F, $name1, $help1, $lbl='inputLbl_'){
    echo abcfl_input_txt($lbl . $F, '', $inputLbl, abcfsl_txta_reqired($name1, '', true), abcfsl_txta($help1), '50%', '', '', 'abcflFldCntr', 'abcflFldLbl');
}

// TODO add style ?
function abcfsl_mbox_tplate_field_class_and_style( $clsInputID, $styleInputID, $F,  $clsLbl, $styleLbl, $clsInputName, $styleInputName ){
    echo abcfl_input_txt($clsInputName . $F, '', $clsInputID, abcfsl_txta($clsLbl), abcfsl_txta(223), '50%', '', '', 'abcflFldCntr', 'abcflFldLbl');
}

//Fonts
function abcfsl_mbox_gallery_field_font( $fieldName, $fielValue, $F, $help=207, $lbl=47 ){

    $cboFont = abcfsl_cbo_font_size();
    echo abcfl_input_cbo_strings($fieldName . $F, '', $cboFont, $fielValue, abcfsl_txta($lbl), abcfsl_txta( $help ), '50%', '', '', 'abcflFldCntr', 'abcflFldLbl');
}

//Top margin.
function abcfsl_mbox_gallery_field_margin_t( $fieldName, $fielValue, $F, $help=0, $lbl=15 ){

    $cboMarginTop = abcfsl_cbo_margin_top_field();
    echo abcfl_input_cbo_strings($fieldName . $F, '', $cboMarginTop, $fielValue, abcfsl_txta($lbl), abcfsl_txta($help), '50%', '', '', 'abcflFldCntr', 'abcflFldLbl');
}







