<?php

$wp_customize->add_section(
	'before_home_posts_widgetarea_options',
	array(
		'title' => __( 'Above Home Posts', 'blogprise' ),
		'panel' => 'widgetareas_options_panel',
	)
);

// Widget Style.
$wp_customize->add_setting(
	'before_home_posts_widgets_style',
	array(
		'default'           => $theme_options_defaults['before_home_posts_widgets_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'before_home_posts_widgets_style',
	array(
		'label'    => __( 'Widget Style', 'blogprise' ),
		'section'  => 'before_home_posts_widgetarea_options',
		'type'     => 'select',
		'choices'  => blogprise_get_widget_styles_arr(),
		'priority' => 1,
	)
);

/* Before Home Posts Widgetareas heading style */
$wp_customize->add_setting(
	'before_home_posts_widgetarea_heading_style',
	array(
		'default'           => $theme_options_defaults['before_home_posts_widgetarea_heading_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'before_home_posts_widgetarea_heading_style',
	array(
		'label'    => __( 'Widgets Title Style', 'blogprise' ),
		'section'  => 'before_home_posts_widgetarea_options',
		'priority' => 1,
		'type'     => 'select',
		'choices'  => blogprise_get_title_styles(),
	)
);

/* Before Home Posts Widgetarea heading Align */
$wp_customize->add_setting(
	'before_home_posts_widgetarea_heading_align',
	array(
		'default'           => $theme_options_defaults['before_home_posts_widgetarea_heading_align'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'before_home_posts_widgetarea_heading_align',
	array(
		'label'    => __( 'Widgets Title Alignment', 'blogprise' ),
		'section'  => 'before_home_posts_widgetarea_options',
		'priority' => 1,
		'type'     => 'select',
		'choices'  => blogprise_get_title_alignments(),
	)
);
