<?php
function abcfsl_mbox_item_img( $imgUrlL, $imgIDL ){

    echo  abcfl_html_tag('div','','inside hidden');

        echo abcfl_input_hlp_lbl(abcfsl_txta(310), 'abcflMTop10', 14, 'B');
        echo abcfl_html_img_tag('', $imgUrlL, '', '', 200, '', 'abcflMTop15');

        //imgUrlL itemImgUrl
        echo abcfl_input_txt('imgUrlL', '', $imgUrlL, abcfsl_txta(312), '', '100%', '', '', 'abcflFldCntr', 'abcflFldLbl');
        echo abcfl_input_hidden( 'imgIDL', 'imgIDL', $imgIDL );

        echo  abcfl_html_tag('div','','abcflPTop10');
            echo abcfl_input_btn('btnImgL', 'btnImgL', 'button', abcfsl_txta(263), 'button' );
        echo abcfl_html_tag_end('div');

    echo abcfl_html_tag_end('div');
}

