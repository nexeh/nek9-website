<?php
/*
 * Admin tabs: Demos,  Help.
 */
function abcfsl_admin_tabs() {

    $getParams = abcfsl_admin_tabs_defaults( $_GET );
    $basePg = 'admin.php?page=' . $getParams['page'];
    $currentTab = $getParams['tab'];

    $tabs = array(
        'tabDemos' => abcfsl_txta(288),
        'tabHelp' => abcfsl_txta(1)
        );
    $links = array();


   //Tab links
   foreach( $tabs as $tab => $name ) {

        $href =  $basePg . '&amp;tab=' . $tab;
        if ( $tab == $currentTab ) {
            $links[] = abcfl_html_a_tag($href, $name, '', 'nav-tab abcfkapNavTab nav-tab-active abcfkapNavTabActive');
        }
        else {
            $links[] = abcfl_html_a_tag($href, $name, '', 'nav-tab abcfkapNavTab');
        }
    }

    echo  abcfl_html_tag('div', '', 'wrap' );
    echo abcfl_html_tag( 'h2', '', 'nav-tab-wrapper' );

    foreach ( $links as $link ){ echo $link; }
    echo abcfl_html_tag_ends('h2,div');

    switch ( $currentTab ) {
        case 'tabDemos' :
            include_once (ABCFSL_PLUGIN_DIR . 'admin/admin-demos.php');
            abcfsl_admin_demos();
            break;
        case 'tabHelp' :
            include_once (ABCFSL_PLUGIN_DIR . 'admin/admin-help.php');
            abcfsl_admin_tab_help();
            break;
   }
}
//--------------------------------------------------
function abcfsl_admin_tabs_defaults( $get ) {

    if(!$get){ $get = array();}
    $defaults = array(
        'page' => 'abcfsl-admin-tabs',
        'tab' => 'tabDemos'
     );

    return wp_parse_args( $get, $defaults );
}


