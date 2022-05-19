<?php

class HotelsPage extends \Elementor\Widget_Base
{

	public function __construct($data = [], $args = null)
	{
		parent::__construct($data, $args);

		wp_register_script('hotels-list_js',  plugins_url('/OBPress_HotelsPage/widget/assets/js/hotels.js'), ['elementor-frontend'], '1.0.0', true);

		wp_register_style('hotels-list_css', plugins_url('/OBPress_HotelsPage/widget/assets/css/hotels.css'));
	}

	public function get_script_depends()
	{
		return ['hotels-list_js'];
	}

	public function get_style_depends()
	{
		return ['hotels-list_css'];
	}

	public function get_name()
	{
		return 'HotelsPage';
	}

	public function get_title()
	{
		return __('Hotels Page', 'OBPress_HotelsPage');
	}

	public function get_icon()
	{
		return 'fa fa-calendar';
	}

	public function get_categories()
	{
		return ['OBPress'];
	}

	protected function _register_controls()
	{

		// $this->start_controls_section(
		// 	'color_main_section',
		// 	[
		// 		'label' => __('Titles', 'OBPress_SpecialOffersList'),
		// 		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_title_color',
		// 	[
		// 		'label' => __('Packages Title Color', 'OBPress_SpecialOffersList'),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'input_type' => 'color',
		// 		'default' => '#000',
		// 		'selectors' => [
		// 			'.packages .packages_header_message' => 'color: {{obpress_packages_title_color}}'
		// 		],
		// 	]
		// );

		// $this->add_group_control(
		// 	\Elementor\Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'packages_title_text_typography',
		// 		'label' => __('Packages Title Typography', 'OBPress_SpecialOffersList'),
		// 		'selector' => '.packages .packages_header_message',
		// 		'fields_options' => [
		// 			'typography' => [
		// 				'default' => 'yes'
		// 			],
		// 			'font_family' => [
		// 				'default' => 'Montserrat',
		// 			],
		// 			'font_size' => [
		// 				'default' => [
		// 					'unit' => 'px',
		// 					'size' => '24',
		// 				],
		// 			],
		// 			'font_weight' => [
		// 				'default' => '700',
		// 			],
		// 			'line_height' => [
		// 				'default' => [
		// 					'unit' => 'px',
		// 					'size' => '29',
		// 				],
		// 			],
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_title_margin',
		// 	[
		// 		'label' => __( 'Packages Title Margin', 'OBPress_SpecialOffersList' ),
		// 		'type' => \Elementor\Controls_Manager::DIMENSIONS,
		// 		'default' => [
		// 			'top' => '20',
		// 			'right' => '0',
		// 			'bottom' => '25',
		// 			'left' => '0',
		// 			'isLinked' => false
		// 		],
		// 		'size_units' => [ 'px', '%', 'em' ],
		// 		'selectors' => [
		// 			'.packages .packages_header_message' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_title_text_align',
		// 	[
		// 		'label' => __( 'Packages Title Text Align', 'OBPress_SpecialOffersList' ),
		// 		'type' => \Elementor\Controls_Manager::SELECT,
		// 		'default' => 'left',
		// 		'options' => [
		// 			'left'  => __( 'Left', 'OBPress_SpecialOffersList' ),
		// 			'center'  => __( 'Center', 'OBPress_SpecialOffersList' ),
		// 			'right'  => __( 'Right', 'OBPress_SpecialOffersList' ),
		// 		],
		// 		'selectors' => [
		// 			'.packages .packages_header_message' => 'text-align: {{packages_justify_content_cards}}'
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_hotel_name_color',
		// 	[
		// 		'label' => __('Packages Hotel Name Color', 'OBPress_SpecialOffersList'),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'input_type' => 'color',
		// 		'default' => '#000',
		// 		'selectors' => [
		// 			'.packages .hotel_name' => 'color: {{obpress_packages_hotel_name_color}}'
		// 		],
		// 	]
		// );

		// $this->add_group_control(
		// 	\Elementor\Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'packages_hotel_name_text_typography',
		// 		'label' => __('Packages Hotel Name Typography', 'OBPress_SpecialOffersList'),
		// 		'selector' => '.packages .hotel_name',
		// 		'fields_options' => [
		// 			'typography' => [
		// 				'default' => 'yes'
		// 			],
		// 			'font_family' => [
		// 				'default' => 'Montserrat',
		// 			],
		// 			'font_size' => [
		// 				'default' => [
		// 					'unit' => 'px',
		// 					'size' => '20',
		// 				],
		// 			],
		// 			'font_weight' => [
		// 				'default' => '700',
		// 			],
		// 			'line_height' => [
		// 				'default' => [
		// 					'unit' => 'px',
		// 					'size' => '24',
		// 				],
		// 			],
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_hotel_name_margin',
		// 	[
		// 		'label' => __( 'Packages Hotel Name Margin', 'OBPress_SpecialOffersList' ),
		// 		'type' => \Elementor\Controls_Manager::DIMENSIONS,
		// 		'default' => [
		// 			'top' => '50',
		// 			'right' => '0',
		// 			'bottom' => '0',
		// 			'left' => '0',
		// 			'isLinked' => false
		// 		],
		// 		'size_units' => [ 'px', '%', 'em' ],
		// 		'selectors' => [
		// 			'.packages .hotel_name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_hotel_name_text_align',
		// 	[
		// 		'label' => __( 'Packages Hotel Name Text Align', 'OBPress_SpecialOffersList' ),
		// 		'type' => \Elementor\Controls_Manager::SELECT,
		// 		'default' => 'left',
		// 		'options' => [
		// 			'left'  => __( 'Left', 'OBPress_SpecialOffersList' ),
		// 			'center'  => __( 'Center', 'OBPress_SpecialOffersList' ),
		// 			'right'  => __( 'Right', 'OBPress_SpecialOffersList' ),
		// 		],
		// 		'selectors' => [
		// 			'.packages .hotel_name' => 'text-align: {{packages_justify_content_cards}}'
		// 		],
		// 	]
		// );

		// $this->end_controls_section();

		// $this->start_controls_section(
		// 	'packages_justify_content',
		// 	[
		// 		'label' => __('Packages Cards', 'OBPress_SpecialOffersList'),
		// 		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		// 	]
		// );

		// $this->add_control(
		// 	'packages_justify_content_cards',
		// 	[
		// 		'label' => __( 'Cards Justify Content', 'OBPress_SpecialOffersList' ),
		// 		'type' => \Elementor\Controls_Manager::SELECT,
		// 		'default' => 'space-between',
		// 		'options' => [
		// 			'space-between'  => __( 'Space Between', 'OBPress_SpecialOffersList' ),
		// 			'space-around'  => __( 'Space Around', 'OBPress_SpecialOffersList' ),
		// 			'space-evenly'  => __( 'Space Evenly', 'OBPress_SpecialOffersList' ),
		// 			'center' => __( 'Center', 'OBPress_SpecialOffersList' ),
		// 			'flex-end'  => __( 'Flex End', 'OBPress_SpecialOffersList' ),
		// 			'flex-start'  => __( 'Flex Start', 'OBPress_SpecialOffersList' ),
		// 		],
		// 		'selectors' => [
		// 			'.packages .packages-per-hotel' => 'justify-content: {{packages_justify_content_cards}}'
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'packages_cards_margin',
		// 	[
		// 		'label' => __( 'Cards Margin', 'OBPress_SpecialOffersList' ),
		// 		'type' => \Elementor\Controls_Manager::DIMENSIONS,
		// 		'default' => [
		// 			'top' => '29',
		// 			'right' => '0',
		// 			'bottom' => '29',
		// 			'left' => '0',
		// 			'isLinked' => false
		// 		],
		// 		'size_units' => [ 'px', '%', 'em' ],
		// 		'selectors' => [
		// 			'.packages .package-card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_card_image_width',
		// 	[
		// 		'label' => __( 'Cards Image Width', 'OBPress_SpecialOffersList' ),
		// 		'type' => \Elementor\Controls_Manager::SLIDER,
		// 		'default' => [
		// 			'size' => 174,
		// 		],
		// 		'range' => [
		// 			'px' => [
		// 				'max' => 260,
		// 				'step' => 1,
		// 			],
		// 		],
		// 		'render_type' => 'ui',
		// 		'selectors' => [
		// 			'.packages .package-card-img' => 'width: {{SIZE}}px',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_card_ribon_position',
		// 	[
		// 		'label' => __( 'Cards Ribon Top Position', 'OBPress_SpecialOffersList' ),
		// 		'type' => \Elementor\Controls_Manager::SLIDER,
		// 		'default' => [
		// 			'size' => 13,
		// 		],
		// 		'range' => [
		// 			'px' => [
		// 				'max' => 279,
		// 				'step' => 1,
		// 			],
		// 		],
		// 		'render_type' => 'ui',
		// 		'selectors' => [
		// 			'.packages .package-card-best-price' => 'top: {{SIZE}}px',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'packages_cards_padding',
		// 	[
		// 		'label' => __( 'Cards Padding', 'OBPress_SpecialOffersList' ),
		// 		'type' => \Elementor\Controls_Manager::DIMENSIONS,
		// 		'default' => [
		// 			'top' => '18.8',
		// 			'right' => '27.7',
		// 			'bottom' => '21.83',
		// 			'left' => '23.11',
		// 			'isLinked' => false
		// 		],
		// 		'size_units' => [ 'px', '%', 'em' ],
		// 		'selectors' => [
		// 			'.packages .package-card-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'packages_justify_content_btn_and_price',
		// 	[
		// 		'label' => __( 'Button And Price Justify Content', 'OBPress_SpecialOffersList' ),
		// 		'type' => \Elementor\Controls_Manager::SELECT,
		// 		'default' => 'space-between',
		// 		'options' => [
		// 			'space-between'  => __( 'Space Between', 'OBPress_SpecialOffersList' ),
		// 			'space-around'  => __( 'Space Around', 'OBPress_SpecialOffersList' ),
		// 			'space-evenly'  => __( 'Space Evenly', 'OBPress_SpecialOffersList' ),
		// 			'center' => __( 'Center', 'OBPress_SpecialOffersList' ),
		// 			'flex-end'  => __( 'Flex End', 'OBPress_SpecialOffersList' ),
		// 			'flex-start'  => __( 'Flex Start', 'OBPress_SpecialOffersList' ),
		// 		],
		// 		'selectors' => [
		// 			'.packages .price-and-button-holder' => 'justify-content: {{packages_justify_content_btn_and_price}}'
		// 		],
		// 	]
		// );

		// $this->end_controls_section();

		// $this->start_controls_section(
		// 	'color_cards_section',
		// 	[
		// 		'label' => __('Packages Cards Color', 'OBPress_SpecialOffersList'),
		// 		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_cards_bg_color',
		// 	[
		// 		'label' => __('Cards Background Color', 'OBPress_SpecialOffersList'),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'input_type' => 'color',
		// 		'default' => '#fff',
		// 		'selectors' => [
		// 			'.packages .package-card-body' => 'background-color: {{obpress_packages_cards_bg_color}}'
		// 		],
		// 	]
		// );

		// $this->add_group_control(
		// 	\Elementor\Group_Control_Box_Shadow::get_type(),
		// 	[
		// 		'name' => 'box_shadow',
		// 		'label' => esc_html__( 'Cards Box Shadow', 'OBPress_SpecialOffersList' ),
		// 		'selector' => '{{WRAPPER}} .packages .package-card',
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_cards_lowest_price_color',
		// 	[
		// 		'label' => __('Ribbon Color', 'OBPress_SpecialOffersList'),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'input_type' => 'color',
		// 		'default' => '#fff',
		// 		'selectors' => [
		// 			'.packages .text' => 'color: {{obpress_packages_cards_bg_color}}'
		// 		],
		// 	]
		// );

		// $this->add_group_control(
		// 	\Elementor\Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'packages_ribon_text_typography',
		// 		'label' => __('Ribbon Text Typography', 'OBPress_SpecialOffersList'),
		// 		'selector' => '.packages .text',
		// 		'fields_options' => [
		// 			'typography' => [
		// 				'default' => 'yes'
		// 			],
		// 			'font_family' => [
		// 				'default' => 'Montserrat',
		// 			],
		// 			'font_size' => [
		// 				'default' => [
		// 					'unit' => 'px',
		// 					'size' => '16',
		// 				],
		// 			],
		// 			'font_weight' => [
		// 				'default' => '500',
		// 			],
		// 			'line_height' => [
		// 				'default' => [
		// 					'unit' => 'px',
		// 					'size' => '19',
		// 				],
		// 			],
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_cards_lowest_price_bg_color',
		// 	[
		// 		'label' => __('Ribbon Background Color', 'OBPress_SpecialOffersList'),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'input_type' => 'color',
		// 		'default' => '#82B789',
		// 		'selectors' => [
		// 			'.packages .text' => 'background-color: {{obpress_packages_cards_lowest_price_bg_color}}',
		// 			'.packages .text:before' => 'border-top-color: {{obpress_packages_cards_lowest_price_bg_color}}'
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_cards_divider_color',
		// 	[
		// 		'label' => __('Cards Divider Color', 'OBPress_SpecialOffersList'),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'input_type' => 'color',
		// 		'default' => '#E6E6E6',
		// 		'selectors' => [
		// 			'{{WRAPPER}} .packages .package-card-body-top' => 'border-bottom-color: {{obpress_packages_cards_divider_color}}'
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_card_divider_height',
		// 	[
		// 		'label' => __( 'Cards Divider Height', 'OBPress_SpecialOffersList' ),
		// 		'type' => \Elementor\Controls_Manager::SLIDER,
		// 		'default' => [
		// 			'size' => 1,
		// 		],
		// 		'range' => [
		// 			'px' => [
		// 				'max' => 5,
		// 				'step' => 0.1,
		// 			],
		// 		],
		// 		'render_type' => 'ui',
		// 		'selectors' => [
		// 			'.packages .package-card-body-top' => 'border-bottom: {{SIZE}}px solid',
		// 		],
		// 	]
		// );

		// $this->end_controls_section();

		// $this->start_controls_section(
		// 	'color_cards_elements_section',
		// 	[
		// 		'label' => __('Packages Cards Elements Style', 'OBPress_SpecialOffersList'),
		// 		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		// 	]
		// );

		// $this->add_control(
		// 	'ribbon_padding',
		// 	[
		// 		'label' => __( 'Ribbon Padding', 'OBPress_SpecialOffersList' ),
		// 		'type' => \Elementor\Controls_Manager::DIMENSIONS,
		// 		'default' => [
		// 			'top' => '10',
		// 			'right' => '26',
		// 			'bottom' => '10',
		// 			'left' => '26',
		// 			'isLinked' => false
		// 		],
		// 		'size_units' => [ 'px', '%', 'em' ],
		// 		'selectors' => [
		// 			'.packages .text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_card_name_color',
		// 	[
		// 		'label' => __('Package Name Color', 'OBPress_SpecialOffersList'),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'input_type' => 'color',
		// 		'default' => '#000',
		// 		'selectors' => [
		// 			'.packages .package-card-title' => 'color: {{obpress_packages_card_name_color}}'
		// 		],
		// 	]
		// );

		// $this->add_group_control(
		// 	\Elementor\Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'obpress_packages_card_name_typography',
		// 		'label' => __('Package Name Typography', 'OBPress_SpecialOffersList'),
		// 		'selector' => '.packages .package-card-title',
		// 		'fields_options' => [
		// 			'typography' => [
		// 				'default' => 'yes'
		// 			],
		// 			'font_family' => [
		// 				'default' => 'Montserrat',
		// 			],
		// 			'font_size' => [
		// 				'default' => [
		// 					'unit' => 'px',
		// 					'size' => '20',
		// 				],
		// 			],
		// 			'font_weight' => [
		// 				'default' => '700',
		// 			],
		// 			'line_height' => [
		// 				'default' => [
		// 					'unit' => 'px',
		// 					'size' => '24',
		// 				],
		// 			],
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_card_name_text_align',
		// 	[
		// 		'label' => __( 'Packages Name Text Align', 'OBPress_SpecialOffersList' ),
		// 		'type' => \Elementor\Controls_Manager::SELECT,
		// 		'default' => 'left',
		// 		'options' => [
		// 			'left'  => __( 'Left', 'OBPress_SpecialOffersList' ),
		// 			'center'  => __( 'Center', 'OBPress_SpecialOffersList' ),
		// 			'right'  => __( 'Right', 'OBPress_SpecialOffersList' ),
		// 		],
		// 		'selectors' => [
		// 			'.packages .package-card-title' => 'text-align: {{obpress_packages_card_name_text_align}}'
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_card_name_padding',
		// 	[
		// 		'label' => __( 'Packages Name Padding', 'OBPress_SpecialOffersList' ),
		// 		'type' => \Elementor\Controls_Manager::DIMENSIONS,
		// 		'default' => [
		// 			'top' => '0',
		// 			'right' => '0',
		// 			'bottom' => '17.48',
		// 			'left' => '0',
		// 			'isLinked' => false
		// 		],
		// 		'size_units' => [ 'px', '%', 'em' ],
		// 		'selectors' => [
		// 			'.packages .package-card-body-top' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_card_description_color',
		// 	[
		// 		'label' => __('Package Description Color', 'OBPress_SpecialOffersList'),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'input_type' => 'color',
		// 		'default' => '#2C2F33',
		// 		'selectors' => [
		// 			'.packages .package-card-text-desktop' => 'color: {{obpress_packages_card_description_color}}',
		// 			'.packages .package-card-text-mobile' => 'color: {{obpress_packages_card_description_color}}'
		// 		],
		// 	]
		// );

		// $this->add_group_control(
		// 	\Elementor\Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'obpress_packages_card_description_typography',
		// 		'label' => __('Package Description Typography', 'OBPress_SpecialOffersList'),
		// 		'selector' => [
		// 			'.packages .package-card-text-desktop',
		// 			'.packages .package-card-text-mobile',
		// 		],
		// 		'fields_options' => [
		// 			'typography' => [
		// 				'default' => 'yes'
		// 			],
		// 			'font_family' => [
		// 				'default' => 'Montserrat',
		// 			],
		// 			'font_size' => [
		// 				'default' => [
		// 					'unit' => 'px',
		// 					'size' => '14',
		// 				],
		// 			],
		// 			'font_weight' => [
		// 				'default' => '400',
		// 			],
		// 			'line_height' => [
		// 				'default' => [
		// 					'unit' => 'px',
		// 					'size' => '20',
		// 				],
		// 			],
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_card_description_text_align',
		// 	[
		// 		'label' => __( 'Packages Card Description Text Align', 'OBPress_SpecialOffersList' ),
		// 		'type' => \Elementor\Controls_Manager::SELECT,
		// 		'default' => 'left',
		// 		'options' => [
		// 			'left'  => __( 'Left', 'OBPress_SpecialOffersList' ),
		// 			'center'  => __( 'Center', 'OBPress_SpecialOffersList' ),
		// 			'right'  => __( 'Right', 'OBPress_SpecialOffersList' ),
		// 		],
		// 		'selectors' => [
		// 			'.packages .package-card-text-desktop' => 'text-align: {{obpress_packages_card_description_text_align}}',
		// 			'.packages .package-card-text-mobile' => 'text-align: {{obpress_packages_card_description_text_align}}'
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_card_description_margin',
		// 	[
		// 		'label' => __( 'Packages Card Description Text Margin', 'OBPress_SpecialOffersList' ),
		// 		'type' => \Elementor\Controls_Manager::DIMENSIONS,
		// 		'default' => [
		// 			'top' => '17.48',
		// 			'right' => '0',
		// 			'bottom' => '17.48',
		// 			'left' => '0',
		// 			'isLinked' => false
		// 		],
		// 		'size_units' => [ 'px', '%', 'em' ],
		// 		'selectors' => [
		// 			'.packages .package-card-text-desktop' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		// 			'.packages .package-card-text-mobile' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'packages_justify_content_description_and_button',
		// 	[
		// 		'label' => __( 'Description Justify Content', 'OBPress_SpecialOffersList' ),
		// 		'type' => \Elementor\Controls_Manager::SELECT,
		// 		'default' => 'space-between',
		// 		'options' => [
		// 			'space-between'  => __( 'Space Between', 'OBPress_SpecialOffersList' ),
		// 			'space-around'  => __( 'Space Around', 'OBPress_SpecialOffersList' ),
		// 			'space-evenly'  => __( 'Space Evenly', 'OBPress_SpecialOffersList' ),
		// 			'center' => __( 'Center', 'OBPress_SpecialOffersList' ),
		// 			'flex-end'  => __( 'Flex End', 'OBPress_SpecialOffersList' ),
		// 			'flex-start'  => __( 'Flex Start', 'OBPress_SpecialOffersList' ),
		// 		],
		// 		'selectors' => [
		// 			'.packages .package-card-body-bottom' => 'justify-content: {{packages_justify_content_description_and_button}}'
		// 		],
		// 	]
		// );

		// $this->end_controls_section();

		// $this->start_controls_section(
		// 	'color_cards_price_section',
		// 	[
		// 		'label' => __('Packages Cards Price Style', 'OBPress_SpecialOffersList'),
		// 		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_card_price_text_color',
		// 	[
		// 		'label' => __('Packages Price Text Color', 'OBPress_SpecialOffersList'),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'input_type' => 'color',
		// 		'default' => '#000',
		// 		'selectors' => [
		// 			'.packages .price-text' => 'color: {{obpress_packages_card_price_text_color}}'
		// 		],
		// 	]
		// );

		// $this->add_group_control(
		// 	\Elementor\Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'packages_price_text_typography',
		// 		'label' => __('Packages Price Text Typography', 'OBPress_SpecialOffersList'),
		// 		'selector' => '.packages .price-text',
		// 	]
		// );

		// $this->add_control(
		// 	'packages_price_text_text_align',
		// 	[
		// 		'label' => __( 'Packages Price Text Align', 'OBPress_SpecialOffersList' ),
		// 		'type' => \Elementor\Controls_Manager::SELECT,
		// 		'default' => 'left',
		// 		'options' => [
		// 			'left'  => __( 'Left', 'OBPress_SpecialOffersList' ),
		// 			'center'  => __( 'Center', 'OBPress_SpecialOffersList' ),
		// 			'right'  => __( 'Right', 'OBPress_SpecialOffersList' ),
		// 		],
		// 		'selectors' => [
		// 			'.packages .price-text' => 'text-align: {{obpress_packages_card_name_text_align}}'
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_card_price_color',
		// 	[
		// 		'label' => __('Packages Price Color', 'OBPress_SpecialOffersList'),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'input_type' => 'color',
		// 		'default' => '#BEAD8E',
		// 		'selectors' => [
		// 			'.packages .price' => 'color: {{obpress_packages_card_price_color}}'
		// 		],
		// 	]
		// );

		// $this->add_group_control(
		// 	\Elementor\Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'packages_price_currency_typography',
		// 		'label' => __('Packages Price Currency Typography', 'OBPress_SpecialOffersList'),
		// 		'selector' => '.packages .price .currency_symbol_price',
		// 	]
		// );

		// $this->add_group_control(
		// 	\Elementor\Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'packages_price_typography',
		// 		'label' => __('Packages Price Typography', 'OBPress_SpecialOffersList'),
		// 		'selector' => '.packages .price',
		// 	]
		// );

		// $this->add_group_control(
		// 	\Elementor\Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'packages_price_deciaml_typography',
		// 		'label' => __('Packages Decimal Price Typography', 'OBPress_SpecialOffersList'),
		// 		'selector' => '.packages .price .decimal_value_price',
		// 	]
		// );

		// $this->end_controls_section();

		// $this->start_controls_section(
		// 	'color_cards_button_section',
		// 	[
		// 		'label' => __('Packages Cards Button Style', 'OBPress_SpecialOffersList'),
		// 		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_card_button_color',
		// 	[
		// 		'label' => __('Button Color', 'OBPress_SpecialOffersList'),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'input_type' => 'color',
		// 		'default' => '#FFF',
		// 		'selectors' => [
		// 			'.packages .package-button' => 'color: {{obpress_packages_card_button_color}}'
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_card_button_hover_color',
		// 	[
		// 		'label' => __('Button Hover Color', 'OBPress_SpecialOffersList'),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'input_type' => 'color',
		// 		'default' => '#FFF',
		// 		'selectors' => [
		// 			'.packages .package-button:hover' => 'color: {{obpress_packages_card_button_color}}'
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_card_button_background_color',
		// 	[
		// 		'label' => __('Button Backgorund Color', 'OBPress_SpecialOffersList'),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'input_type' => 'color',
		// 		'default' => '#000',
		// 		'selectors' => [
		// 			'.packages .package-button' => 'background-color: {{obpress_packages_card_button_color}}'
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_card_button_hover_background_color',
		// 	[
		// 		'label' => __('Button Hover Background Color', 'OBPress_SpecialOffersList'),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'input_type' => 'color',
		// 		'default' => '#000',
		// 		'selectors' => [
		// 			'.packages .package-button:hover' => 'background-color: {{obpress_packages_card_button_color}}'
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_card_button_hover_Transition',
		// 	[
		// 		'label' => __( 'Button Transition Duration', 'OBPress_SpecialOffersList' ),
		// 		'type' => \Elementor\Controls_Manager::SLIDER,
		// 		'default' => [
		// 			'size' => 0.3,
		// 		],
		// 		'range' => [
		// 			'px' => [
		// 				'max' => 3,
		// 				'step' => 0.1,
		// 			],
		// 		],
		// 		'render_type' => 'ui',
		// 		'selectors' => [
		// 			'{{WRAPPER}} .packages .package-button' => 'transition-duration: {{SIZE}}s',
		// 		],
		// 	]
		// );

		// $this->add_group_control(
		// 	\Elementor\Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'packages_button_typography',
		// 		'label' => __('Button Typography', 'OBPress_SpecialOffersList'),
		// 		'selector' => '.packages .package-button',
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_card_button_padding',
		// 	[
		// 		'label' => __( 'Button Padding', 'OBPress_SpecialOffersList' ),
		// 		'type' => \Elementor\Controls_Manager::DIMENSIONS,
		// 		'default' => [
		// 			'top' => '11',
		// 			'right' => '33',
		// 			'bottom' => '11',
		// 			'left' => '33',
		// 			'isLinked' => false
		// 		],
		// 		'size_units' => [ 'px', '%', 'em' ],
		// 		'selectors' => [
		// 			'.packages .package-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		// 		],
		// 	]
		// );

		// $this->add_group_control(
		// 	\Elementor\Group_Control_Border::get_type(),
		// 	[
		// 		'name' => 'border',
		// 		'label' => esc_html__( 'Button Border', 'OBPress_SpecialOffersList' ),
		// 		'selector' => '{{WRAPPER}} .packages .package-button',
		// 	]
		// );

		// $this->add_control(
		// 	'obpress_packages_card_button_border_radius',
		// 	[
		// 		'label' => __( 'Button Border Radius', 'OBPress_SpecialOffersList' ),
		// 		'type' => \Elementor\Controls_Manager::DIMENSIONS,
		// 		'default' => [
		// 			'top' => '0',
		// 			'right' => '0',
		// 			'bottom' => '0',
		// 			'left' => '0',
		// 			'isLinked' => false
		// 		],
		// 		'size_units' => [ 'px', '%', 'em' ],
		// 		'selectors' => [
		// 			'.packages .package-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		// 		],
		// 	]
		// );


		// $this->end_controls_section();

	}

	protected function render()
	{

		if (get_option('obpress_api_set') == true) {

			require_once(WP_CONTENT_DIR . '/plugins/obpress_plugin_manager/BeApi/BeApi.php');
			require_once(WP_CONTENT_DIR . '/plugins/obpress_plugin_manager/BeApi/BeApi.php');
			require_once(WP_PLUGIN_DIR . '/obpress_plugin_manager/class-lang-curr-functions.php');
			require_once('hotels-helper.php');
			require_once('hotels-list-controler.php');
			
		}

		require_once(WP_PLUGIN_DIR . '/OBPress_HotelsPage/widget/assets/templates/template.php');
	}
}
