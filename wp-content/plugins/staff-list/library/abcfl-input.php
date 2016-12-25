<?php
/**
 * Input builders
 * Version 2.0.3
 * Fixed cbo
 * Deleted hdivider
 * updated abcfl_input_txtarea
 * 2.0.2 abcfl_input_cbo_strings
 */

//=== DIVIDERS =======================================================================
/**
 * $cls = abcflMTop15, abcflHDivider1, abcflHDivider2, abcflHDivider4, abcflWidth50P, abcflWidth99P
 * Parameters:
 * $widthBT: 1,2,3,4
 * $marginT: 0,25,10,15,20.30,40
 * $width: 100Pc, 90Pc, 80Pc, 70Pc, 60Pc, 50Pc...
 * $color: Red
 */
if ( !function_exists( 'abcfl_input_hline' ) ){
    function abcfl_input_hline( $widthBT='', $marginT='', $width='', $color='',  $customCls='' ) {

        if(!empty($customCls)){ $customCls = ' ' . trim($customCls);}

        $btw = ' abcflBTW1';
        if(!empty($widthBT)){ $btw = ' abcflBTW' . $widthBT;}
        $mt = ' abcflMTop15';
        if(!empty($marginT)){ $mt = ' abcflMTop' . $marginT;}
        $btc = ' abcflBTCGray';
        if(!empty($color)){ $btc = ' abcflBTC' . $color;}
        $w = ' abcflWidth100Pc';
        if(!empty($width)){ $w = ' abcflWidth' . $width;}

        $cls = 'abcflHLine' . $btw . $mt . $btc . $w . $customCls;
        return '<div' . abcfl_html_css_class($cls) . '></div>';
    }
}

//== HELP LABELS =======================================================
//abcfl_input_info_lbl(txtbldr(35), 'abcflGreen abcflMTop15', 12, 'B')
if ( !function_exists( 'abcfl_input_info_lbl' ) ){
    function abcfl_input_info_lbl($txt, $cls='', $fontS='12', $fontW='N') {

        if(!empty($cls)){ $cls = ' ' . trim($cls);}

        $fontSize = ' abcflFontS' . $fontS;

        $fontWeight = ' abcflFontW400';
        switch ($fontW) {
            case 'B':
                $fontWeight = ' abcflFontW700';
                break;
            case 'SB':
                $fontWeight = ' abcflFontW600';
                break;
            default:
                break;
        }

        $clsLbl = $fontSize . $fontWeight . $cls;
        return '<div class="abcflFontWP' . $clsLbl . '">' . $txt . '</div>';
    }
}
//abcfl_input_hlp_lbl(txtbldr(37), 'abcflGreen', 11);
//abcfl_input_hlp_lbl(txtbldr(35), 'abcflGreen abcflMTop15', 12, 'B')

if ( !function_exists( 'abcfl_input_hlp_lbl' ) ){
    function abcfl_input_hlp_lbl($txt, $cls='', $fontS=11, $fontW='N') {

        if(!empty($cls)){ $cls = ' ' . trim($cls);}

        $fontSize = 'abcflFontFVS' . $fontS;

        $fontWeight = ' abcflFontW400';
        switch ($fontW) {
            case 'B':
                $fontWeight = ' abcflFontW700';
                break;
            case 'SB':
                $fontWeight = ' abcflFontW600';
                break;
            default:
                break;
        }

        $clsLbl = $fontSize . $fontWeight . $cls;
        return '<div class="' . $clsLbl . '">' . $txt . '</div>';
    }
}

if ( !function_exists( 'abcfl_input_div_lbl' ) ){
    function abcfl_input_div_lbl($txt, $cls='', $fontS=11, $fontW='', $fontF='') {

	if(abcfl_html_isblank($txt)) { return '';}
        $clsS = 'abcflFontS' . $fontS;
        $clsW = '';
        if($fontW == 'B'){ $clsW = ' abcflFontW700';}
        $clsF = '';
        if($fontF == 'V'){ $clsF = ' abcflFontFV';}
	if(!empty($cls)){ $cls = ' ' . trim($cls);}

        $clsLbl = $clsS . $clsW . $clsF . $cls;
		$s = abcfl_html_tag( 'div', '', $clsLbl);
		$e = abcfl_html_tag_end('div');
        return $s . $txt . $e;
    }
}

if ( !function_exists( 'abcfl_input_div_img' ) ){
    function abcfl_input_div_img( $imgUrl, $cls='', $style='', $alt='', $imgTitle='', $imgCls='', $imgStyle='' ){

        if(empty($imgUrl)) { return ''; }

	$imgTag = abcfl_html_img_tag('', $imgUrl, $alt, $imgTitle, '', '', $imgCls='', $imgStyle='');
        $s = abcfl_html_tag( 'div', $id, $cls, $style);
        $e = abcfl_html_tag_end('div');
        return $s . $imgTag . $e;
    }
}

