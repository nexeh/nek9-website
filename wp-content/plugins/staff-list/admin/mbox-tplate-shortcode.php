<?php
function abcfsl_mbox_list_shortcode() {

    echo  abcfl_html_tag('div','','inside  hidden');
    $scodes = abcfsl_scode_build_scode();
    echo abcfl_input_txt_readonly('scodeL', '', $scodes['scodeL'], abcfsl_txta(246),'', '100%', 'regular-text code abcflFontW700', '', 'abcflFldCntr abcflShortcode');

echo abcfl_input_info_lbl(abcfsl_txta(242), 'abcflMTop40', 20, 'SB');
    echo abcfl_input_hline('2');
    echo abcfl_input_info_lbl(abcfsl_txta(246), 'abcflMTop20', 20, 'SB');
    echo abcfl_input_info_lbl(abcfsl_txta(305), 'abcflMTop5', 12);
    //-------------------------------
    echo abcfl_input_div_lbl(abcfsl_txta(272), 'abcflMTop15', 12, '', 'V');
    echo abcfl_input_div_lbl(abcfsl_txta(304), '', 12, '', 'V');
    echo abcfl_input_div_lbl(abcfsl_txta(274), '', 12, '', 'V');
    echo abcfl_input_div_lbl(abcfsl_txta(275), '', 12, '', 'V');

    echo abcfl_html_tag_end('div');
}


