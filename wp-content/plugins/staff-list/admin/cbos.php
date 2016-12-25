<?php
//==DROPDOWNS================================================
function abcfsl_cbo_yn() {
    return array('Y' => abcfsl_txta(5),
                'N'  => abcfsl_txta(6)
        );
}

//Field options: list, single page, hide, delete ...
function abcfsl_cbo_show_field() {
    return array('L' => abcfsl_txta(5),
        'H' => abcfsl_txta(295),
        'D'  => abcfsl_txta(321)
        );
}

//Staff page layouts: list, grid...
function abcfsl_cbo_staff_pg_layout() {
    return array('0'  => '- - -',
        '1'  => abcfsl_txta(215)
        );
}

//Responsive list layout. Width of the left/right sections
function abcfsl_cbo_list_columns() {
    return array('1' => '1 - 11',
        '2'  => '2 - 10',
        '3'  => '3 - 9',
        '4'  => '4 - 8',
        '5'  => '5 - 7',
        '6'  => '6 - 6',
        '7'  => '7 - 5',
        '8'  => '8 - 4',
        '9'  => '9 - 3',
        '10'  => '10 - 2',
        '11'  => '11 - 1',
        '12'  => '12 - 0');
}

function abcfsl_cbo_txt_cntr() {
    return array(
        'div' => 'DIV',
        'p' => 'P',
        'h1' => 'H1',
        'h2'  => 'H2',
        'h3'  => 'H3',
        'h4'  => 'H4',
        'h5'  => 'H5',
        'h6'  => 'H6',
        'span'  => 'span'
        );
}

//Field types: text, hyperlink...
function abcfsl_cbo_field_type() {
    return array('N'  => '- - -',
        'T'  => abcfsl_txta(38),
        'PT'  => abcfsl_txta(86),
        'H'  => abcfsl_txta(228),
        'EM'  => abcfsl_txta(290)
        );
}

//-------------------------
function abcfsl_cbo_margin_top_field() {
    return array('D' => abcfsl_txta(7),
        '5' => '5 px',
        '7' => '7 px',
        '10' => '10 px',
        '15' => '15 px',
        '20' => '20 px',
        '25' => '25 px',
        '30' => '30 px',
        '40' => '40 px',
        '50' => '50 px',
        'C' => abcfsl_txta(20)
    );
}

function abcfsl_cbo_font_size() {
    return array('D' => abcfsl_txta(7),
        '32_7' => '32 px. Bold.',
        '28_7' => '28 px. Bold.',
        '24_7' => '24 px. Bold.',
        '24_7' => '24 px. Bold.',
        '20_7' => '20 px. Bold.',
        '18_7' => '18 px. Bold.',
        '16_7' => '16 px. Bold.',
        '14_7' => '14 px. Bold.',
        '13_7' => '13 px. Bold.',
        '12_7' => '12 px. Bold.',
        '32_6' => '32 px. Semi-Bold.',
        '28_6' => '28 px. Semi-Bold.',
        '24_6' => '24 px. Semi-Bold.',
        '24_6' => '24 px. Semi-Bold.',
        '20_6' => '20 px. Semi-Bold.',
        '18_6' => '18 px. Semi-Bold.',
        '16_6' => '16 px. Semi-Bold.',
        '14_6' => '14 px. Semi-Bold.',
        '13_6' => '13 px. Semi-Bold.',
        '12_6' => '12 px. Semi-Bold.',
        '32' => '32 px. Normal.',
        '28' => '28 px. Normal.',
        '24' => '24 px. Normal.',
        '24' => '24 px. Normal.',
        '20' => '20 px. Normal.',
        '18' => '18 px. Normal.',
        '16' => '16 px. Normal.',
        '14' => '14 px. Normal.',
        '13' => '13 px. Normal.',
        '12' => '12 px. Normal.',
        'C' => abcfsl_txta(20)
    );
}