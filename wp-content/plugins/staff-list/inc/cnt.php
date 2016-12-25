<?php
/*
 * TEXT FIELD BUILDER. Used by all layouts
 * Returns single text field (container + content).
 */

//Returns single text field (container + content).
function abcfsl_cnt_txt_field( $itemOptns, $tplateOptns, $itemID, $F, $clsPfix ){
    //Return if field is not selected.
    $fieldType = isset( $tplateOptns['_fieldType_' . $F] ) ? esc_attr( $tplateOptns['_fieldType_' . $F][0] ) :'N';
    if($fieldType == 'N'){ return ''; }

    //Return if field is hidden.
    $showField = isset( $tplateOptns['_showField_' . $F] ) ? esc_attr( $tplateOptns['_showField_' . $F][0] ) : 'L';

    $show = true;
    switch ($showField){
        case 'L': //List only
            $show = true;
            break;
        case 'H': //Hide
            $show = false;
             break;
       default:
            break;
    }

    if(!$show){ return ''; }

    //Field container class.
    $tagCustomCls = isset( $tplateOptns['_tagCls_' . $F] ) ? esc_attr( $tplateOptns['_tagCls_' . $F][0] ) : '';
    //Top margin. Class name or empty string if Default or Custom selected.
    $tagMarginT = abcfsl_util_cls_name_nc_bldr( isset( $tplateOptns['_tagMarginT_' . $F] ) ? esc_attr( $tplateOptns['_tagMarginT_' . $F][0] ) : 'N', 'MT', $clsPfix );
    //Font Size. Class name or empty string if Default or Custom selected.
    $tagFont = abcfsl_util_cls_name_nc_bldr( isset( $tplateOptns['_tagFont_' . $F] ) ? esc_attr( $tplateOptns['_tagFont_' . $F][0] ) : 'D', 'F', $clsPfix );
    $tagCls = ltrim ( $tagMarginT . ' ' . $tagFont . ' ' . $tagCustomCls );

    $href = abcfsl_util_href_bldr( $itemOptns, $F );

    //'lineTxt'  => isset( $itemOptns['_txt_' . $F] ) ? esc_attr( $itemOptns['_txt_' . $F][0] ) : '',

    $par = array(
        'tagType' => isset( $tplateOptns['_tagType_' . $F] ) ? esc_attr( $tplateOptns['_tagType_' . $F][0] ) : 'div',
        'tagCls' => $tagCls,
        'tagStyle' => isset( $tplateOptns['_tagStyle_' . $F] ) ? esc_attr( $tplateOptns['_tagStyle_' . $F][0] ) : '',
        'lnkCls' => isset( $tplateOptns['_lnkCls _' . $F] ) ? esc_attr( $tplateOptns['_lnkCls_' . $F][0] ) : '',
        'lnkStyle' => isset( $tplateOptns['_lnkStyle_' . $F] ) ? esc_attr( $tplateOptns['_lnkStyle_' . $F][0] ) : '',
        'lblTxt' => isset( $tplateOptns['_lblTxt_' . $F] ) ? esc_attr( $tplateOptns['_lblTxt_' . $F][0] ) : '',
        'lblCls' => isset( $tplateOptns['_lblCls_' . $F] ) ? esc_attr( $tplateOptns['_lblCls_' . $F][0] ) : '',
        'lblStyle' => isset( $tplateOptns['_lblStyle_' . $F] ) ? esc_attr( $tplateOptns['_lblStyle_' . $F][0] ) : '',
        'txtCls' => isset( $tplateOptns['_txtCls_' . $F] ) ? esc_attr( $tplateOptns['_txtCls_' . $F][0] ) : '',
        'txtStyle' => isset( $tplateOptns['_txtStyle_' . $F] ) ? esc_attr( $tplateOptns['_txtStyle_' . $F][0] ) : '',

        'lineTxt'  => isset( $itemOptns['_txt_' . $F] ) ? $itemOptns['_txt_' . $F][0] : '',
        'editorCnt'  => isset( $itemOptns['_editorCnt_' . $F] ) ? esc_attr( $itemOptns['_editorCnt_' . $F][0] ) : '',
        'hrefUrl' => $href['hrefUrl'],
        'hrefTxt' => $href['hrefTxt'],
        'F' => $F,
        'itemID'  => $itemID
    );

    $out = '';
    switch ($fieldType){
        case 'T': //Text
        case 'PT': //Paragraph Text
            $out = abcfsl_cnt_txt_field_T( $par );
            break;
        case 'H': //Hyperlink
            $out = abcfsl_cnt_txt_field_H( $par );
            break;
        case 'EM': //Email
            $out = abcfsl_cnt_txt_field_EM( $par );
            break;
       default:
            break;
    }
    return $out;
}
//------------------------------------------------------------------------
//Text
function abcfsl_cnt_txt_field_T($par){

    $lineTxt = $par['lineTxt'];
    if(abcfl_html_isblank($lineTxt)) { return ''; }

    $cntrS = abcfl_html_tag( $par['tagType'], '', $par['tagCls'], $par['tagStyle'] );
    $cntrE = abcfl_html_tag_end( $par['tagType']);

    return $cntrS . $lineTxt . $cntrE;
}

