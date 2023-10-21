<?php
if ( ! defined('ABSPATH') ) {
	exit();
}

class Ova_Elementor_Blog_Grid extends \Elementor\Widget_Base {

	public function get_name() {
		return 'ova_elementor_blog_grid';
	}

	public function get_title() {
		return esc_html__( 'Blog Grid', 'ova-framework' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	public function get_categories() {
		return [ 'ovatheme' ];
	}

	protected function get_blog_category(){
		$categories = array(
			'0' => esc_html__( 'All', 'ova-framework' )
		);
		$args = array(
			'hide_empty' => false,
			'fields' => 'id=>name',
		);
		$categories = array_merge( $categories, get_categories( $args ) );
		return $categories;
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
			'column',
			[
				'label' => esc_html__( 'Column', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'2' => esc_html__( '2', 'ova-framework' ),
					'3' => esc_html__( '3', 'ova-framework' ),
					'4' => esc_html__( '4', 'ova-framework' ),
				]
			]
		);

		$this->add_control(
			'items',
			[
				'label' => esc_html__( 'Items', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 3,
			]
		);

		$this->add_control(
			'cat_id',
			[
				'label' => esc_html__( 'Category', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '0',
				'options' => $this->get_blog_category(),
			]
		);

		$this->add_control(
			'orderby',
			[
				'label' => esc_html__( 'Orderby', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'none' => esc_html__( 'None', 'ova-framework' ),
					'name' => esc_html__( 'Name', 'ova-framework' ),
					'ID' => esc_html__( 'ID', 'ova-framework' ),
					'author' => esc_html__( 'Author', 'ova-framework' ),
					'title' => esc_html__( 'Title', 'ova-framework' ),
					'date' => esc_html__( 'Date', 'ova-framework' ),
					'rand' => esc_html__( 'Random', 'ova-framework' ),
				]
			]
		);

		$this->add_control(
			'order',
			[
				'label' => esc_html__( 'Order', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'ASC' => esc_html__( 'Ascending', 'ova-framework' ),
					'DESC' => esc_html__( 'Descending', 'ova-framework' ),
				]
			]
		);

		$this->end_controls_section();

		/*item_section*/
		$this->start_controls_section(
			'item_section',
			[
				'label' => esc_html__( 'Item', 'ova-framework' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'item_box_shadow',
				'selector' => '{{WRAPPER}} .ova-blog-grid .grid .ova-blog',
			]
		);

		$this->end_controls_section();
		/*end*/

		/*info_section*/
		$this->start_controls_section(
			'info_section',
			[
				'label' => esc_html__( 'Info', 'ova-framework' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'info_padding',
			[
				'label' => esc_html__( 'Padding', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .ova-blog-grid .grid .ova-blog .info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'info_bg_color',
			[
				'label' => esc_html__( 'Background', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog-grid .grid .ova-blog .info' => 'background: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		/*end*/

		/*title_section*/
		$this->start_controls_section(
			'title_section',
			[
				'label' => esc_html__( 'Title', 'ova-framework' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Margin', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .ova-blog-grid .grid .ova-blog .info .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ova-blog-grid .grid .ova-blog .info .title a',
			]
		);

		$this->start_controls_tabs(
			'title_tabs'
		);
		// tab
		$this->start_controls_tab(
			'title_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'ova-framework' ),
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog-grid .grid .ova-blog .info .title a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();
		// tab
		$this->start_controls_tab(
			'title_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'ova-framework' ),
			]
		);

		$this->add_control(
			'title_color_hover',
			[
				'label' => esc_html__( 'Hover', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog-grid .grid .ova-blog .info .title a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		// end tab

		$this->end_controls_section();
		/*end*/

		/*title_section*/
		$this->start_controls_section(
			'desc_section',
			[
				'label' => esc_html__( 'Description', 'ova-framework' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'desc_margin',
			[
				'label' => esc_html__( 'Margin', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .ova-blog-grid .grid .ova-blog .info .short_desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'selector' => '{{WRAPPER}} .ova-blog-grid .grid .ova-blog .info .short_desc',
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => esc_html__( 'Color', 'ova-framework' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog-grid .grid .ova-blog .info .short_desc' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		/*end*/
	}

	protected function render() {
		$settings 	= $this->get_settings_for_display();
		ob_start();
		ova_framework_get_template('elementor/blog-grid', $settings);
		echo ob_get_clean();
	}
}