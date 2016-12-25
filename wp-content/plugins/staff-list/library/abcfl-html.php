<?php
/**
 * HTML builders
 * Version 1.4.9
 *
 * abcfl_html_tag_cls
 * added abcfl_html_button_title
 *  * 1.4.9 added abcfl_html_img_tag_prop
*/
//== FORM ==========================================================
if ( !function_exists( 'abcfl_html_button_title' ) ){
    function abcfl_html_button_title($txt, $id, $cls, $style, $title, $domain='', $type = 'button'){
        $id = abcfl_html_css_id($id);
        $txt = $txt;
        if(!empty($title)) {$title = ' title="' . esc_html__( $title, $domain ) . '"';}
        $cls = abcfl_html_css_class($cls);
        $style = abcfl_html_css_style($style);
        return '<button type="' . $type . '" ' . $id . $cls . $style . $title . '>' . $txt . '</button>' ;
    }
}

if ( !function_exists( 'abcfl_html_button' ) ){
    function abcfl_html_button($txt, $id, $cls='', $style=''){
        $id = abcfl_html_css_id($id);
        $txt = $txt;
        $cls = abcfl_html_css_class($cls);
        $style = abcfl_html_css_style($style);
        return '<button type="button" ' . $id . $cls . $style . '>' . $txt . '</button>' ;
    }
}

//<form name="frmLicense" id="frm-license" method="POST" accept-charset="utf-8" >
if ( !function_exists( 'abcfl_html_form' ) ){
    function abcfl_html_form( $id, $name, $cls='', $style='', $microdata='' ){
        $id = abcfl_html_css_id($id);
        $name = 'name="' . $name . '"';
        $cls = abcfl_html_css_class($cls);
        $style = abcfl_html_css_style($style);
        return '<form ' . $name . ' method="POST" accept-charset="utf-8" ' . $id . $cls . $style . $microdata . '>';
    }
}

//== ID, CLASS, STYLE ========================================================
if ( !function_exists( 'abcfl_html_id_cls_style' ) ){
    function abcfl_html_id_cls_style( $id, $cls, $style ){
        $id = abcfl_html_css_id($id);
        $cls = abcfl_html_css_class($cls);
        $style = abcfl_html_css_style($style);
        return  $id . $cls . $style;
    }
}

if ( !function_exists( 'abcfl_html_css_id' ) ){
    function abcfl_html_css_id($in){
        if(empty($in)){ return ''; }
        return ' id="' . $in . '"';
    }
}

if ( !function_exists( 'abcfl_html_css_class' ) ){
    function abcfl_html_css_class($in){
        if(empty($in)){ return ''; }
        return ' class="' . trim($in) . '"';
    }
}

if ( !function_exists( 'abcfl_html_css_style' ) ){
    function abcfl_html_css_style( $style ) {
       if(abcfl_html_isblank($style)) { return ''; }
       return ' style="' . trim($style) . '"';
   }
}

//=== HTML Tags: DIV P SPAN ... ==================================
if ( !function_exists( 'abcfl_html_tag_simple' ) ){
    function abcfl_html_tag_simple( $tag, $attr, $empty = false ){
        if(empty($attr) && !$empty) { return '';}
        return '<' . trim($tag) . ' ' . trim($attr) . '>';
    }
}
if ( !function_exists( 'abcfl_html_tag_blank' ) ){
    function abcfl_html_tag_blank( $tag ){
        return '<' . trim($tag) . '>';
    }
}

//HTML tag. Only class. End tag option.
if ( !function_exists( 'abcfl_html_tag_cls' ) ){
    function abcfl_html_tag_cls( $tag, $cls, $closed=false ){
        $outS = '<' . trim($tag) . abcfl_html_css_class($cls) . '>';
        $outE = '';
        if($closed) { $outE = '</' . trim($tag) . '>'; }
        return $outS . $outE;
    }
}

