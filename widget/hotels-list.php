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

		$this->start_controls_section(
			'hotels_main_section',
			[
				'label' => __('Search Section', 'OBPress_HotelsPage'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'hotels_search_section_height',
			[
				'label' => __( 'Height', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 400,
						'min' => 50,
						'step' => 1,
					],
				],
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'size' => 197,
				],
				'mobile_default' => [
					'size' => 137,
				],
				'render_type' => 'ui',
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-search-header-hotels' => 'height: {{SIZE}}px',
				],
			]
		);

		$this->add_responsive_control(
			'hotels_search_section_padding',
			[
				'label' => __( 'Padding', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'top' => '50',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false
				],
				'mobile_default' => [
					'top' => '25',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-search-header-hotels' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'hotels_search_section_title_typography',
				'label' => __('Title Typography', 'OBPress_HotelsPage'),
				'selector' => '.obpress-chain-results-hotels-page .obpress-search-title',
				'fields_options' => [
					'typography' => [
						'default' => 'yes'
					],
					'font_family' => [
						'default' => 'Montserrat',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '30',
						],
					],
					'font_weight' => [
						'default' => '700',
					],
					'line_height' => [
						'default' => [
							'unit' => 'px',
							'size' => '36',
						],
					],
				],
			]
		);

		$this->add_control(
			'hotels_search_section_title_color',
			[
				'label' => __('Title Color', 'OBPress_HotelsPage'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-search-title' => 'color: {{hotels_search_section_title_color}}'
				],
			]
		);

		$this->add_control(
			'hotels_search_section_title_text_align',
			[
				'label' => __( 'Title Text Align', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'center',
				'options' => [
					'left'  => __( 'Left', 'OBPress_HotelsPage' ),
					'center'  => __( 'Center', 'OBPress_HotelsPage' ),
					'right'  => __( 'Right', 'OBPress_HotelsPage' ),
				],
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-search-title' => 'text-align: {{hotels_search_section_title_text_align}}'
				],
			]
		);

		$this->add_responsive_control(
			'hotels_search_section_title_margin',
			[
				'label' => __( 'Title Margin', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '20',
					'left' => '0',
					'isLinked' => false
				],
				'mobile_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '10',
					'left' => '0',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-search-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'hotels_search_section_search_input_width',
			[
				'label' => __( 'Search Input Width', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'size' => 500,
				],
				'mobile_default' => [
					'size' => 340,
				],
				'range' => [
					'px' => [
						'max' => 1076,
						'min' => 100,
						'step' => 1,
					],
				],
				'render_type' => 'ui',
				'selectors' => [
					'.obpress-chain-results-hotels-page #search-input' => 'min-width: {{SIZE}}px',
				],
			]
		);

		$this->add_responsive_control(
			'hotels_search_section_search_input_height',
			[
				'label' => __( 'Search Input Height', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'size' => 42,
				],
				'mobile_default' => [
					'size' => 42,
				],
				'range' => [
					'px' => [
						'max' => 100,
						'min' => 20,
						'step' => 1,
					],
				],
				'render_type' => 'ui',
				'selectors' => [
					'.obpress-chain-results-hotels-page #search-input' => 'height: {{SIZE}}px',
				],
			]
		);

		$this->add_responsive_control(
			'hotels_search_section_search_input_padding',
			[
				'label' => __( 'Search Input Padding', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'top' => '10',
					'right' => '13',
					'bottom' => '10',
					'left' => '13',
					'isLinked' => false
				],
				'mobile_default' => [
					'top' => '10',
					'right' => '13',
					'bottom' => '10',
					'left' => '13',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-chain-results-hotels-page #search-input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hotels_search_section_search_input_bg_color',
			[
				'label' => __('Search Input Background Color', 'OBPress_HotelsPage'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'selectors' => [
					'.obpress-chain-results-hotels-page #search-input' => 'background-color: {{hotels_search_section_search_input_bg_color}}'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'hotels_search_section_search_input_border',
				'label' => __( 'Search Input Border', 'OBPress_HotelsPage' ),
				'fields_options' => [
					'border' => [
						'default' => 'solid',
					],
					'width' => [
						'default' => [
							'top' => '1',
							'right' => '1',
							'bottom' => '1',
							'left' => '1',
							'isLinked' => true,
						],
					],
					'color' => [
						'default' => '#8c99af',
					],
				],
				'selector' => '.obpress-chain-results-hotels-page #search-input',
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'hotels_cards_section',
			[
				'label' => __('Hotels Cards Section', 'OBPress_HotelsPage'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'hotels_cards_margin',
			[
				'label' => __( 'Hotels Cards Margin', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '38',
					'left' => '0',
					'isLinked' => false
				],
				'mobile_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '38',
					'left' => '0',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-results-roomrate' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'hotels_last_card_margin',
			[
				'label' => __( 'Hotels Last Card Margin', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '58',
					'left' => '0',
					'isLinked' => false
				],
				'mobile_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '58',
					'left' => '0',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-results-roomrate:last-child' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'hotels_cards_title_margin',
			[
				'label' => __( 'Hotels Title Margin', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '23',
					'left' => '0',
					'isLinked' => false
				],
				'mobile_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '23',
					'left' => '0',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-title-holder' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'hotels_cards_title_typography',
				'label' => __('Hotels Title Typography', 'OBPress_HotelsPage'),
				'selector' => '.obpress-chain-results-hotels-page .obpress-hotels-title',
				'fields_options' => [
					'typography' => [
						'default' => 'yes'
					],
					'font_family' => [
						'default' => 'Montserrat',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '20',
						],
					],
					'font_weight' => [
						'default' => '700',
					],
					'line_height' => [
						'default' => [
							'unit' => 'px',
							'size' => '24',
						],
					],
				],
			]
		);

		$this->add_control(
			'hotels_cards_title_color',
			[
				'label' => __('Hotels Title Color', 'OBPress_HotelsPage'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-title' => 'color: {{hotels_cards_title_color}}'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'hotels_cards_city_typography',
				'label' => __('Hotels City Typography', 'OBPress_HotelsPage'),
				'selector' => '.obpress-chain-results-hotels-page .obpress-hotels-city-name',
				'fields_options' => [
					'typography' => [
						'default' => 'yes'
					],
					'font_family' => [
						'default' => 'Montserrat',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '20',
						],
					],
					'font_weight' => [
						'default' => '400',
					],
					'line_height' => [
						'default' => [
							'unit' => 'px',
							'size' => '24',
						],
					],
				],
			]
		);

		$this->add_control(
			'hotels_cards_city_color',
			[
				'label' => __('Hotels City Color', 'OBPress_HotelsPage'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-city-name' => 'color: {{hotels_cards_city_color}}'
				],
			]
		);

		$this->add_responsive_control(
			'hotels_cards_title_line_width',
			[
				'label' => __( 'Hotels Line Width', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'size' => 100,
				],
				'mobile_default' => [
					'size' => 100,
				],
				'range' => [
					'px' => [
						'max' => 100,
						'min' => 0,
						'step' => 1,
					],
				],
				'render_type' => 'ui',
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-title-holder hr' => 'width: {{SIZE}}%',
				],
			]
		);
		
		$this->add_responsive_control(
			'hotels_cards_title_line_height',
			[
				'label' => __( 'Hotels Line Height', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'size' => 1,
				],
				'mobile_default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'max' => 30,
						'min' => 1,
						'step' => 1,
					],
				],
				'render_type' => 'ui',
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-title-holder hr' => 'height: {{SIZE}}px',
				],
			]
		);

		$this->add_control(
			'hotels_cards_title_line_background_color',
			[
				'label' => __('Hotels Line Background Color', 'OBPress_HotelsPage'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#D9DADC',
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-title-holder hr' => 'background-color: {{hotels_cards_title_line_background_color}}'
				],
			]
		);

		$this->add_responsive_control(
			'hotels_cards_title_line_margin',
			[
				'label' => __( 'Hotels Line Margin', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '23',
					'isLinked' => false
				],
				'mobile_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '23',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-title-holder hr' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'hotels_cards_title_justify_content',
			[
				'label' => __( 'Hotels Title Justify Content', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => 'center',
				'mobile_default' => 'center',
				'options' => [
					'space-between'  => __( 'Space Between', 'OBPress_HotelsPage' ),
					'space-around'  => __( 'Space Around', 'OBPress_HotelsPage' ),
					'space-evenly'  => __( 'Space Evenly', 'OBPress_HotelsPage' ),
					'center' => __( 'Center', 'OBPress_HotelsPage' ),
					'flex-end'  => __( 'Flex End', 'OBPress_HotelsPage' ),
					'flex-start'  => __( 'Flex Start', 'OBPress_HotelsPage' ),
				],
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-title-holder' => 'justify-content: {{room_searchbar_justify_content}}'
				],
			]
		);

		$this->add_responsive_control(
			'hotels_cards_side',
			[
				'label' => __( 'Hotels Cards Side', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => 'right',
				'mobile_default' => 'right',
				'options' => [
					'left'  => __( 'Left', 'OBPress_HotelsPage' ),
					'right'  => __( 'Right', 'OBPress_HotelsPage' ),
				]
			]
		);

		$this->add_responsive_control(
			'hotels_cards_image_width',
			[
				'label' => __( 'Image Width', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'size' => 669,
				],
				'mobile_default' => [
					'size' => 323,
				],
				'range' => [
					'px' => [
						'max' => 1076,
						'min' => 100,
						'step' => 1,
					],
				],
				'render_type' => 'ui',
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-results-hotel-image img' => 'width: {{SIZE}}px',
				],
			]
		);

		$this->add_responsive_control(
			'hotels_cards_image_height',
			[
				'label' => __( 'Image Height', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'size' => 393,
				],
				'mobile_default' => [
					'size' => 227,
				],
				'range' => [
					'px' => [
						'max' => 700,
						'min' => 100,
						'step' => 1,
					],
				],
				'render_type' => 'ui',
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-results-hotel-image img' => 'height: {{SIZE}}px',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'hotels_info_section',
			[
				'label' => __(' Info Section', 'OBPress_HotelsPage'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'hotels_cards_info_section_width',
			[
				'label' => __( 'Info Width', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'size' => 466,
				],
				'mobile_default' => [
					'size' => 323,
				],
				'range' => [
					'px' => [
						'max' => 800,
						'min' => 300,
						'step' => 1,
					],
				],
				'render_type' => 'ui',
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-chain-results-hotel-info' => 'width: {{SIZE}}px',
				],
			]
		);
		
		$this->add_control(
			'hotels_cards_info_section_bg_color',
			[
				'label' => __('Info Background Color', 'OBPress_HotelsPage'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-chain-results-hotel-info' => 'background-color: {{hotels_cards_info_section_bg_color}}'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'hotels_cards_info_section_box_shadow',
				'label' => esc_html__( 'Info Box Shadow', 'OBPress_HotelsPage' ),
				'selector' => '{{WRAPPER}} .obpress-chain-results-hotels-page .obpress-chain-results-hotel-info',
				'fields_options' => [
					'box_shadow_type' => [ 
						'default' =>'yes' 
					],
					'box_shadow' => [
						'default' =>[
							'horizontal' => 0,
							'vertical' => 13,
							'blur' => 15,
							'color' => '#00000029'
						]
					]
				]
			]
		);

		$this->add_responsive_control(
			'hotels_cards_info_section_padding',
			[
				'label' => __( 'Padding', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'top' => '20',
					'right' => '21',
					'bottom' => '21',
					'left' => '21',
					'isLinked' => false
				],
				'mobile_default' => [
					'top' => '17',
					'right' => '22',
					'bottom' => '23',
					'left' => '22',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-chain-results-hotel-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'hotels_cards_info_section_stars_justify_content',
			[
				'label' => __( 'Stars Justify Content', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => 'flex-start',
				'mobile_default' => 'flex-start',
				'options' => [
					'flex-start'  => __( 'Left', 'OBPress_HotelsPage' ),
					'center' => __( 'Center', 'OBPress_HotelsPage' ),
					'flex-end'  => __( 'Right', 'OBPress_HotelsPage' )
				],
				'selectors' => [
					'.obpress-chain-results-hotels-page .hotel_stars' => 'justify-content: {{room_searchbar_justify_content}}'
				],
			]
		);

		$this->add_control(
			'hotels_cards_info_section_stars_color',
			[
				'label' => __('Stars Color', 'OBPress_HotelsPage'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#ffc70e',
				'selectors' => [
					'.obpress-chain-results-hotels-page .hotel_star g path' => 'fill: {{hotels_cards_info_section_stars_color}}; stroke: {{hotels_cards_info_section_stars_color}}',
					'.obpress-chain-results-hotels-page .hotel_star_outline .d' => 'fill: {{hotels_cards_info_section_stars_color}}',
					'.obpress-chain-results-hotels-page .hotel_star_outline g g .c' => 'stroke: {{hotels_cards_info_section_stars_color}}'
				],
			]
		);

		$this->add_responsive_control(
			'hotels_cards_info_section_stars_margin',
			[
				'label' => __( 'Stars Margin', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '5',
					'left' => '0',
					'isLinked' => false
				],
				'mobile_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '5',
					'left' => '0',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-chain-results-hotels-page .hotel_stars' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'hotels_cards_info_section_star_margin',
			[
				'label' => __( 'Star Margin', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'top' => '0',
					'right' => '5',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false
				],
				'mobile_default' => [
					'top' => '0',
					'right' => '5',
					'bottom' => '0',
					'left' => '0',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-chain-results-hotels-page .hotel_star, .obpress-chain-results-hotels-page .hotel_star_outline' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'hotels_cards_info_section_hotel_name_typography',
				'label' => __('Hotel Name Typography', 'OBPress_HotelsPage'),
				'selector' => '.obpress-chain-results-hotels-page .obpress-hotels-name',
				'fields_options' => [
					'typography' => [
						'default' => 'yes'
					],
					'font_family' => [
						'default' => 'Montserrat',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '20',
						],
					],
					'font_weight' => [
						'default' => '700',
					],
					'line_height' => [
						'default' => [
							'unit' => 'px',
							'size' => '24',
						],
					],
				],
			]
		);

		$this->add_responsive_control(
			'hotels_cards_info_section_hotel_name_text_align',
			[
				'label' => __( 'Hotel Name Text Align', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => 'left',
				'mobile_default' => 'left',
				'options' => [
					'left'  => __( 'Left', 'OBPress_HotelsPage' ),
					'center'  => __( 'Center', 'OBPress_HotelsPage' ),
					'right'  => __( 'Right', 'OBPress_HotelsPage' ),
				],
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-name' => 'text-align: {{hotels_cards_info_section_hotel_name_text_align}}'
				],
			]
		);


		$this->add_control(
			'hotels_cards_info_section_hotel_name_color',
			[
				'label' => __('Hotel Name Color', 'OBPress_HotelsPage'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-name' => 'color: {{hotels_cards_info_section_hotel_name_color}}'
				],
			]
		);

		$this->add_responsive_control(
			'hotels_cards_info_section_hotel_name_margin',
			[
				'label' => __( 'Hotel Name Margin', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '8',
					'left' => '0',
					'isLinked' => false
				],
				'mobile_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '8',
					'left' => '0',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'hotels_cards_info_section_hotel_location_typography',
				'label' => __('Hotel Location Typography', 'OBPress_HotelsPage'),
				'selector' => '.obpress-chain-results-hotels-page .obpress-hotels-location',
				'fields_options' => [
					'typography' => [
						'default' => 'yes'
					],
					'font_family' => [
						'default' => 'Montserrat',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '12',
						],
					],
					'font_weight' => [
						'default' => '400',
					],
					'line_height' => [
						'default' => [
							'unit' => 'px',
							'size' => '15',
						],
					],
				],
			]
		);

		$this->add_responsive_control(
			'hotels_cards_info_section_hotel_location_text_align',
			[
				'label' => __( 'Hotel Location Text Align', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => 'left',
				'mobile_default' => 'left',
				'options' => [
					'left'  => __( 'Left', 'OBPress_HotelsPage' ),
					'center'  => __( 'Center', 'OBPress_HotelsPage' ),
					'right'  => __( 'Right', 'OBPress_HotelsPage' ),
				],
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-location' => 'text-align: {{hotels_cards_info_section_hotel_location_text_align}}'
				],
			]
		);


		$this->add_control(
			'hotels_cards_info_section_hotel_location_color',
			[
				'label' => __('Hotel Location Color', 'OBPress_HotelsPage'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-location' => 'color: {{hotels_cards_info_section_hotel_location_color}}'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'hotels_cards_info_section_hotel_location_border',
				'label' => __( 'Hotel Location Border', 'OBPress_HotelsPage' ),
				'fields_options' => [
					'border' => [
						'default' => 'solid',
					],
					'width' => [
						'default' => [
							'top' => '0',
							'right' => '0',
							'bottom' => '1',
							'left' => '0',
							'isLinked' => false,
						],
					],
					'color' => [
						'default' => '#E6E6E6',
					],
				],
				'selector' => '.obpress-chain-results-hotels-page .obpress-hotels-location',
			]
		);

		$this->add_responsive_control(
			'hotels_cards_info_section_hotel_name_padding',
			[
				'label' => __( 'Hotel Location Padding', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '10',
					'left' => '0',
					'isLinked' => false
				],
				'mobile_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '10',
					'left' => '0',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-location' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'hotels_cards_info_section_hotel_location_margin',
			[
				'label' => __( 'Hotel Location Margin', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '11',
					'left' => '0',
					'isLinked' => false
				],
				'mobile_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '11',
					'left' => '0',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-location' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'hotels_cards_info_section_hotel_description_typography',
				'label' => __('Hotel Description Typography', 'OBPress_HotelsPage'),
				'selector' => '.obpress-chain-results-hotels-page .obpress-hotel-text',
				'fields_options' => [
					'typography' => [
						'default' => 'yes'
					],
					'font_family' => [
						'default' => 'Montserrat',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '12',
						],
					],
					'font_weight' => [
						'default' => '400',
					],
					'line_height' => [
						'default' => [
							'unit' => 'px',
							'size' => '15',
						],
					],
				],
			]
		);

		$this->add_responsive_control(
			'hotels_cards_info_section_hotel_description_text_align',
			[
				'label' => __( 'Hotel Description Text Align', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => 'left',
				'mobile_default' => 'left',
				'options' => [
					'left'  => __( 'Left', 'OBPress_HotelsPage' ),
					'center'  => __( 'Center', 'OBPress_HotelsPage' ),
					'right'  => __( 'Right', 'OBPress_HotelsPage' ),
				],
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotel-text' => 'text-align: {{hotels_cards_info_section_hotel_description_text_align}}'
				],
			]
		);


		$this->add_control(
			'hotels_cards_info_section_hotel_description_color',
			[
				'label' => __('Hotel Description Color', 'OBPress_HotelsPage'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#212529',
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotel-text' => 'color: {{hotels_cards_info_section_hotel_description_color}}'
				],
			]
		);

		$this->add_responsive_control(
			'hotels_cards_info_section_hotel_description_margin',
			[
				'label' => __( 'Hotel Description Margin', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '16',
					'left' => '0',
					'isLinked' => false
				],
				'mobile_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '16',
					'left' => '0',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotel-text p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'hotels_cards_info_section_hotel_description_seemore_typography',
				'label' => __('Hotel See More Typography', 'OBPress_HotelsPage'),
				'selector' => '.obpress-chain-results-hotels-page .obpress-hotels-see-more',
				'fields_options' => [
					'typography' => [
						'default' => 'yes'
					],
					'font_family' => [
						'default' => 'Montserrat',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '12',
						],
					],
					'font_weight' => [
						'default' => '400',
					],
					'line_height' => [
						'default' => [
							'unit' => 'px',
							'size' => '15',
						],
					],
				],
			]
		);

		$this->add_control(
			'hotels_cards_info_section_hotel_description_seemore_color',
			[
				'label' => __('Hotel See More Color', 'OBPress_HotelsPage'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#4B8CF4',
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-see-more' => 'color: {{hotels_cards_info_section_hotel_description_seemore_color}}'
				],
			]
		);

		$this->add_responsive_control(
			'hotels_cards_info_section_hotel_description_seemore_margin',
			[
				'label' => __( 'Hotel See More Margin', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '5',
					'isLinked' => false
				],
				'mobile_default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '5',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-see-more' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'hotels_info_button_section',
			[
				'label' => __(' Button Section', 'OBPress_HotelsPage'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'hotels_custom_button_width',
			[
				'label' => esc_html__( 'Custom Width', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'OBPress_HotelsPage' ),
				'label_off' => esc_html__( 'Hide', 'OBPress_HotelsPage' ),
				'return_value' => 'custom_width',
				'default' => '',
			]
		);

		$this->add_responsive_control(
			'hotels_custom_button_width_slider',
			[
				'label' => esc_html__( 'Width', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 100,
						'step' => 1,
					],
				],
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'unit' => '%',
					'size' => 24,
				],
				'mobile_default' => [
					'unit' => '%',
					'size' => 24,
				],
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-button' => 'width: {{SIZE}}%',
				],
				'condition' => [
					'hotels_custom_button_width' => 'custom_width',
				],	
			]
		);

		$this->add_responsive_control(
			'hotels_button_justify_content',
			[
				'label' => __( 'Justify Content', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => 'flex-end',
				'mobile_default' => 'flex-end',
				'options' => [
					'flex-start'  => __( 'Left', 'OBPress_HotelsPage' ),
					'center' => __( 'Center', 'OBPress_HotelsPage' ),
					'flex-end'  => __( 'Right', 'OBPress_HotelsPage' ),
				],
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-button-text-holder' => 'justify-content: {{hotels_button_justify_content}}'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'hotels_button_typography',
				'label' => __('Typography', 'OBPress_HotelsPage'),
				'selector' => '.obpress-chain-results-hotels-page .obpress-hotels-button-text-holder',
				'fields_options' => [
					'typography' => [
						'default' => 'yes'
					],
					'font_family' => [
						'default' => 'Montserrat',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '14',
						],
					],
					'font_weight' => [
						'default' => '500',
					],
				],
			]
		);

		$this->add_control(
			'hotels_button_color',
			[
				'label' => __('Color', 'OBPress_HotelsPage'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-button' => 'color: {{hotels_button_color}}'
				],
			]
		);

		$this->add_control(
			'hotels_button_hover_color',
			[
				'label' => __('Hover Color', 'OBPress_HotelsPage'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-button:hover' => 'color: {{hotels_button_hover_color}}'
				],
			]
		);

		$this->add_control(
			'hotels_button_bg_color',
			[
				'label' => __('Background Color', 'OBPress_HotelsPage'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-button' => 'background-color: {{hotels_button_bg_color}}'
				],
			]
		);

		$this->add_control(
			'hotels_button_bg_hover_color',
			[
				'label' => __('Background Hover Color', 'OBPress_HotelsPage'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-button:hover' => 'background-color: {{hotels_button_bg_hover_color}}'
				],
			]
		);

		$this->add_control(
			'hotels_button_hover_transition',
			[
				'label' => __( 'Transition', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 0.3,
				],
				'range' => [
					'px' => [
						'max' => 3,
						'step' => 0.1,
					],
				],
				'render_type' => 'ui',
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-button' => 'transition: {{SIZE}}s',
				],
			]
		);

		$this->add_responsive_control(
			'hotels_button_padding',
			[
				'label' => __( 'Padding', 'OBPress_HotelsPage' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'mobile' ],
				'desktop_default' => [
					'top' => '11',
					'right' => '10',
					'bottom' => '11',
					'left' => '10',
					'isLinked' => false
				],
				'mobile_default' => [
					'top' => '11',
					'right' => '10',
					'bottom' => '11',
					'left' => '10',
					'isLinked' => false
				],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.obpress-chain-results-hotels-page .obpress-hotels-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings_hp = $this->get_settings_for_display();

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
