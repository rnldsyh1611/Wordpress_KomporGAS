<?php
$wp_customize->add_section(
	'single_comments_options',
	array(
		'title' => __( 'Comments Options', 'blogprise' ),
		'panel' => 'single_posts_options_panel',
	)
);

// Heading Style.
$wp_customize->add_setting(
	'single_comments_heading_style',
	array(
		'default'           => $theme_options_defaults['single_comments_heading_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'single_comments_heading_style',
	array(
		'label'    => __( 'Heading Style', 'blogprise' ),
		'section'  => 'single_comments_options',
		'type'     => 'select',
		'choices'  => blogprise_get_title_styles(),
		'priority' => 10,
	)
);

// Heading Align.
$wp_customize->add_setting(
	'single_comments_heading_align',
	array(
		'default'           => $theme_options_defaults['single_comments_heading_align'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'single_comments_heading_align',
	array(
		'label'    => __( 'Heading Align', 'blogprise' ),
		'section'  => 'single_comments_options',
		'type'     => 'select',
		'choices'  => blogprise_get_title_alignments(),
		'priority' => 20,
	)
);

// Center align Form Content.
$wp_customize->add_setting(
	'single_comments_center_form_content',
	array(
		'default'           => $theme_options_defaults['single_comments_center_form_content'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'single_comments_center_form_content',
		array(
			'label'    => __( 'Center Align Comment Form Content', 'blogprise' ),
			'section'  => 'single_comments_options',
			'priority' => 30,
		)
	)
);