if ( !function_exists( 'abcfl_html_tag' ) ){
    function abcfl_html_tag( $element, $id, $cls='', $style='', $microdata='' ){
        return '<' . trim($element . abcfl_html_css_id($id) . abcfl_html_css_class($cls) . abcfl_html_css_style($style) . $microdata) . '>';
    }
}

//Full tag with content. Tag Start + Content + Tag end.
if ( !function_exists( 'abcfl_html_tag_with_content' ) ){
    function abcfl_html_tag_with_content( $cnt, $tag, $id, $cls='', $style='', $microdata='', $empty=false ){

        if(abcfl_html_isblank($cnt) && !$empty) { return '';}
        $s = abcfl_html_tag( $tag, $id, $cls, $style, $microdata);
        $e = abcfl_html_tag_end($tag);
        return $s . $cnt . $e;
    }
}

if ( !function_exists( 'abcfl_html_tag_end' ) ){
    function abcfl_html_tag_end( $tag ){
       return '</' . trim($tag) . '>';
    }
}

//html tag ends: ('h2,div')
if ( !function_exists( 'abcfl_html_tag_ends' ) ){
    function abcfl_html_tag_ends( $tag ){
        $out = '';
        $tags = explode(',', $tag);
        foreach($tags as $val) {
            $out .= '</' . trim($val) . '>';
        }
       return $out;
    }
}

//== IMAGE =========================================================
if ( !function_exists( 'abcfl_html_img_tag' ) ){
    function abcfl_html_img_tag($imgID, $src, $alt, $imgTitle, $imgW=0, $imgH=0, $cls='', $style='') {

        return abcfl_html_img_tag_prop($imgID, $src, $alt, $imgTitle, $imgW, $imgH, $cls, $style);
     }
}

if ( !function_exists( 'abcfl_html_img_tag_prop' ) ){
    function abcfl_html_img_tag_prop($imgID, $src, $alt, $imgTitle, $imgW=0, $imgH=0, $cls='', $style='', $itemprop='image', $props='') {

        if (empty($src)) {return '';}
        $imgWH = '';
        //if ($imgW > 0 && $imgH > 0) { $imgWH = ' width="' . $imgW . '" height="' . $imgH . '"'; }
        if ($imgW > 0) { $imgWH = ' width="' . $imgW . '"'; }
        if ($imgH > 0) { $imgWH .= ' height="' . $imgH . '"'; }

        if (!empty($imgID)){ $imgID = ' id="' . $imgID . '"'; }
        if (!empty($cls)) { $cls = ' class="' . $cls . '"'; }
        if (!empty($style))  { $style = ' style="' . $style . '"'; }
        if (!empty($alt))  { $alt = ' alt="' . esc_attr(strip_tags($alt )) . '" '; }
        if (!empty($imgTitle))  {
            $imgTitle = esc_attr( strip_tags( $imgTitle ) );
            $imgTitle = ' title="' . $imgTitle . '"';
            }
        $src =  ' src="' . $src . '"';

        return '<img ' . $imgID . $src . $cls . $style . $imgWH . $imgTitle . $alt . 'itemprop="' . $itemprop . '" ' . $props . ' />';
     }
}
//== HYPERLINK =========================================================
if ( !function_exists( 'abcfl_html_a_tag' ) ){
    function abcfl_html_a_tag($href, $lnkTxt, $target='', $cls='', $style='', $spanStyle='', $blankTag=true, $onclickJS='', $args='') {

        if(abcfl_html_isblank($href)){
           if( !$blankTag ){ return $lnkTxt; }
           $href = "#";
        }

        //Onclick java script. Sample input: _gaq.push(['_trackEvent', 'category', 'action', 'opt_label']);
        if(!empty($onclickJS)){ $onclickJS = ' onclick="' . $onclickJS . '"'; }

        if(empty($lnkTxt)){ $lnkTxt = $href; }
        if(!empty($spanStyle)){ $lnkTxt = '<span style="' . $spanStyle . '">' . $lnkTxt . '</span>'; }

        $href = esc_url($href);

        if($target === '1' || $target == '_blank' ){ $target = ' target="_blank"'; }
        if(empty($target)){ $target = ''; }

        if (!abcfl_html_isblank($cls)) { $cls = ' class="' . $cls . '"'; }
        if(!abcfl_html_isblank($style)){ $style = ' style="' . $style . '"'; }
        if (!abcfl_html_isblank($args)) { $args = ' ' . $args . ' '; }

        return "<a" . $cls . $style . ' href="' . $href . '"' . $target . $onclickJS . $args . '>' . $lnkTxt . '</a>';
    }
}

