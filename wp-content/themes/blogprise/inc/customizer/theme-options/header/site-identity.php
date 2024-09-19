<?php
$wp_customize->remove_setting( 'display_header_text' );
$wp_customize->remove_control( 'display_header_text' );

$wp_customize->add_setting(
	'hide_title',
	array(
		'default'           => $theme_options_defaults['hide_title'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'hide_title',
		array(
			'label'    => __( 'Hide Site Title', 'blogprise' ),
			'section'  => 'title_tagline',
			'priority' => 10,
		)
	)
);

$wp_customize->add_setting(
	'hide_tagline',
	array(
		'default'           => $theme_options_defaults['hide_tagline'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'hide_tagline',
		array(
			'label'    => __( 'Hide Tagline', 'blogprise' ),
			'section'  => 'title_tagline',
			'priority' => 20,
		)
	)
);

// Tagline Style
$wp_customize->add_setting(
	'site_tagline_style',
	array(
		'default'           => $theme_options_defaults['site_tagline_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'site_tagline_style',
	array(
		'label'    => __( 'Site Tagline Style', 'blogprise' ),
		'section'  => 'title_tagline',
		'type'     => 'select',
		'choices'  => array(
			'style_1' => __( 'Style 1', 'blogprise' ),
			'style_2' => __( 'Style 2', 'blogprise' ),
			'style_3' => __( 'Style 3', 'blogprise' ),
			'style_4' => __( 'Style 4', 'blogprise' ),
		),
		'priority' => 30,
	)
);

/*Site title text size*/
$wp_customize->add_setting(
	'site_title_font_size_desktop',
	array(
		'default'           => $theme_options_defaults['site_title_font_size_desktop'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'site_title_font_size_desktop',
	array(
		'label'       => __( 'Site Title Text Size', 'blogprise' ),
		'description' => __( '( Default: 42px ) Changes\'re only applicable to desktop version.', 'blogprise' ),
		'section'     => 'title_tagline',
		'type'        => 'number',
		'input_attrs' => array(
			'min'   => 1,
			'max'   => 100,
			'style' => 'width: 150px;',
		),
		'priority'    => 40,
	)
);
$wp_customize->add_setting(
	'site_tagline_font_size_desktop',
	array(
		'default'           => $theme_options_defaults['site_tagline_font_size_desktop'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'site_tagline_font_size_desktop',
	array(
		'label'       => __( 'Site Tagline Text Size', 'blogprise' ),
		'description' => __( '( Default: 16px ) Changes\'re only applicable to desktop version.', 'blogprise' ),
		'section'     => 'title_tagline',
		'type'        => 'number',
		'input_attrs' => array(
			'min'   => 1,
			'max'   => 100,
			'style' => 'width: 150px;',
		),
		'priority'    => 50,
	)
);
