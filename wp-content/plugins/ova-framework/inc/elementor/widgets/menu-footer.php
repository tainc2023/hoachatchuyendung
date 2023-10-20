<?php
if ( ! defined('ABSPATH') ) {
	exit();
}

class Ova_Elementor_Menu_Footer extends \Elementor\Widget_Base {

	public function get_name() {
		return 'ova_elementor_menu_footer';
	}

	public function get_title() {
		return esc_html__( 'Menu Footer', 'ova-framework' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'ovatheme' ];
	}

	protected function get_term_menu(){

		$args = array(
			'taxonomy'   => 'nav_menu',
			'hide_empty' => false,
			'orderby' => 'name',
			'order' => 'ASC',
			'fields' => 'id=>name'
		);
		$terms = get_terms( $args );

		return $terms;
	}

	protected function register_controls() {

		$this->start_controls_section(
				'content_section',
				[
					'label' => esc_html__( 'Content', 'ova-framework' ),
					'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);

			$this->add_control(
				'menu',
				[
					'label' => esc_html__( 'Menu', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => $this->get_term_menu(),
				]
			);

			$this->add_control(
				'direction',
				[
					'label' => esc_html__( 'Direction', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'block' => [
							'title' => esc_html__( 'Horizontal', 'ova-framework' ),
							'icon' => 'eicon-navigation-horizontal',
						],
					],
					'toggle' => true,
					'selectors' => [
						'{{WRAPPER}} .ova_menu_footer .menu' => 'display: inline-flex;flex-wrap: wrap;',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
				'style_section',
				[
					'label' => esc_html__( 'Style', 'ova-framework' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_responsive_control(
				'item_margin',
				[
					'label' => esc_html__( 'Margin', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
					'selectors' => [
						'{{WRAPPER}} .ova_menu_footer .menu .menu-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'item_padding',
				[
					'label' => esc_html__( 'Padding', 'ova-framework' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
					'selectors' => [
						'{{WRAPPER}} .ova_menu_footer .menu .menu-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'content_typography',
					'selector' => '{{WRAPPER}} .ova_menu_footer .menu .menu-item a',
				]
			);

			$this->start_controls_tabs(
					'style_tabs'
				);

				$this->start_controls_tab(
						'style_normal_tab',
						[
							'label' => esc_html__( 'Normal', 'ova-framework' ),
						]
					);

					$this->add_control(
						'text_color',
						[
							'label' => esc_html__( 'Color', 'ova-framework' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova_menu_footer .menu .menu-item a' => 'color: {{VALUE}}',
							],
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab(
						'style_hover_tab',
						[
							'label' => esc_html__( 'Hover', 'ova-framework' ),
						]
					);

					$this->add_control(
						'color_hover',
						[
							'label' => esc_html__( 'Color', 'ova-framework' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova_menu_footer .menu .menu-item a:hover' => 'color: {{VALUE}}',
							],
						]
					);

					$this->add_control(
						'text_decoration_color',
						[
							'label' => esc_html__( 'Decoration color', 'ova-framework' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova_menu_footer .menu .menu-item a:before' => 'background: {{VALUE}}',
							],
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab(
						'style_active_tab',
						[
							'label' => esc_html__( 'Active', 'ova-framework' ),
						]
					);

					$this->add_control(
						'text_color_active',
						[
							'label' => esc_html__( 'Color', 'ova-framework' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova_menu_footer .menu .current-menu-item a' => 'color: {{VALUE}}',
							],
						]
					);

				$this->end_controls_tab();

			$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render() {
		$settings 	= $this->get_settings_for_display();
		$menu 		= $settings['menu'];
		?>

		<nav class="ova_menu_footer">
			<?php
			if ( $menu ) {
				wp_nav_menu( array(
					'menu'            => $menu,
					'container'       => 'div',
					'container_class' => 'menu-container',
					'container_id'    => '',
					'menu_class'      => 'menu',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
					'depth'           => 0,
					'walker'          => '',
				) );
			}
			 ?>
		</nav>

		<?php
	}
}