//== HELPELS ===========================================================
if ( !function_exists( 'abcfl_html_file_url' ) ){

    function abcfl_html_file_url($collURL, $subFolder='', $file='') {
        if(empty($collURL)){ return '';}
        if(!empty($subFolder)){ $subFolder = trailingslashit($subFolder);}
        return untrailingslashit( trailingslashit($collURL) . $subFolder . $file );
    }
}

if ( !function_exists( 'abcfl_html_url' ) ){
    function abcfl_html_url($args, $url, $nonce='') {
        $newUrl = add_query_arg( $args, $url );
        if(!empty($nonce)){$newUrl = wp_nonce_url($newUrl, $nonce); }
        return esc_url($newUrl);
    }
}

if ( !function_exists( 'abcfl_html_admin_url' ) ){
    function abcfl_html_admin_url($args, $nonce='') {
        $adminUrl = admin_url( 'admin.php');
        $newUrl = add_query_arg( $args, $adminUrl );
        if(!empty($nonce)){$newUrl = wp_nonce_url($newUrl, $nonce); }
        return esc_url($newUrl);
    }
}

if ( !function_exists( 'abcfl_html_check_nounce' ) ){
    function abcfl_html_check_nounce($nonce, $action) {
        if ( !wp_verify_nonce( $nonce, $action ) ) {wp_nonce_ays( $nonce );}
    }
}
//===Messages=====================================================================================

if ( !function_exists( 'abcfl_html_div_clr' ) ){
    function abcfl_html_div_clr() {  return '<div class="abcfClr"></div>'; }
}

if ( !function_exists( 'abcfl_div_err_msg' ) ){
    function abcfl_div_err_msg($msg1, $msg2=''){

        if(!abcfl_html_isblank($msg1)){ $msg1 = '<p>' . $msg1 . '</p>'; }
        if(!abcfl_html_isblank($msg2)){ $msg2 = '<p>' . $msg2 . '</p>'; }

        $msg = $msg1 . $msg2;
        if(abcfl_html_isblank($msg)){ return; }
        echo ('<div class="abcfDivErrMsg">' . $msg . '</div>');
    }
}

