<?php
// Home Page Sidebar Options.
$wp_customize->add_section(
	'home_page_layout_options',
	array(
		'title' => __( 'Front Page Sidebar', 'blogprise' ),
		'panel' => 'theme_sidebar_panel',
	)
);

/* Home Page Layout */
$wp_customize->add_setting(
	'home_page_layout',
	array(
		'default'           => $theme_options_defaults['home_page_layout'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	new Blogprise_Radio_Image_Control(
		$wp_customize,
		'home_page_layout',
		array(
			'label'    => __( 'Front Page Sidebar Layout', 'blogprise' ),
			'section'  => 'home_page_layout_options',
			'choices'  => blogprise_get_general_layouts(),
			'priority' => 10,
		)
	)
);

// Hide Side Bar on Mobile.
$wp_customize->add_setting(
	'hide_front_page_sidebar_mobile',
	array(
		'default'           => $theme_options_defaults['hide_front_page_sidebar_mobile'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'hide_front_page_sidebar_mobile',
		array(
			'label'    => __( 'Hide Sidebar on Mobile', 'blogprise' ),
			'section'  => 'home_page_layout_options',
			'priority' => 20,
		)
	)
);

// Different Sidebar for front page.
$wp_customize->add_setting(
	'front_page_enable_sidebar',
	array(
		'default'           => $theme_options_defaults['front_page_enable_sidebar'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'front_page_enable_sidebar',
		array(
			'label'       => __( 'Enable Different Sidebar', 'blogprise' ),
			'section'     => 'home_page_layout_options',
			'description' => __( 'If not enabled, default global sidebar is used.', 'blogprise' ),
			'priority'    => 30,
		)
	)
);

/* Front Page Sticky enable/disable */
$wp_customize->add_setting(
	'front_page_sticky_sidebar',
	array(
		'default'           => $theme_options_defaults['front_page_sticky_sidebar'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'front_page_sticky_sidebar',
		array(
			'label'       => __( 'Sticky?', 'blogprise' ),
			'section'     => 'home_page_layout_options',
			'description' => __( 'Check to make it a sticky sidebar.', 'blogprise' ),
			'priority'    => 40,
		)
	)
);

// Widget Style.
$wp_customize->add_setting(
	'home_sidebar_widget_style',
	array(
		'default'           => $theme_options_defaults['home_sidebar_widget_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'home_sidebar_widget_style',
	array(
		'label'    => __( 'Sidebar Widget Style', 'blogprise' ),
		'section'  => 'home_page_layout_options',
		'type'     => 'select',
		'choices'  => blogprise_get_widget_styles_arr(),
		'priority' => 50,
	)
);

// Widget Title Style.
$wp_customize->add_setting(
	'home_sidebar_widget_heading_style',
	array(
		'default'           => $theme_options_defaults['home_sidebar_widget_heading_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'home_sidebar_widget_heading_style',
	array(
		'label'    => __( 'Sidebar Widget Title Style', 'blogprise' ),
		'section'  => 'home_page_layout_options',
		'type'     => 'select',
		'choices'  => blogprise_get_title_styles(),
		'priority' => 60,
	)
);

// Widget Title Align.
$wp_customize->add_setting(
	'home_sidebar_widget_heading_align',
	array(
		'default'           => $theme_options_defaults['home_sidebar_widget_heading_align'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'home_sidebar_widget_heading_align',
	array(
		'label'    => __( 'Sidebar Widget Title Alignment', 'blogprise' ),
		'section'  => 'home_page_layout_options',
		'type'     => 'select',
		'choices'  => blogprise_get_title_alignments(),
		'priority' => 70,
	)
);

/* Sidebar border */
$wp_customize->add_setting(
	'front_page_enable_sidebar_border',
	array(
		'default'           => $theme_options_defaults['front_page_enable_sidebar_border'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'front_page_enable_sidebar_border',
		array(
			'label'    => __( 'Enable Sidebar Border', 'blogprise' ),
			'section'  => 'home_page_layout_options',
			'priority' => 80,
		)
	)
);