//--FLOATS------------------------------
if ( !function_exists( 'abcfl_input_floats_cntr_s' ) ){
function abcfl_input_floats_cntr_s(){ return '<div class="abcfFloatsCntr">'; }
}
if ( !function_exists( 'abcfl_input_floats_cntr1_s' ) ){
function abcfl_input_floats_cntr1_s(){ return '<div class="abcflFloatsCntr1">'; }
}
if ( !function_exists( 'abcfl_input_floats_cntr_e' ) ){
function abcfl_input_floats_cntr_e(){ return '<div class="abcflClr"></div></div>'; }
}
if ( !function_exists( 'abcfl_input_clr' ) ){
function abcfl_input_clr(){ return '<div class="abcflClr"></div>'; }
}

//===INPUTS=======================================================================
if ( !function_exists( 'abcfl_input_radio_column' ) ){
    function abcfl_input_radio_column($fldID, $fldName, $value, $lblTxt='', $checked='') {
        $optns = abcfl_input_get_options( $fldID, $fldName, $lblTxt, '', '', '', '', '', '');
        extract( $optns );
        return  '<p><label><input' . $id . ' type="radio"' . $fldName . ' value="' . $value . '"' . $checked . ' >' . $lblTxt . '</label></p>';
    }
}

if ( !function_exists( 'abcfl_input_radio_row' ) ){
    function abcfl_input_radio_row($fldID, $fldName, $value, $lblTxt='', $checked='') {
        $optns = abcfl_input_get_options( $fldID, $fldName, $lblTxt, '', '', '', '', '', '');
        extract( $optns );
        return  '<label><input' . $id . ' type="radio"' . $fldName . ' value="' . $value . '"' . $checked . ' >' . $lblTxt . '</label>';
    }
}

if ( !function_exists( 'abcfl_input_checkbox_row' ) ){
    function abcfl_input_checkbox_row( $fldID, $fldName, $fldValue, $lblTxt='', $checked='') {
        $optns = abcfl_input_get_options( $fldID, $fldName, $lblTxt, '', '', '', '', '', '');
        extract( $optns );
        return '<label><input type="checkbox" ' . $id .  $fldName . ' value="' . $fldValue . '"' . $checked . ' >' . $lblTxt . '</label>';
    }
}

//<input type="checkbox" id="cbox2" value="second_checkbox"> <label for="cbox2">This is the second checkbox</label>
//<label><input type="checkbox" id="cbox1" value="first_checkbox"> This is the first checkbox</label><br>
if ( !function_exists( 'abcfl_input_checkbox' ) ){
function abcfl_input_checkbox($fldID, $fldName, $fldValue, $lblTxt='', $hlpTxt='', $cls='', $style='', $clsCntr='', $clsLbl='', $clsHlpUnder='', $clsBoxlbl=''){

    $optns = abcfl_input_get_options( $fldID, $fldName, $lblTxt, $hlpTxt, '', $cls, $style, $clsCntr, $clsLbl,  $clsHlpUnder);
    extract( $optns );

    $checked = '';
    //if($fldValue == 1){ $checked = ' checked="checked"'; }
    if($fldValue == 1){ $checked = ' checked '; }

    //$input = '<input type="checkbox"  id="'. $fldID . '"' . $checked . ' value="' . $fldValue . '" name="'. $fldID . '">';
    $input = '<input type="checkbox"  id="'. $fldID . '"' . ' value="' . $fldValue . '" name="'. $fldID . '"' . $cls . $checked . '>';
    //$input = '<input type="checkbox"  id="'. $fldID . '"' . ' value="' . $fldValue . '"' . $cls . $checked . '>';

    $clsBoxlbl = abcfl_html_css_class($clsBoxlbl);
    return $fldCntrDivS . '<label' . $clsBoxlbl . '>' . $input . $lblTxt . '</label>' . $hlpUnder . '</div>';
}
}

//--------------------------------------------------------

//Used when cbo key  contains strings( including hypens or underscores )
if ( !function_exists( 'abcfl_input_cbo_strings' ) ){
function abcfl_input_cbo_strings($fldID, $fldName, $values, $selected, $lblTxt='', $hlpTxt='', $size='', $cls='', $style='',  $clsCntr='', $clsLbl='', $clsHlpUnder='') {

    $cboOptions = abcfl_input_cbo_get_options_strings($values, $selected);
    $optns = abcfl_input_get_options( $fldID, $fldName, $lblTxt, $hlpTxt, $size, $cls, $style, $clsCntr, $clsLbl,  $clsHlpUnder);
    extract( $optns );

    return  $fldCntrDivS . $fldLblDiv . '<select' . $id . 'type="text"' . $cls . $style . $fldName . ' >' . $cboOptions . '</select>' . $hlpUnder . '</div>';
}
}