//ABCFIC_PLUGIN_URL
//
//<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgEAYAAAAj6qa3AAAEB2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNC4yLjItYzA2MyA1My4zNTI2MjQsIDIwMDgvMDcvMzAtMTg6MTI6MTggICAgICAgICI+CiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPgogIDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiCiAgICB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgIHhtcDpSYXRpbmc9IjEiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMDktMDItMjhUMTg6MjQ6MTktMDY6MDAiCiAgIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6N0VCQTZCNEVGNzA1REUxMTgwRjZGREYwODREQUE3REQiCiAgIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6N0VCQTZCNEVGNzA1REUxMTgwRjZGREYwODREQUE3REQiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo3RUJBNkI0RUY3MDVERTExODBGNkZERjA4NERBQTdERCI+CiAgIDx4bXBNTTpIaXN0b3J5PgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjdFQkE2QjRFRjcwNURFMTE4MEY2RkRGMDg0REFBN0REIgogICAgICBz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"/>
if ( !function_exists( 'abcfl_msg_ok' ) ){
    function abcfl_msg_ok() {
        echo abcfl_html_tag( 'div', '', 'wrap' );
        echo abcfl_html_tag( 'div', 'abcfalOK', 'updated', 'line-height: 1px;' );
        echo abcfl_html_img_tag('', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgEAYAAAAj6qa3AAAEB2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNC4yLjItYzA2MyA1My4zNTI2MjQsIDIwMDgvMDcvMzAtMTg6MTI6MTggICAgICAgICI+CiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPgogIDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiCiAgICB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgIHhtcDpSYXRpbmc9IjEiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMDktMDItMjhUMTg6MjQ6MTktMDY6MDAiCiAgIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6N0VCQTZCNEVGNzA1REUxMTgwRjZGREYwODREQUE3REQiCiAgIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6N0VCQTZCNEVGNzA1REUxMTgwRjZGREYwODREQUE3REQiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo3RUJBNkI0RUY3MDVERTExODBGNkZERjA4NERBQTdERCI+CiAgIDx4bXBNTTpIaXN0b3J5PgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjdFQkE2QjRFRjcwNURFMTE4MEY2RkRGMDg0REFBN0REIgogICAgICBz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', '', '');
        echo abcfl_html_tag_ends('div,div');

    }
}
if ( !function_exists( 'abcfl_msg_info' ) ){
    function abcfl_msg_info($txt) { echo '<div class="wrap"><div class="updated fade" id="message"><p>' . $txt . '</p></div></div>' . "\n"; }
}

if ( !function_exists( 'abcfl_msg_err' ) ){
function abcfl_msg_err($txt) { echo '<div class="wrap"><div class="error" id="error"><p>' . $txt . '</p></div></div>'; }
}
//=========================================================
if ( !function_exists( 'abcfl_html_vardump' ) ){
    function abcfl_html_vardump($var) {
        $var_dump = '';
        if(isset($var)) {
            $var_dump .= "<pre>";
            $var_dump .= var_dump($var);
            $var_dump .= "</pre>";
        } else {
            $var_dump .= "Variable doesn't exist!";
        }
        return $var_dump;
    }
}

if ( !function_exists( 'abcfl_html_jsondump' ) ){
    function abcfl_html_jsondump($var) {
        $var_dump = '';
        if(isset($var)) {
            $var_dump .= "<pre>";
            //$var_dump .= json_encode($var, JSON_NUMERIC_CHECK |JSON_PRETTY_PRINT);
            if (version_compare(PHP_VERSION, '5.4.0', '<')) {
                //PHP 5.3
                $var_dump .= json_encode($var);
            }
            else{
                //PHP 5.4
                $var_dump .= json_encode($var, JSON_NUMERIC_CHECK |JSON_PRETTY_PRINT);
                //$jsonData = json_encode($arrayData, JSON_UNESCAPED_SLASHES );
            }
            $var_dump .= "</pre>";
        } else {
            $var_dump .= "Variable doesn't exist!";
        }
        return $var_dump;
    }
}

if ( !function_exists( 'abcfl_html_json_out' ) ){
    function abcfl_html_json_out($in) {
        $out = '';
        if(!empty($in)) {
            if (version_compare(PHP_VERSION, '5.4.0', '<')) {
                //PHP 5.3
                $out = json_encode($in, JSON_NUMERIC_CHECK);
            }
            else{
                //PHP 5.4
                $out = json_encode($in, JSON_NUMERIC_CHECK |JSON_PRETTY_PRINT);
                //$jsonData = json_encode($arrayData, JSON_UNESCAPED_SLASHES );
            }
        }
        return $out;
    }
}

//Checks if input is empty.
if ( !function_exists( 'abcfl_html_isblank' ) ){
    function abcfl_html_isblank($in){ return (!isset($in) || trim($in)==='');}
}

if ( !function_exists( 'abcfl_html_remove_dquotes' ) ){
    function abcfl_html_remove_dquotes($in){

      $out = html_entity_decode($in);
      return str_replace('"', '' ,$out );
    }
}