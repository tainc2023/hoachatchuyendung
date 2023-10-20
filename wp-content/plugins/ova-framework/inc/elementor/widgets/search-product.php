<?php
if ( ! defined('ABSPATH') ) {
	exit();
}

class Ova_Elementor_Search_Product extends \Elementor\Widget_Base {

	public function get_name() {
		return 'ova_elementor_search_product';
	}

	public function get_title() {
		return esc_html__( 'Seach Product', 'ova-framework' );
	}

	public function get_icon() {
		return 'eicon-search';
	}

	public function get_categories() {
		return [ 'ovatheme' ];
	}

	protected function register_controls() {

	}

	protected function render() {
		$settings 	= $this->get_settings_for_display();
		ob_start();
		ova_framework_get_template('elementor/search-product', $settings);
		echo ob_get_clean();
	}
}