if ( !function_exists( 'abcfl_input_cbo_get_options_strings' ) ){
function abcfl_input_cbo_get_options_strings( $values, $selected_value ) {
    $out = '';
    if(empty($values)){return $out;}
    $selected = '';

    //convert key & values to string
    foreach($values as $key => $fldValue){
        $selected = abcfl_input_cbo_set_selected_strings((string)$key, (string)$selected_value);
        $out .= '<option ' . $selected . ' value="' . esc_attr($key) . '">' . esc_html($fldValue) . '</option>';
    }
    return $out;
}
}

if ( !function_exists( 'abcfl_input_cbo_set_selected_strings' ) ){
function abcfl_input_cbo_set_selected_strings($key, $selected_value) {

    $out = '';
    if( abcfl_html_isblank($selected_value) ) { return '';}

    //Compare values as strings
    if($key === $selected_value)  { $out = ' selected="selected" '; }
    return $out;
}
}

//================================================
if ( !function_exists( 'abcfl_input_cbo' ) ){
    function abcfl_input_cbo($fldID, $fldName, $values, $selected, $lblTxt='', $hlpTxt='', $size='', $isInt=true, $cls='', $style='',  $clsCntr='', $clsLbl='', $clsHlpUnder='') {

        $cboOptions = abcfl_input_cbo_get_options($values, $selected);
        $optns = abcfl_input_get_options( $fldID, $fldName, $lblTxt, $hlpTxt, $size, $cls, $style, $clsCntr, $clsLbl,  $clsHlpUnder);
        extract( $optns );

        return  $fldCntrDivS . $fldLblDiv . '<select' . $id . 'type="text"' . $cls . $style . $fldName . ' >' . $cboOptions . '</select>' . $hlpUnder . '</div>';
    }
}

if ( !function_exists( 'abcfl_input_cbo_wrap' ) ){
    function abcfl_input_cbo_wrap($fldID, $fldName, $cboOptions, $lblTxt='', $hlpTxt='', $size='', $isInt=true, $cls='', $style='',  $clsCntr='', $clsLbl='', $clsHlpUnder='') {

        $optns = abcfl_input_get_options( $fldID, $fldName, $lblTxt, $hlpTxt, $size, $cls, $style, $clsCntr, $clsLbl,  $clsHlpUnder='');
        extract( $optns );

        return  $fldCntrDivS . $fldLblDiv . '<select' . $id . '" type="text"' . $cls .
                $style . $fldName . ' >' . $cboOptions . '</select>' . $hlpUnder . '</div>';
    }
}
//--------------------------------------------------------
if ( !function_exists( 'abcfl_input_txt' ) ){
function abcfl_input_txt($fldID, $fldName, $fldValue, $lblTxt='', $hlpTxt='', $size='', $cls='', $style='', $clsCntr='', $clsLbl='', $clsHlpUnder='', $aria=false){

    $req = abcfl_aria_req($aria);
    $optns = abcfl_input_get_options( $fldID, $fldName, $lblTxt, $hlpTxt, $size, $cls, $style, $clsCntr, $clsLbl );
    extract( $optns );
    return  $fldCntrDivS . $fldLblDiv . '<input' . $id . ' type="text"' . $cls .
            $style . $fldName . ' value="' . $fldValue . '"' . $req . '>' . $hlpUnder . '</div>';
}
}

if ( !function_exists( 'abcfl_input_txt_readonly' ) ){
function abcfl_input_txt_readonly($fldID, $fldName, $fldValue, $lblTxt='', $hlpTxt='', $size='', $cls='', $style='', $clsCntr='', $clsLbl='', $clsHlpUnder=''){

    $divs = '';
    $optns = abcfl_input_get_options( $fldID, $fldName, $lblTxt, $hlpTxt, $size, $cls, $style, $clsCntr, $clsLbl, $clsHlpUnder  );
    extract( $optns );
    return  $fldCntrDivS . $fldLblDiv . '<input' . $id . ' type="text"' . $cls .
            $style . $fldName . ' value="' . $fldValue . '" readonly />' . $hlpUnder . '</div>';
}
}

