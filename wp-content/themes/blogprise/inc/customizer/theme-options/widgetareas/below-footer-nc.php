<?php

$wp_customize->add_section(
	'below_footer_nc_widgetarea_options',
	array(
		'title' => __( 'Below Footer - No Container', 'blogprise' ),
		'panel' => 'widgetareas_options_panel',
	)
);

// Background Color.
$wp_customize->add_setting(
	'below_footer_nc_widgetarea_bg_color',
	array(
		'default'           => $theme_options_defaults['below_footer_nc_widgetarea_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'below_footer_nc_widgetarea_bg_color',
		array(
			'label'    => __( 'Section Background Color', 'blogprise' ),
			'section'  => 'below_footer_nc_widgetarea_options',
			'type'     => 'color',
			'priority' => 1,
		)
	)
);

/* Below Footer NC Widgetareas heading style */
$wp_customize->add_setting(
	'below_footer_nc_widgetarea_heading_style',
	array(
		'default'           => $theme_options_defaults['below_footer_nc_widgetarea_heading_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'below_footer_nc_widgetarea_heading_style',
	array(
		'label'    => __( 'Widgets Title Style', 'blogprise' ),
		'section'  => 'below_footer_nc_widgetarea_options',
		'priority' => 1,
		'type'     => 'select',
		'choices'  => blogprise_get_title_styles(),
	)
);

/* Below Footer NC Widgetarea heading Align */
$wp_customize->add_setting(
	'below_footer_nc_widgetarea_heading_align',
	array(
		'default'           => $theme_options_defaults['below_footer_nc_widgetarea_heading_align'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'below_footer_nc_widgetarea_heading_align',
	array(
		'label'    => __( 'Widgets Title Alignment', 'blogprise' ),
		'section'  => 'below_footer_nc_widgetarea_options',
		'priority' => 1,
		'type'     => 'select',
		'choices'  => blogprise_get_title_alignments(),
	)
);
