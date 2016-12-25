<?php
function abcfsl_mbox_tplate_sort( $postID, $tplateOptns ){

    echo  abcfl_html_tag('div','','inside  hidden');
        echo abcfl_input_info_lbl(abcfsl_txta(255), 'abcflMTop15 abcflMBottom15', 14, 'SB');
        echo abcfsl_mbox_tplate_sort_build_sort_cntr($postID, $tplateOptns);
    echo abcfl_html_tag_end('div');
}

function abcfsl_mbox_tplate_sort_build_sort_cntr($postID, $tplateOptns){

    $items = '';
    $fieldOrder = abcfsl_util_field_order( $tplateOptns );

    foreach ( $fieldOrder as $order=> $F ) {
        $inputLinkLblLbl = isset( $tplateOptns['_lnkLblLbl_' . $F] ) ? esc_attr( $tplateOptns['_lnkLblLbl_' . $F][0] ) : '';
        $inputLbl = isset( $tplateOptns['_inputLbl_' . $F] ) ? esc_attr( $tplateOptns['_inputLbl_' . $F][0] ) : $inputLinkLblLbl;
        $fieldTypeH = isset( $tplateOptns['_fieldTypeH_' . $F] ) ? esc_attr( $tplateOptns['_fieldTypeH_' . $F][0] ) : 'N';

        //$showYN = isset( $tplateOptns['_showField_' . $F] ) ? esc_attr( $tplateOptns['_showField_' . $F][0] ) : 'Y';

        $lineName = $inputLbl;
        $items .= abcfsl_mbox_tplate_sort_li( $F, $order, $fieldTypeH, $lineName, $fieldTypeH );
    }

    return abcfsl_mbox_tplate_sort_cntr($postID, $items);
}

//LI buider.
function abcfsl_mbox_tplate_sort_li($F, $order, $fieldTypeH, $lineName ){

        if($fieldTypeH == 'N'){ return ''; }

        $clsLi = 'sortable-item';
        $idLi = $F;

        $clsSort = 'abcflFontFVS12 abcflFontW700';
        $clsName = 'abcflPLeft15 abcflFontFVS12';

        $lineNumber = $order . ' - '. $idLi . '&nbsp;';
        $fieldType = abcfsl_mbox_tplate_field_type( $fieldTypeH );

        $liS = abcfl_html_tag('li',  $idLi, $clsLi );
        $spanSort = abcfl_html_tag( 'span', '', $clsSort) .$lineNumber . '</span>';
        $spanName = abcfl_html_tag( 'span', '', $clsName) . $lineName . '</span>';
        $spanFieldType = abcfl_html_tag( 'span', '', 'abcflPLeft10') . $fieldType . '</span>';

        return $liS . $spanSort . $spanName . $spanFieldType. '</li>';
}

function abcfsl_mbox_tplate_sort_cntr($postID, $items){
    // TODO
    $divID = 'linesSortCntr';
    $divCls = 'abcflWidth60Pc';
    $divS = abcfl_html_tag( 'div', $divID, $divCls );
    $divE = '</div>';
    $ulCls = 'sortable-list ui-sortable';
    $ulID = 'ul_' . $postID;
    $ulS = abcfl_html_tag( 'ul', $ulID, $ulCls );

    return $divS . $ulS . $items . '</ul>' . $divE;
}

//Labels displayed next to field names on sort screen
function abcfsl_mbox_tplate_field_type( $fieldTypeH ){

    // TODO
    $out = '';
    $fieldType = '';
    if($fieldTypeH != 'N'){

        switch ($fieldTypeH) {
            case 'T':
                $fieldType = 'Txt';
                break;
            case 'H':
                $fieldType = 'Link';
                break;
            case 'EM':
                $fieldType = 'Email';
                break;
            default:
                break;
        }
        $out = '(' . $fieldType . ')';
    }

    return $out;
}





