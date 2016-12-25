<?php
/**
 * Admin menu
*/
if (!class_exists("ABCFSL_Admin_Menu")) {

    class ABCFSL_Admin_Menu {

        function __construct() {
            add_action( 'admin_menu', array (&$this, 'add_menu') );
        }

        function add_menu() {

            $obj = ABCFSL_Main();
            $slug = $obj->pluginSlug;

            $capability = 'edit_pages';
            //add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );dashicons-format-gallery
           add_menu_page(abcfsl_txta(59), abcfsl_txta(59), $capability, $slug, '', 'dashicons-groups');

           // TODO
            //add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
            add_submenu_page( $slug, abcfsl_txta(12), abcfsl_txta(12), $capability, 'abcfsl-admin-tabs', array (&$this, 'load_page'));
        }

        function load_page() {

            switch ($_GET['page']){
                case 'abcfsl-admin-tabs' :
                    include_once ( ABCFSL_PLUGIN_DIR . 'admin/admin-tabs.php' );
                    abcfsl_admin_tabs();
                    break;
                default:
                    break;
            }
        }
}
}

$abcfrfs = new ABCFSL_Admin_Menu();