if ( !function_exists( 'abcfl_input_txtarea' ) ){
function abcfl_input_txtarea($fldID, $fldName, $fldValue, $lblTxt='', $hlpTxt='', $size='', $rows='', $cols='', $cls='', $style='', $clsCntr='', $clsLbl='') {

    $optns = abcfl_input_get_options( $fldID, $fldName, $lblTxt, $hlpTxt, $size, $cls, $style, $clsCntr, $clsLbl);
    extract( $optns );

    $taRows = '';
    $taCols = '';
    if(!empty($rows)) { $taRows = 'rows="' . $rows . '" '; }
    if(!empty($cols)) { $taCols = 'cols="' . $cols . '" '; }

    return  $fldCntrDivS . $fldLblDiv .
        '<textarea ' . $taRows . $taCols . $id . ' type="text"' . $cls .  $style . $fldName . '/>' . $fldValue . '</textarea>' . $hlpUnder . '</div>';
}
}

if ( !function_exists( 'abcfl_input_btn' ) ){
    function abcfl_input_btn( $fldID, $fldName, $type, $lblTxt='', $cls='', $divWrap=false, $onClick='' ){

        if(!empty($onClick)) {$onClick = 'onclick="' . $onClick . '"'; }
        $fldID = abcfl_input_id($fldID);
        $fldName = abcfl_input_name($fldName);
        $cls = abcfl_html_css_class($cls);

        $value = $lblTxt;
//        if(!empty($lblTxt)){$value = $lblTxt;}
//        else { $value = abcfl_input_txta($lblTxt); }

        $divS = '';
        $divE = '';
        if($divWrap){
            $divS = '<div class="submit">';
            $divE = '</div>';
        }

        return $divS . '<input type="' . $type . '"' . $cls . $fldID . $fldName .' value="' . $value . '"' . $onClick . '>' . $divE;
    }
}

if ( !function_exists( 'abcfl_input_lnk' ) ){
function abcfl_input_lnk($Url, $UrlText, $hlpTxt='', $cls='', $style='', $clsCntr='', $clsHlpUnder=''){

    $optns = abcfl_input_get_options( '', '', '', $hlpTxt, '', $cls, $style, $clsCntr, '', $clsHlpUnder );
    extract( $optns );
    return $fldCntrDivS . $fldLblDiv . '<div ' . $cls . '><a href="' . $Url . '"/>' . $UrlText . '</a></div>' . $hlpUnder . '</div>';
}
}

if ( !function_exists( 'abcfl_input_hidden' ) ){
function abcfl_input_hidden( $id, $name, $value, $renderIfBlank=true ) {
    if( abcfl_html_isblank($value) &&  !$renderIfBlank ) { return ''; }
    if(!abcfl_html_isblank($id)) { $id = ' id="' . $id . '"'; }
    return '<input type="hidden"' . $id . ' name="' . $name . '" value="' . $value . '" />';
}
}
//===LABELS=======================================================================
if ( !function_exists( 'abcfl_input_lbl' ) ){
function abcfl_input_lbl($fldID, $lblTxt ) {
    $out = '';
    if( !abcfl_html_isblank($fldID)){$fldID = ' for="' . $fldID . '" ';}
    if( !abcfl_html_isblank($lblTxt)) { $out = '<label' . $fldID . '>' . $lblTxt . '</label>';}
    return $out;
}
}
if ( !function_exists( 'abcfl_input_hlp_top' ) ){
function abcfl_input_hlp_top( $hlpTxt ) {
    $out = '';
    if(!empty($hlpTxt)) { $out = '<div class="abcflHlpTop">' . $hlpTxt . '</div>';}
    return $out;
}
}
if ( !function_exists( 'abcfl_input_hlp_under' ) ){
function abcfl_input_hlp_under( $hlpTxt, $clsHlpUnder='' ) {
    $out = '';
    $clsSpan = !empty($clsHlpUnder) ? $clsHlpUnder : 'abcflFldHlpUnder';

    if(!empty($hlpTxt)) { $out = '<span class="' . $clsSpan .'">' . $hlpTxt . '</span>';}
    return $out;
}
}
if ( !function_exists( 'abcfl_input_section_header' ) ){
function abcfl_input_section_header( $hlpTxt, $noHlp = false ) {
    $out = '';
    $suffix = '';
    if($noHlp) { $suffix = 'NoHlp'; }
    if(!empty($hlpTxt)) { $out = '<div class="abcflSecHdr' . $suffix . '">' . $hlpTxt . '</div>';}
    return $out;
}
}
if ( !function_exists( 'abcfl_input_hlp_data' ) ){
function abcfl_input_hlp_data( $hlpTxt, $data, $fontSize = '11' ) {
    $out = '';
    if(!empty($hlpTxt)) { $out = '<span class="abcflFldHlpData' . $fontSize . '">' . $hlpTxt . $data .'</span>';}
    return $out;
}
}
//===HELPERS=====================================================================
if ( !function_exists( 'abcfl_input_get_options' ) ){
    function abcfl_input_get_options( $fldID, $fldName, $lblTxt, $hlpTxt, $size, $cls, $style, $clsCntr, $clsLbl, $clsHlpUnder='') {

        if(abcfl_html_isblank($size)) { $size = '30%'; }
        $w = abcfl_css_w($size,false);
        $style = abcfl_html_css_style( $w . $style );

        if(empty($fldName)) { $fldName = $fldID; }
        $name = abcfl_input_name($fldName);

        $hlpUnder = abcfl_input_hlp_under($hlpTxt, $clsHlpUnder);

        $id = abcfl_input_id($fldID);

        $cls = abcfl_html_css_class($cls);

        $lbl = abcfl_input_lbl($fldID, $lblTxt);

        $fldCntrDivS = abcfl_input_cntr_div($clsCntr);
        $fldLblDiv = abcfl_input_fld_lbl_div($lbl, $clsLbl);

        $out = array(
            'id'           => $id,
            'cls'           => $cls,
            'style'         => $style,
            'fldCntrDivS'   => $fldCntrDivS,
            'fldLblDiv'     => $fldLblDiv,
            'hlpUnder'      => $hlpUnder,
            'fldName'       => $name
        );
        return $out;
    }
}

