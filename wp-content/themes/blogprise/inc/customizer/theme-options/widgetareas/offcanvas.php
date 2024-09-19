<?php

$wp_customize->add_section(
	'offcanvas_widgetarea_options',
	array(
		'title' => __( 'Offcanvas', 'blogprise' ),
		'panel' => 'widgetareas_options_panel',
	)
);

// Offcanvas Theme.
$wp_customize->add_setting(
	'offcanvas_theme',
	array(
		'default'           => $theme_options_defaults['offcanvas_theme'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'offcanvas_theme',
	array(
		'label'    => __( 'Offcanvas Theme', 'blogprise' ),
		'section'  => 'offcanvas_widgetarea_options',
		'type'     => 'select',
		'choices'  => array(
			'light' => __( 'Light', 'blogprise' ),
			'dark'  => __( 'Dark', 'blogprise' ),
		),
		'priority' => 10,
	)
);

// Light Offcanvas Background Color.
$wp_customize->add_setting(
	'offcanvas_bg_color',
	array(
		'default'           => $theme_options_defaults['offcanvas_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'offcanvas_bg_color',
		array(
			'label'           => __( 'Light Theme Background', 'blogprise' ),
			'section'         => 'offcanvas_widgetarea_options',
			'type'            => 'color',
			'active_callback' => 'blogprise_is_light_offcanvas',
			'priority'        => 20,
		)
	)
);

// Dark Offcanvas Background Color.
$wp_customize->add_setting(
	'dark_offcanvas_bg_color',
	array(
		'default'           => $theme_options_defaults['dark_offcanvas_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'dark_offcanvas_bg_color',
		array(
			'label'           => __( 'Dark Theme Background', 'blogprise' ),
			'section'         => 'offcanvas_widgetarea_options',
			'type'            => 'color',
			'active_callback' => 'blogprise_is_dark_offcanvas',
			'priority'        => 30,
		)
	)
);

/*Offcanvas Logo*/
$wp_customize->add_setting(
	'offcanvas_logo',
	array(
		'default'           => $theme_options_defaults['offcanvas_logo'],
		'sanitize_callback' => 'blogprise_sanitize_image',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'offcanvas_logo',
		array(
			'label'    => __( 'Offcanvas Logo', 'blogprise' ),
			'section'  => 'offcanvas_widgetarea_options',
			'priority' => 40,
		)
	)
);

/* Offcanvas Widgetareas heading style */
$wp_customize->add_setting(
	'offcanvas_widgetarea_heading_style',
	array(
		'default'           => $theme_options_defaults['offcanvas_widgetarea_heading_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'offcanvas_widgetarea_heading_style',
	array(
		'label'    => __( 'Widgets Title Style', 'blogprise' ),
		'section'  => 'offcanvas_widgetarea_options',
		'type'     => 'select',
		'choices'  => blogprise_get_title_styles(),
		'priority' => 50,
	)
);

/* Offcanvas Widgetarea heading Align */
$wp_customize->add_setting(
	'offcanvas_widgetarea_heading_align',
	array(
		'default'           => $theme_options_defaults['offcanvas_widgetarea_heading_align'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'offcanvas_widgetarea_heading_align',
	array(
		'label'    => __( 'Widgets Title Alignment', 'blogprise' ),
		'section'  => 'offcanvas_widgetarea_options',
		'type'     => 'select',
		'choices'  => blogprise_get_title_alignments(),
		'priority' => 60,
	)
);

/*Hide offcanvas on desktop*/
$wp_customize->add_setting(
	'offcanvas_hide_desktop',
	array(
		'default'           => $theme_options_defaults['offcanvas_hide_desktop'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'offcanvas_hide_desktop',
		array(
			'label'    => __( 'Hide Offcanvas on Desktop', 'blogprise' ),
			'section'  => 'offcanvas_widgetarea_options',
			'priority' => 70,
		)
	)
);

/*Hide offcanvas menu on desktop*/
$wp_customize->add_setting(
	'offcanvas_menu_hide_desktop',
	array(
		'default'           => $theme_options_defaults['offcanvas_menu_hide_desktop'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'offcanvas_menu_hide_desktop',
		array(
			'label'    => __( 'Hide Offcanvas menu on Desktop', 'blogprise' ),
			'section'  => 'offcanvas_widgetarea_options',
			'priority' => 80,
		)
	)
);