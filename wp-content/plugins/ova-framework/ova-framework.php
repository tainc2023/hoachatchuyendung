<?php
/*
 * Plugin Name:       OvaFramework
 * Plugin URI:        
 * Description:       OvaFramework plugin
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Tai Nguyen Cong
 * Author URI:        
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        
 * Text Domain:       ova-framework
 * Domain Path:       /languages
 */
if ( ! defined('ABSPATH') ) {
	exit();
}

class Ova_Framework {

    public static function init() {
        $class = __CLASS__;
        new $class;
    }

    public function __construct() {
        $this->defines();
        $this->includes();
    }

    public function defines(){
    	define('OFW_PATH', plugin_dir_path( __FILE__ ));
    	define('OFW_URL', plugin_dir_url( __FILE__ ));

        $plugin_rel_path = basename( dirname( __FILE__ ) ) . '/languages';
        load_plugin_textdomain( 'ova-framework', false, $plugin_rel_path );
    }

    public function includes(){
    	
        include OFW_PATH . 'inc/core-function.php';
        // include OFW_PATH . 'inc/class-CPT.php';
        // include OFW_PATH . 'inc/class-ova-custom-controls.php';;
    	include OFW_PATH . 'inc/class-ova-assets.php';
        // include OFW_PATH . 'inc/class-template-loader.php';
    	// include OFW_PATH . 'admin/class-metaboxes.php';
        include OFW_PATH . 'inc/class-ova-elementor.php';
    }
}

add_action( 'plugins_loaded', array( 'Ova_Framework', 'init' ));
