<?php

$wp_customize->add_section(
	'home_columns_widgetarea_options',
	array(
		'title' => __( 'Home Columns', 'blogprise' ),
		'panel' => 'widgetareas_options_panel',
	)
);

// Home Columns section background.
$wp_customize->add_setting(
	'home_columns_widgetarea_bg_color',
	array(
		'default'           => $theme_options_defaults['home_columns_widgetarea_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'home_columns_widgetarea_bg_color',
		array(
			'label'    => __( 'Section Background', 'blogprise' ),
			'section'  => 'home_columns_widgetarea_options',
			'type'     => 'color',
			'priority' => 1,
		)
	)
);

// Widget Style.
$wp_customize->add_setting(
	'home_col_one_widgets_style',
	array(
		'default'           => $theme_options_defaults['home_col_one_widgets_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'home_col_one_widgets_style',
	array(
		'label'    => __( 'First Column Widget Style', 'blogprise' ),
		'section'  => 'home_columns_widgetarea_options',
		'type'     => 'select',
		'choices'  => blogprise_get_widget_styles_arr(),
		'priority' => 1,
	)
);

/* Home Column One Widgetareas heading style */
$wp_customize->add_setting(
	'home_col_one_widgetarea_heading_style',
	array(
		'default'           => $theme_options_defaults['home_col_one_widgetarea_heading_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'home_col_one_widgetarea_heading_style',
	array(
		'label'    => __( 'First Column Widgets Title Style', 'blogprise' ),
		'section'  => 'home_columns_widgetarea_options',
		'priority' => 1,
		'type'     => 'select',
		'choices'  => blogprise_get_title_styles(),
	)
);

/* Home Column One Widgetarea heading Align */
$wp_customize->add_setting(
	'home_col_one_widgetarea_heading_align',
	array(
		'default'           => $theme_options_defaults['home_col_one_widgetarea_heading_align'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'home_col_one_widgetarea_heading_align',
	array(
		'label'    => __( 'First Column Widgets Title Alignment', 'blogprise' ),
		'section'  => 'home_columns_widgetarea_options',
		'priority' => 1,
		'type'     => 'select',
		'choices'  => blogprise_get_title_alignments(),
	)
);

// Widget Style.
$wp_customize->add_setting(
	'home_col_two_widgets_style',
	array(
		'default'           => $theme_options_defaults['home_col_two_widgets_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'home_col_two_widgets_style',
	array(
		'label'    => __( 'Second Column Widget Style', 'blogprise' ),
		'section'  => 'home_columns_widgetarea_options',
		'type'     => 'select',
		'choices'  => blogprise_get_widget_styles_arr(),
		'priority' => 1,
	)
);

/* Home Column Two Widgetareas heading style */
$wp_customize->add_setting(
	'home_col_two_widgetarea_heading_style',
	array(
		'default'           => $theme_options_defaults['home_col_two_widgetarea_heading_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'home_col_two_widgetarea_heading_style',
	array(
		'label'    => __( 'Second Column Widgets Title Style', 'blogprise' ),
		'section'  => 'home_columns_widgetarea_options',
		'priority' => 1,
		'type'     => 'select',
		'choices'  => blogprise_get_title_styles(),
	)
);

/* Home Column Two Widgetarea heading Align */
$wp_customize->add_setting(
	'home_col_two_widgetarea_heading_align',
	array(
		'default'           => $theme_options_defaults['home_col_two_widgetarea_heading_align'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'home_col_two_widgetarea_heading_align',
	array(
		'label'    => __( 'Second Column Widgets Title Alignment', 'blogprise' ),
		'section'  => 'home_columns_widgetarea_options',
		'priority' => 1,
		'type'     => 'select',
		'choices'  => blogprise_get_title_alignments(),
	)
);

/*Hide Column Two Widgetarea on mobile*/
$wp_customize->add_setting(
	'home_col_two_widgetarea_hide_mobile',
	array(
		'default'           => $theme_options_defaults['home_col_two_widgetarea_hide_mobile'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'home_col_two_widgetarea_hide_mobile',
		array(
			'label'    => __( 'Hide Second Column on Mobile', 'blogprise' ),
			'section'  => 'home_columns_widgetarea_options',
			'priority' => 1,
		)
	)
);