<?php
/*
Plugin Name: Staff List
Plugin URI: http://abcfolio.com/wordpress-plugin-staff-list/
Description:  Responsive List of Staff. Displays photo and contact information of employees, faculty or staff members.
Author: abcfolio
Author URI: http://www.abcfolio.com
Text Domain: staff-list
Domain Path: /languages
Version: 0.2.1

------------------------------------------------------------------------
Copyright 2016 abcFolio.

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see http://www.gnu.org/licenses.
*/

if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! class_exists( 'ABCF_Staff_List' ) ) {

final class ABCF_Staff_List {

    private static $instance;
    public $pluginSlug = 'abcfolio-staff-list';
    public $prefix = 'abcfsl';
    public $pluginVersion = '0.2.1';

    /**
     * Main PLUGIN Instance
     * Insures that only one instance of plugin exists in memory at any one time. Also prevents needing to define globals all over the place.
     */
    public static function instance() {
            if ( ! isset( self::$instance ) && ! ( self::$instance instanceof ABCF_Staff_List ) ) {
                    self::$instance = new ABCF_Staff_List;
                    self::$instance->setup_constants();
                    self::$instance->includes();
                    self::$instance->setup_actions();
                    self::$instance->load_textdomain();
            }
            return self::$instance;
    }

    private function __construct (){}

     //Throw error on object clone. We don't want the object to be cloned.
    public function __clone() {
        _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'abcffs' ), '1.5' );
    }

    //Disable unserializing of the class
    public function __wakeup() {
        _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'abcffs' ), '1.5' );
    }

    private function setup_constants() {

        // Plugin version pversion
        if ( ! defined( 'ABCFSL_VERSION' ) ) { define( 'ABCFSL_VERSION', $this->pluginVersion ); }
        if ( ! defined( 'ABCFSL_ABSPATH' ) ) {  define('ABCFSL_ABSPATH', ABSPATH); }
        // Plugin Folder QPath
        if( ! defined( 'ABCFSL_PLUGIN_DIR' ) ){ define( 'ABCFSL_PLUGIN_DIR', plugin_dir_path( __FILE__ ) ); }
        // Plugin Folder URL
        if ( ! defined( 'ABCFSL_PLUGIN_URL' ) ) { define( 'ABCFSL_PLUGIN_URL', plugin_dir_url( __FILE__ ) ); }
        // Plugin Root File QPath
        if ( ! defined( 'ABCFSL_PLUGIN_FILE' ) ){ define( 'ABCFSL_PLUGIN_FILE', __FILE__ ); }
     }


    //Include required files
    private function includes() {
        require_once ABCFSL_PLUGIN_DIR . 'inc/db.php';
        require_once ABCFSL_PLUGIN_DIR . 'inc/post-types.php';
        require_once ABCFSL_PLUGIN_DIR . 'inc/scripts.php';
        require_once ABCFSL_PLUGIN_DIR . 'inc/cnt.php';
        require_once ABCFSL_PLUGIN_DIR . 'inc/cnt-list.php';
        require_once ABCFSL_PLUGIN_DIR . 'inc/shortcode.php';
        require_once ABCFSL_PLUGIN_DIR . 'inc/util.php';
        require_once ABCFSL_PLUGIN_DIR . 'library/abcfl-css.php';
        require_once ABCFSL_PLUGIN_DIR . 'library/abcfl-html.php';
        require_once ABCFSL_PLUGIN_DIR . 'library/utility.php';

        if( is_admin() ) {
            require_once ABCFSL_PLUGIN_DIR . 'admin/admin-scripts.php';
            require_once ABCFSL_PLUGIN_DIR . 'admin/dba.php';
            require_once ABCFSL_PLUGIN_DIR . 'admin/autil.php';
            require_once ABCFSL_PLUGIN_DIR . 'admin/class-menu.php';
            require_once ABCFSL_PLUGIN_DIR . 'admin/cbos.php';
            require_once ABCFSL_PLUGIN_DIR . 'admin/class-mbox-tplate.php';
            require_once ABCFSL_PLUGIN_DIR . 'admin/class-mbox-item.php';
            require_once ABCFSL_PLUGIN_DIR . 'admin/ajax-handlers.php';
            require_once ABCFSL_PLUGIN_DIR . 'admin/txt-admin.php';
            require_once ABCFSL_PLUGIN_DIR . 'library/abcfl-input.php';
            require_once ABCFSL_PLUGIN_DIR . 'library/abcfl-mbox-save.php';

            $mboxLst = new ABCFSL_MBox_List();
            $mboxLstItem = new ABCFSL_MBox_Item();
        }
    }

    private function setup_actions() {

        add_action( 'admin_print_styles-post-new.php', array( $this, 'remove_permalink' ), 1 );
        add_action( 'admin_print_styles-post.php', array( $this, 'remove_permalink' ), 1000 );
        add_action( 'load-edit.php', array( $this, 'add_custom_columns' ), 10, 2 );
        add_filter( 'post_row_actions', array( $this, 'remove_post_edit_links' ), 10, 1 );
    }

    //===CUSTOM COLUMNS=========================================================================================
   function add_custom_columns() {

        add_filter( 'manage_cpt_staff_lst_item_posts_columns', array( $this,'add_staff_columns'), 10 );
        add_action( 'manage_cpt_staff_lst_item_posts_custom_column', array( $this, 'render_staff_columns' ), 10, 2 );
        add_filter( 'manage_edit-cpt_staff_lst_item_sortable_columns', array( $this, 'add_sortable_columns' ));

        add_filter( 'manage_cpt_staff_lst_posts_columns', array( $this,'add_template_columns'), 10 );
        add_action( 'manage_cpt_staff_lst_posts_custom_column', array( $this, 'render_template_columns' ), 10, 2 );

        add_action( 'pre_get_posts', array( $this, 'lst_items_order'));

    }

    //Add custom columns to post list admin colums
    function add_staff_columns($defaults) {
        $defaults['menu-order'] = 'Order';
        $defaults['lst-name'] = 'List';
        $defaults['item-img'] = 'Image';
        $defaults['post-id'] = 'ID';
        return $defaults;
    }

    function add_template_columns($defaults) {
        $defaults['post-id'] = 'ID';
        return $defaults;
    }

    function render_template_columns($column_name, $postID) {
        if($column_name === 'post-id'){ echo $postID; }
    }

    function render_staff_columns($column_name, $postID) {

        $lstName = '';
        if ($column_name == 'lst-name') {

            $parentID = wp_get_post_parent_id( $postID );
            if($parentID){
                $parent = get_post($parentID);
                if($parent){$lstName = $parent->post_title;}
            }
            echo $lstName;
        }

        if ($column_name == 'item-img') {
            $imgUrl = get_post_meta( $postID, '_imgUrlL', true );
            echo abcfl_html_img_tag('', $imgUrl, '', '', 60);
        }

        if ($column_name == 'menu-order') { echo get_post_field( 'menu_order', $postID ); }
        if ($column_name == 'lst-id') {  echo get_post_field( 'post_parent', $postID ); }
        if($column_name === 'post-id'){ echo $postID; }
}

    function add_sortable_columns( $columns ) {
       $columns[ 'menu-order' ] = 'menu-order';
       return $columns;
    }

    function lst_items_order( $query ) {
       $postType = $query->get('post_type');

        if ( $postType == 'cpt_staff_lst_item') {
            if ( $query->get( 'orderby' ) == '' ) {
                $query->set( 'orderby', array( 'post_parent' => 'ASC', 'menu_order' => 'ASC',  ));
            }
            /* Post Order: ASC / DESC */
            if( $query->get( 'order' ) == '' ){
                $query->set( 'order', 'ASC' );
            }
        }
    }

    //Remove permalink and preview buttons from custom post screen.
    function remove_permalink() {
        global $post_type;;
        if ( abcfsl_autil_post_type( $post_type ) > 0 ) {
            echo '<style type="text/css">#edit-slug-box,#view-post-btn,#post-preview,.updated p a{display: none;}</style>';
        }
    }

    //Remove view and quick edit from custom posts list.
    function remove_post_edit_links( $actions ){

        $postType = get_post_type();
        if ( abcfsl_autil_post_type( $postType ) > 0 ) {
            unset( $actions['view'] );
            unset( $actions['inline hide-if-no-js'] );
        }
        return $actions;
    }

    // TODO
    function load_textdomain() {

        $pslug = $this->pluginSlug;
        $langDir = plugin_basename( dirname( __FILE__ ) ) . '/languages';

        // Set filter for plugin's languages directory
        $langDir = apply_filters( 'abcfsl_languages_directory', $langDir );

        // Traditional WordPress plugin locale filter
        $locale  = apply_filters( 'plugin_locale',  get_locale(), $pslug );
        $mofile  = sprintf( '%1$s-%2$s.mo', $pslug, $locale );

        // Setup paths to current locale file
        $mofileLocal  = $langDir . $mofile;
        $mofileGlobal = WP_LANG_DIR . '/' . $pslug . '/' . $mofile;

        if ( file_exists( $mofileGlobal ) ) {
            load_textdomain( $pslug, $mofileGlobal );
        } elseif ( file_exists( $mofileLocal ) ) {
            load_textdomain( $pslug, $mofileLocal );
        } else {
            load_plugin_textdomain( $pslug, false, $langDir );
        }
    }
}
} // End class_exists check
/**
 * The main function responsible for returning the one true ABCFSL_Main instance to functions everywhere.
 * Use this function like you would a global variable, except without needing to declare the global.
 * Example: $object = ABCFSL_Main();
 */
function ABCFSL_Main() {
    return ABCF_Staff_List::instance();
}
// Get plugin Running
ABCFSL_Main();