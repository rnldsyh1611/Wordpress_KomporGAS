<?php
$wp_customize->add_section(
	'single_author_box_options',
	array(
		'title' => __( 'Author Info Box Options', 'blogprise' ),
		'panel' => 'single_posts_options_panel',
	)
);

$wp_customize->add_setting(
	'show_author_info',
	array(
		'default'           => $theme_options_defaults['show_author_info'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'show_author_info',
		array(
			'label'    => __( 'Show Author Info Box', 'blogprise' ),
			'section'  => 'single_author_box_options',
			'priority' => 10,
		)
	)
);

$wp_customize->add_setting(
	'enable_author_info_bg',
	array(
		'default'           => $theme_options_defaults['enable_author_info_bg'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_author_info_bg',
		array(
			'label'           => __( 'Enable Info Box Background', 'blogprise' ),
			'section'         => 'single_author_box_options',
			'active_callback' => 'blogprise_is_author_info_enabled',
			'priority'        => 15,
		)
	)
);

$wp_customize->add_setting(
	'author_info_bg_color',
	array(
		'default'           => $theme_options_defaults['author_info_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'author_info_bg_color',
		array(
			'label'           => __( 'Author Info Box Background Color', 'blogprise' ),
			'section'         => 'single_author_box_options',
			'type'            => 'color',
			'active_callback' => function ( $control ) {
				return (
					blogprise_is_author_info_enabled( $control )
					&&
					blogprise_is_author_box_bg_enabled( $control )
				);
			},
			'priority'        => 16,
		)
	)
);

/*Author Info Text.*/
$wp_customize->add_setting(
	'author_info_text',
	array(
		'default'           => $theme_options_defaults['author_info_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'author_info_text',
	array(
		'label'           => __( 'Author Info Title', 'blogprise' ),
		'section'         => 'single_author_box_options',
		'type'            => 'text',
		'active_callback' => 'blogprise_is_author_info_enabled',
		'priority'        => 20,
	)
);

// Author Info Title Style.
$wp_customize->add_setting(
	'author_info_title_style',
	array(
		'default'           => $theme_options_defaults['author_info_title_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'author_info_title_style',
	array(
		'label'           => __( 'Author Info Title Style', 'blogprise' ),
		'section'         => 'single_author_box_options',
		'type'            => 'select',
		'choices'         => blogprise_get_title_styles(),
		'active_callback' => 'blogprise_is_author_info_enabled',
		'priority'        => 30,
	)
);

// Author Info Title Align.
$wp_customize->add_setting(
	'author_info_title_align',
	array(
		'default'           => $theme_options_defaults['author_info_title_align'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'author_info_title_align',
	array(
		'label'           => __( 'Author Info Title Align', 'blogprise' ),
		'section'         => 'single_author_box_options',
		'type'            => 'select',
		'choices'         => blogprise_get_title_alignments(),
		'active_callback' => 'blogprise_is_author_info_enabled',
		'priority'        => 40,
	)
);

// Author Info Box Style.
$wp_customize->add_setting(
	'author_info_box_style',
	array(
		'default'           => $theme_options_defaults['author_info_box_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'author_info_box_style',
	array(
		'label'           => __( 'Author Info Box Style', 'blogprise' ),
		'section'         => 'single_author_box_options',
		'type'            => 'select',
		'choices'         => array(
			'style_1' => __( 'Style 1', 'blogprise' ),
			'style_2' => __( 'Style 2', 'blogprise' ),
		),
		'active_callback' => 'blogprise_is_author_info_enabled',
		'priority'        => 50,
	)
);

// Stack on responsive.
$wp_customize->add_setting(
	'stack_author_info_resposive',
	array(
		'default'           => $theme_options_defaults['stack_author_info_resposive'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'stack_author_info_resposive',
		array(
			'label'           => __( 'Stack on Responsive', 'blogprise' ),
			'section'         => 'single_author_box_options',
			'active_callback' => 'blogprise_is_author_info_enabled',
			'priority'        => 60,
		)
	)
);