//Hyperlink
function abcfsl_cnt_txt_field_H( $par ){
    $cntrS = abcfl_html_tag( $par['tagType'], '', $par['tagCls'], $par['tagStyle'] );
    $cntrE = abcfl_html_tag_end( $par['tagType']);

    $url = $par['hrefUrl'];
    $link = abcfl_html_a_tag($url, $par['hrefTxt'], '0', $par['lnkCls'], $par['lnkStyle'], '', false);

    return $cntrS . $link . $cntrE;
}

//Email
function abcfsl_cnt_txt_field_EM( $par ){

    $cntrS = abcfl_html_tag( $par['tagType'], '', $par['tagCls'], $par['tagStyle'] );
    $cntrE = abcfl_html_tag_end( $par['tagType']);
    $url = $par['hrefUrl'];
    $urlTxt = $par['hrefTxt'];
    if(empty($url)){ return ''; }
    if(empty($urlTxt)){ return $urlTxt = $url; }
    $url = 'mailto:' . $url;

    $link = abcfl_html_a_tag($url, $urlTxt, '0', $par['lnkCls'], $par['lnkStyle'], '', false);
    return $cntrS . $link . $cntrE;
}

//== TEXT FIELDS END ===========================================================

//DIV container: content, text and image.
function abcfsl_cnt_generic_div($clsPfix, $baseCls, $customCls, $customStyle, $bkgColor, $divID, $itemID, $addItemCls){

    $cntrCls = $clsPfix . $baseCls;
    $itemCls = '';
    if($addItemCls == 'Y'){ $itemCls = ' ' . $cntrCls . '_' . $itemID; }

    $cntrCls =  $cntrCls . ' ' . $customCls . $itemCls;

    $div['cntrS'] = abcfl_html_tag( 'div', $divID, $cntrCls, $customStyle );
    $div['cntrE'] = abcfl_html_tag_end( 'div');

    return $div;
}

//IMAGE container.
function abcfsl_cnt_image_cntr( $lstLayout, $itemID, $tplateOptns, $itemOptns, $colL, $clsPfix, $vAid, $addItemCls ){

    $imgUrl = isset( $itemOptns['_imgUrlL'] ) ? esc_attr( $itemOptns['_imgUrlL'][0] ) : '';
    if(empty($imgUrl)){ return ''; }

    $lstImgCls = isset( $tplateOptns['_lstImgCls'] ) ? esc_attr( $tplateOptns['_lstImgCls'][0] ) : $clsPfix . 'ImgCenter';

    $lstImgStyle = isset( $tplateOptns['_lstImgStyle'] ) ? esc_attr( $tplateOptns['_lstImgStyle'][0] ) : '';
    //List img ID.
    $imgIDL = isset( $itemOptns['_imgIDL'] ) ? esc_attr( $itemOptns['_imgIDL'][0] ) : 0;
    $alt = abcfsl_util_img_alt( $imgIDL );

    $imgTag = abcfl_html_img_tag('', $imgUrl, $alt, '', '', '', $lstImgCls, $lstImgStyle);

    $bkgColor = 0;
    if($vAid == 'Y') { $bkgColor = 1; }

    $div['cntrS'] = '';
    $div['cntrE'] = '';
    switch ($lstLayout) {
        case 1:
            $div = abcfsl_cnt_list_item_section_cntr_1($colL, $clsPfix, 'Lst1Img', '', '', $itemID, $bkgColor, $addItemCls);
            break;
        default:
            break;
    }

    return $div['cntrS'] . $imgTag . $div['cntrE'];
}



