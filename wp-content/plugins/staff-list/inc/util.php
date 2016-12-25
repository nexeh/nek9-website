<?php
function abcfsl_util_center_yn( $fieldName, $aCenter, $lbl=83, $hlp=262 ){

    $cboYN = abcfsl_cbo_yn();
    echo abcfl_input_cbo( $fieldName, '',$cboYN, $aCenter, abcfsl_txta($lbl), abcfsl_txta($hlp), '50%', true, '', '', 'abcflFldCntr', 'abcflFldLbl' );
}

function abcfsl_util_center_cls( $aCenterYN, $clsPfix ){
    $out = '';
    if( $aCenterYN == 'Y' ) { $out = ' ' . $clsPfix . 'MLRAuto'; }
    return $out;
}

//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

//Get fieldOrder meta. Convert saved meta to array.
function abcfsl_util_field_order( $tplateOptns ){

    $fieldOrder = isset( $tplateOptns['_fieldOrder'] ) ? $tplateOptns['_fieldOrder'][0] : '';

    if(empty($fieldOrder)){
        for ( $i = 1; $i <= 10; $i++ ) { $fieldOrder[$i] = 'F' . $i; }
    }
    else{
        $fieldOrder = unserialize($fieldOrder);

        // Array has duplicates
        if(count(array_unique($fieldOrder))<count($fieldOrder)){
            $fieldOrderU = array_unique($fieldOrder);
            $fieldOrder = array_combine(range(1, count($fieldOrderU)), array_values($fieldOrderU));
        }
    }

    //echo"<pre>", print_r($fieldOrder), "</pre>";
    //[1] => F1 [2] => F4 [3] => F5
    return $fieldOrder;
}

//Get href parts: url + link text.
function abcfsl_util_href_bldr( $itemOptns, $F ){

    $lineUrl = isset( $itemOptns['_url_' . $F] ) ? esc_attr( $itemOptns['_url_' . $F][0] ) : '';
    $lineTxt = isset( $itemOptns['_urlTxt_' . $F] ) ? esc_attr( $itemOptns['_urlTxt_' . $F][0] ) : '';
    if(abcfl_html_isblank($lineTxt)) { $lineTxt = $lineUrl; }

    $href['hrefUrl'] = $lineUrl;
    $href['hrefTxt'] = $lineTxt;
    return $href;
}

function abcfsl_util_img_alt( $imgID ){

    $imgMeta = '';
    if($imgID > 0){ $imgMeta = get_post_meta($imgID, '_wp_attachment_image_alt', true); }

    return $imgMeta;
}

//Return class name or empty string. Useg for cbos Class: None, Custom or Selected.
function abcfsl_util_cls_name_nc_bldr( $optnValue, $clsBaseName, $clsPfix, $default='' ){

    if( $optnValue == 'N' || $optnValue == 'C'|| $optnValue == 'D' ){ return ''; }
    if( empty( $optnValue ) ) { $optnValue = $default; }
    if( empty( $optnValue) ) { return ''; }
    return $clsPfix . $clsBaseName . $optnValue;
}