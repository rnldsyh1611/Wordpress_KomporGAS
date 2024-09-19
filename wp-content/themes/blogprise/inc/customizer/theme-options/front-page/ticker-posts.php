<?php
// Ticker Posts Options.
$wp_customize->add_section(
	'home_page_ticker_posts_options',
	array(
		'title' => __( 'Ticker Post Options', 'blogprise' ),
		'panel' => 'theme_home_option_panel',
	)
);

// Enable Ticker Posts.
$wp_customize->add_setting(
	'enable_ticker_posts',
	array(
		'default'           => $theme_options_defaults['enable_ticker_posts'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_ticker_posts',
		array(
			'label'    => __( 'Enable Ticker Posts', 'blogprise' ),
			'section'  => 'home_page_ticker_posts_options',
			'priority' => 10,
		)
	)
);

// Ticker Theme.
$wp_customize->add_setting(
	'ticker_theme',
	array(
		'default'           => $theme_options_defaults['ticker_theme'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'ticker_theme',
	array(
		'label'           => __( 'Ticker Theme', 'blogprise' ),
		'section'         => 'home_page_ticker_posts_options',
		'type'            => 'select',
		'choices'         => array(
			'light' => __( 'Light', 'blogprise' ),
			'dark'  => __( 'Dark', 'blogprise' ),
		),
		'active_callback' => 'blogprise_is_ticker_posts_enabled',
		'priority'        => 20,
	)
);

// Ticker Background Color.
$wp_customize->add_setting(
	'ticker_section_bg_color',
	array(
		'default'           => $theme_options_defaults['ticker_section_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'ticker_section_bg_color',
		array(
			'label'           => __( 'Section Background', 'blogprise' ),
			'section'         => 'home_page_ticker_posts_options',
			'type'            => 'color',
			'active_callback' => 'blogprise_is_ticker_posts_enabled',
			'priority'        => 30,
		)
	)
);

// Enable Ticker Label.
$wp_customize->add_setting(
	'enable_ticker_label',
	array(
		'default'           => $theme_options_defaults['enable_ticker_label'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_ticker_label',
		array(
			'label'           => __( 'Enable Ticker Label', 'blogprise' ),
			'section'         => 'home_page_ticker_posts_options',
			'active_callback' => 'blogprise_is_ticker_posts_enabled',
			'priority'        => 35,
		)
	)
);

// Ticker label color.
$wp_customize->add_setting(
	'ticker_label_color',
	array(
		'default'           => $theme_options_defaults['ticker_label_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'ticker_label_color',
		array(
			'label'           => __( 'Ticker Label Text', 'blogprise' ),
			'section'         => 'home_page_ticker_posts_options',
			'type'            => 'color',
			'active_callback' => function ( $control ) {
				return (
					blogprise_is_ticker_posts_enabled( $control )
					&&
					blogprise_is_ticker_label_enabled( $control )
				);
			},
			'priority'        => 40,
		)
	)
);

// Ticker label background.
$wp_customize->add_setting(
	'ticker_label_bg_color',
	array(
		'default'           => $theme_options_defaults['ticker_label_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'ticker_label_bg_color',
		array(
			'label'           => __( 'Ticker Label Background', 'blogprise' ),
			'section'         => 'home_page_ticker_posts_options',
			'type'            => 'color',
			'active_callback' => function ( $control ) {
				return (
					blogprise_is_ticker_posts_enabled( $control )
					&&
					blogprise_is_ticker_label_enabled( $control )
				);
			},
			'priority'        => 50,
		)
	)
);

// Ticker loader/icon color.
$wp_customize->add_setting(
	'ticker_loader_icon_color',
	array(
		'default'           => $theme_options_defaults['ticker_loader_icon_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'ticker_loader_icon_color',
		array(
			'label'           => __( 'Ticker Loader/Icon Color', 'blogprise' ),
			'section'         => 'home_page_ticker_posts_options',
			'type'            => 'color',
			'active_callback' => function ( $control ) {
				return (
					blogprise_is_ticker_posts_enabled( $control )
					&&
					blogprise_is_ticker_label_enabled( $control )
				);
			},
			'priority'        => 55,
		)
	)
);

// Ticker Label Text.
$wp_customize->add_setting(
	'ticker_label_text',
	array(
		'default'           => $theme_options_defaults['ticker_label_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'ticker_label_text',
	array(
		'label'           => __( 'Ticker Label Text', 'blogprise' ),
		'description'     => __( 'Leave empty if you want to use the default text "Hot News".', 'blogprise' ),
		'section'         => 'home_page_ticker_posts_options',
		'type'            => 'text',
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_ticker_posts_enabled( $control )
				&&
				blogprise_is_ticker_label_enabled( $control )
			);
		},
		'priority'        => 60,
	)
);

// Ticker Label Style.
$wp_customize->add_setting(
	'ticker_label_style',
	array(
		'default'           => $theme_options_defaults['ticker_label_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'ticker_label_style',
	array(
		'label'           => __( 'Label Style', 'blogprise' ),
		'section'         => 'home_page_ticker_posts_options',
		'type'            => 'select',
		'choices'         => array(
			'style_1' => __( 'Plain', 'blogprise' ),
			'style_2' => __( 'Animated Loader', 'blogprise' ),
			'style_3' => __( 'With Icon', 'blogprise' ),
		),
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_ticker_posts_enabled( $control )
				&&
				blogprise_is_ticker_label_enabled( $control )
			);
		},
		'priority'        => 70,
	)
);

// Ticker Posts Category.
$wp_customize->add_setting(
	'ticker_posts_cat',
	array(
		'default'           => $theme_options_defaults['ticker_posts_cat'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Blogprise_Dropdown_Taxonomies_Control(
		$wp_customize,
		'ticker_posts_cat',
		array(
			'label'           => __( 'Choose Ticker posts category', 'blogprise' ),
			'section'         => 'home_page_ticker_posts_options',
			'active_callback' => 'blogprise_is_ticker_posts_enabled',
			'priority'        => 80,
		)
	)
);

// No of posts.
$wp_customize->add_setting(
	'no_of_ticker_posts',
	array(
		'default'           => $theme_options_defaults['no_of_ticker_posts'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'no_of_ticker_posts',
	array(
		'label'           => __( 'Number of Posts', 'blogprise' ),
		'section'         => 'home_page_ticker_posts_options',
		'type'            => 'number',
		'active_callback' => 'blogprise_is_ticker_posts_enabled',
		'priority'        => 90,
	)
);

// Posts Orderby.
$wp_customize->add_setting(
	'ticker_posts_orderby',
	array(
		'default'           => $theme_options_defaults['ticker_posts_orderby'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'ticker_posts_orderby',
	array(
		'label'           => __( 'Orderby', 'blogprise' ),
		'section'         => 'home_page_ticker_posts_options',
		'type'            => 'select',
		'choices'         => array(
			'date'  => __( 'Date', 'blogprise' ),
			'id'    => __( 'ID', 'blogprise' ),
			'title' => __( 'Title', 'blogprise' ),
			'rand'  => __( 'Random', 'blogprise' ),
		),
		'active_callback' => 'blogprise_is_ticker_posts_enabled',
		'priority'        => 100,
	)
);

// Posts Order.
$wp_customize->add_setting(
	'ticker_posts_order',
	array(
		'default'           => $theme_options_defaults['ticker_posts_order'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'ticker_posts_order',
	array(
		'label'           => __( 'Order', 'blogprise' ),
		'section'         => 'home_page_ticker_posts_options',
		'type'            => 'select',
		'choices'         => array(
			'asc'  => __( 'ASC', 'blogprise' ),
			'desc' => __( 'DESC', 'blogprise' ),
		),
		'active_callback' => 'blogprise_is_ticker_posts_enabled',
		'priority'        => 110,
	)
);

/* Ticker Posts Meta */
$wp_customize->add_setting(
	'ticker_posts_meta',
	array(
		'default'           => $theme_options_defaults['ticker_posts_meta'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox_multiple',
	)
);
$wp_customize->add_control(
	new Blogprise_Checkbox_Multiple(
		$wp_customize,
		'ticker_posts_meta',
		array(
			'label'           => __( 'Ticker Post Meta', 'blogprise' ),
			'section'         => 'home_page_ticker_posts_options',
			'choices'         => array(
				'date' => __( 'Date', 'blogprise' ),
			),
			'active_callback' => 'blogprise_is_ticker_posts_enabled',
			'priority'        => 120,
		)
	)
);

// Ticker Post Date Format
$wp_customize->add_setting(
	'ticker_posts_date_format',
	array(
		'default'           => $theme_options_defaults['ticker_posts_date_format'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'ticker_posts_date_format',
	array(
		'label'           => __( 'Date Format', 'blogprise' ),
		'description'     => __( 'Make sure to enable Date post meta from above for this to work.', 'blogprise' ),
		'section'         => 'home_page_ticker_posts_options',
		'type'            => 'select',
		'choices'         => array(
			'format_1' => __( 'Times Ago', 'blogprise' ),
			'format_2' => __( 'Default Format', 'blogprise' ),
		),
		'active_callback' => 'blogprise_is_ticker_posts_enabled',
		'priority'        => 130,
	)
);

// Autoplay speed.
$wp_customize->add_setting(
	'ticker_posts_speed',
	array(
		'default'           => $theme_options_defaults['ticker_posts_speed'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'ticker_posts_speed',
	array(
		'label'           => __( 'Autoplay Speed', 'blogprise' ),
		'description'     => __( 'In milliseconds', 'blogprise' ),
		'section'         => 'home_page_ticker_posts_options',
		'type'            => 'number',
		'active_callback' => 'blogprise_is_ticker_posts_enabled',
		'priority'        => 140,
	)
);

// Show Arrows.
$wp_customize->add_setting(
	'show_ticker_arrows',
	array(
		'default'           => $theme_options_defaults['show_ticker_arrows'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'show_ticker_arrows',
		array(
			'label'           => __( 'Show Arrows', 'blogprise' ),
			'section'         => 'home_page_ticker_posts_options',
			'active_callback' => 'blogprise_is_ticker_posts_enabled',
			'priority'        => 145,
		)
	)
);

// Show Post thumbnail
$wp_customize->add_setting(
	'show_ticker_posts_thumbnail',
	array(
		'default'           => $theme_options_defaults['show_ticker_posts_thumbnail'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'show_ticker_posts_thumbnail',
		array(
			'label'           => __( 'Show Post Thumbnail', 'blogprise' ),
			'section'         => 'home_page_ticker_posts_options',
			'active_callback' => 'blogprise_is_ticker_posts_enabled',
			'priority'        => 150,
		)
	)
);

// Circle Style thumbnail.
$wp_customize->add_setting(
	'circle_ticker_posts_thumbnail',
	array(
		'default'           => $theme_options_defaults['circle_ticker_posts_thumbnail'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'circle_ticker_posts_thumbnail',
		array(
			'label'           => __( 'Circle Post Thumbnail', 'blogprise' ),
			'section'         => 'home_page_ticker_posts_options',
			'active_callback' => 'blogprise_is_ticker_posts_enabled',
			'priority'        => 155,
		)
	)
);

// Show Ticker Post Category.
$wp_customize->add_setting(
	'show_ticker_posts_category',
	array(
		'default'           => $theme_options_defaults['show_ticker_posts_category'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'show_ticker_posts_category',
		array(
			'label'           => __( 'Show Ticker Post Category', 'blogprise' ),
			'section'         => 'home_page_ticker_posts_options',
			'active_callback' => 'blogprise_is_ticker_posts_enabled',
			'priority'        => 160,
		)
	)
);

// Ticker Posts Category Color Display.
$wp_customize->add_setting(
	'ticker_posts_category_color_display',
	array(
		'default'           => $theme_options_defaults['ticker_posts_category_color_display'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'ticker_posts_category_color_display',
	array(
		'label'           => __( 'Ticker Posts Category Color Display', 'blogprise' ),
		'section'         => 'home_page_ticker_posts_options',
		'type'            => 'select',
		'choices'         => blogprise_get_category_color_display(),
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_ticker_posts_enabled( $control )
				&&
				blogprise_is_ticker_posts_category_enabled( $control )
			);
		},
		'priority'        => 170,
	)
);

// Ticker Post Category Style.
$wp_customize->add_setting(
	'ticker_posts_category_style',
	array(
		'default'           => $theme_options_defaults['ticker_posts_category_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'ticker_posts_category_style',
	array(
		'label'           => __( 'Ticker Post Category Style', 'blogprise' ),
		'section'         => 'home_page_ticker_posts_options',
		'type'            => 'select',
		'choices'         => blogprise_get_category_styles(),
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_ticker_posts_enabled( $control )
				&&
				blogprise_is_ticker_posts_category_enabled( $control )
			);
		},
		'priority'        => 180,
	)
);

// No of Ticker Post Categories.
$wp_customize->add_setting(
	'ticker_posts_category_limit',
	array(
		'default'           => $theme_options_defaults['ticker_posts_category_limit'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'ticker_posts_category_limit',
	array(
		'label'           => __( 'Number of Categories To Display', 'blogprise' ),
		'section'         => 'home_page_ticker_posts_options',
		'type'            => 'number',
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_ticker_posts_enabled( $control )
				&&
				blogprise_is_ticker_posts_category_enabled( $control )
			);
		},
		'priority'        => 190,
	)
);

// Stack on responsive
$wp_customize->add_setting(
	'stack_ticker_responsive',
	array(
		'default'           => $theme_options_defaults['stack_ticker_responsive'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'stack_ticker_responsive',
		array(
			'label'           => __( 'Stack on Responsive', 'blogprise' ),
			'section'         => 'home_page_ticker_posts_options',
			'active_callback' => 'blogprise_is_ticker_posts_enabled',
			'priority'        => 200,
		)
	)
);

$wp_customize->add_setting(
	'hide_ticker_label_responsive',
	array(
		'default'           => $theme_options_defaults['hide_ticker_label_responsive'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'hide_ticker_label_responsive',
		array(
			'label'           => __( 'Hide Label on Responsive', 'blogprise' ),
			'section'         => 'home_page_ticker_posts_options',
			'active_callback' => 'blogprise_is_ticker_posts_enabled',
			'priority'        => 201,
		)
	)
);

$wp_customize->add_setting(
	'hide_ticker_arrows_responsive',
	array(
		'default'           => $theme_options_defaults['hide_ticker_arrows_responsive'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'hide_ticker_arrows_responsive',
		array(
			'label'           => __( 'Hide Arrows on Responsive', 'blogprise' ),
			'section'         => 'home_page_ticker_posts_options',
			'active_callback' => 'blogprise_is_ticker_posts_enabled',
			'priority'        => 205,
		)
	)
);

$wp_customize->add_setting(
	'hide_ticker_thumbnail_responsive',
	array(
		'default'           => $theme_options_defaults['hide_ticker_thumbnail_responsive'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'hide_ticker_thumbnail_responsive',
		array(
			'label'           => __( 'Hide Thumbnail on Responsive', 'blogprise' ),
			'section'         => 'home_page_ticker_posts_options',
			'active_callback' => 'blogprise_is_ticker_posts_enabled',
			'priority'        => 210,
		)
	)
);

$wp_customize->add_setting(
	'hide_ticker_category_responsive',
	array(
		'default'           => $theme_options_defaults['hide_ticker_category_responsive'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'hide_ticker_category_responsive',
		array(
			'label'           => __( 'Hide Category on Responsive', 'blogprise' ),
			'section'         => 'home_page_ticker_posts_options',
			'active_callback' => 'blogprise_is_ticker_posts_enabled',
			'priority'        => 220,
		)
	)
);

$wp_customize->add_setting(
	'hide_ticker_meta_responsive',
	array(
		'default'           => $theme_options_defaults['hide_ticker_meta_responsive'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'hide_ticker_meta_responsive',
		array(
			'label'           => __( 'Hide Meta Info on Responsive', 'blogprise' ),
			'section'         => 'home_page_ticker_posts_options',
			'active_callback' => 'blogprise_is_ticker_posts_enabled',
			'priority'        => 230,
		)
	)
);

// Padding Top.
$wp_customize->add_setting(
	'ticker_section_padding_top',
	array(
		'default'           => $theme_options_defaults['ticker_section_padding_top'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'ticker_section_padding_top',
	array(
		'label'           => __( 'Padding Top (In px)', 'blogprise' ),
		'section'         => 'home_page_ticker_posts_options',
		'type'            => 'number',
		'active_callback' => 'blogprise_is_ticker_posts_enabled',
		'priority'        => 250,
	)
);

// Padding Bottom.
$wp_customize->add_setting(
	'ticker_section_padding_bottom',
	array(
		'default'           => $theme_options_defaults['ticker_section_padding_bottom'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'ticker_section_padding_bottom',
	array(
		'label'           => __( 'Padding Bottom (In px)', 'blogprise' ),
		'section'         => 'home_page_ticker_posts_options',
		'type'            => 'number',
		'active_callback' => 'blogprise_is_ticker_posts_enabled',
		'priority'        => 260,
	)
);