if ( !function_exists( 'abcfl_input_id' ) ){
function abcfl_input_id( $fldID ){

    if(!abcfl_html_isblank($fldID)){ return ' id="' . $fldID . '"'; }
    return '';
}
}
if ( !function_exists( 'abcfl_input_name' ) ){
function abcfl_input_name( $fldName ){

    if(!abcfl_html_isblank($fldName)){ return ' name="' . $fldName . '"'; }
    return '';
}
}

if ( !function_exists( 'abcfl_input_input_size' ) ){
function abcfl_input_input_size( $size ) {

    $defaultW='30';
    $defaultUnits='%';
    if(empty($size)) { return array($defaultW, $defaultUnits); }

    $w = '';
    $units = substr($size, -1, 1);
    if( $units == '%' ) { $w = rtrim($size, '%'); }
    if( $units == 'x' ) {
        $w = rtrim($size, 'px');
        $units = 'px';
     }

    if(empty($w)) {return array($defaultW, $defaultUnits);}
    return array($w, $units);
}
}
if ( !function_exists( 'abcfl_input_fld_lbl_div' ) ){
function abcfl_input_fld_lbl_div($lbl, $clsLbl) {

    $divLbl = '';
//    if(!empty($lbl)){
//        $clsLbl = !empty($clsLbl) ? $clsLbl : 'abcfFldLbl';
//        $divLbl = '<div class="' . $clsLbl .'">' . $lbl . '</div>';
//    }
    if(!empty($lbl)){
        if(!empty($clsLbl)){
            $divLbl = '<div class="' . $clsLbl .'">' . $lbl . '</div>';
        }
        else{
            $divLbl = $lbl;
        }
    }
    return $divLbl;
}
}
if ( !function_exists( 'abcfl_input_cntr_div' ) ){
function abcfl_input_cntr_div($clsCntr) {

    //$clsCntr = !empty($clsCntr) ? $clsCntr : 'abcflFldCntr';
    $cls = !empty($clsCntr) ? $clsCntr : 'form-field';
    return '<div class="' . $cls . '">';
}
}
if ( !function_exists( 'abcfl_input_cbo_get_options' ) ){
function abcfl_input_cbo_get_options($values, $selected_value) {
    $out = '';
    if(empty($values)){return $out;}
    $selected = "";
    foreach($values as $key => $fldValue){
        //return ('key= ' . $key . ' sw= ' . $selected_value);
        $selected = abcfl_input_cbo_set_selected($key, $selected_value);
        $out .= '<option ' . $selected . ' value="' . esc_attr($key) . '">' . esc_html($fldValue) . '</option>';
    }
    return $out;
}
}
if ( !function_exists( 'abcfl_input_cbo_set_selected' ) ){
function abcfl_input_cbo_set_selected($key, $selected_value) {
    $out = '';
    if( abcfl_html_isblank($selected_value )){ return '';}
    if($key == $selected_value){$out = " selected=\"selected\" "; }
    return $out;
}
}
if ( !function_exists( 'abcfl_aria_req' ) ){
function abcfl_aria_req($required){
    $out = '';
    if($required){$out = ' aria-required="true" '; }
    return $out;
}
}