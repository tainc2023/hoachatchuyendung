<?php
if ( ! defined('ABSPATH') ) {
	exit();
}

if ( ! class_exists('Ova_Framework_Assets') ) {
	class Ova_Framework_Assets {
		public function __construct(){
		// add_action('admin_enqueue_scripts',array($this,'ova_enqueue_admin_scripts'));
			add_action('wp_enqueue_scripts', array( $this, 'ova_enqueue_scripts' ) );
		}

		public function ova_enqueue_admin_scripts(){
		}
		public function ova_enqueue_scripts(){
			wp_enqueue_style( 'fontawesome', OFW_URL . 'assets/libs/fontawesome/fontawesome-all.min.css' , array(), '6.4.2', 'all' );
			wp_enqueue_style( 'ofw-style', OFW_URL . 'assets/css/frontend/style.css' );
		}
	}
	new Ova_Framework_Assets();
}

