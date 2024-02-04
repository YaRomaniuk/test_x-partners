<?php
/**
 * Plugin Name:       Cities
 * Description:       cities and relations
 * Version:           1.0
 * Author:            Yaroslav Romaniuk
 * License:           GPL2
 */

if( !defined( 'ABSPATH')) exit();
define('SAR_URL', plugin_dir_url(__FILE__));
define('SAR_DIR', plugin_dir_path(__FILE__));
define('SAR_PATH', dirname( __FILE__ ));


use Elementor\Plugin;

add_action( 'plugins_loaded', array( 'InitCitiesAndRelations', 'init' ) );
class InitCitiesAndRelations {

    protected static $instance = NULL;

    public static function init()
    {
        is_null( self::$instance ) AND self::$instance = new self;
        return self::$instance;
    }

    static function activation()
    {
        if ( ! current_user_can( 'activate_plugins' ) )
            return;

        $plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
        check_admin_referer( "activate-plugin_{$plugin}" );
    }

    static function deactivation()
    {
        if ( ! current_user_can( 'activate_plugins' ) )
            return;

        $plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
        check_admin_referer( "deactivate-plugin_{$plugin}" );

    }

    public static function uninstall()
    {
        if ( ! current_user_can( 'activate_plugins' ) )
            return;

        check_admin_referer( 'bulk-plugins' );

        if ( __FILE__ != WP_UNINSTALL_PLUGIN )
            return;
    }

    function __construct() {
        require_once SAR_DIR.'classes/CitiesAndRelations.php';
        \CitiesAndRelations::run();
    }
}


