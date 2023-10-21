<?php
if ( ! defined('ABSPATH') ) {
	exit();
}

if ( ! class_exists("Ova_Elementor") ) {
	class Ova_Elementor {
		public function __construct(){
			add_action( 'elementor/init', [ $this, 'init' ] );
		}

		public function init(){
			
			add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
			add_action( 'elementor/elements/categories_registered',[ $this, 'ova_elementor_widget_categories' ] );
		}

		public function ova_elementor_widget_categories( $elements_manager ) {

			$elements_manager->add_category(
				'ovatheme',
				[
					'title' => esc_html__( 'Ovatheme', 'ova-framework' ),
					'icon' => 'fa fa-plug',
				]
			);

		}

		public function register_widgets( $widgets_manager ) {

			require_once( OFW_PATH . 'inc/elementor/widgets/menu-footer.php' );
			require_once( OFW_PATH . 'inc/elementor/widgets/search-product.php' );
			require_once( OFW_PATH . 'inc/elementor/widgets/blog-grid.php' );

			$widgets_manager->register( new Ova_Elementor_Menu_Footer() );
			$widgets_manager->register( new Ova_Elementor_Search_Product() );
			$widgets_manager->register( new Ova_Elementor_Blog_Grid() );
		}
	}
	new Ova_Elementor();
}