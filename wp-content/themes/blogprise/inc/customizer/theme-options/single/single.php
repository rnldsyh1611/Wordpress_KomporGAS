<?php
$wp_customize->add_section(
	'single_post_options',
	array(
		'title' => __( 'Single Post Options', 'blogprise' ),
		'panel' => 'single_posts_options_panel',
	)
);

/* Single Post Layout*/
$wp_customize->add_setting(
	'single_post_layout',
	array(
		'default'           => $theme_options_defaults['single_post_layout'],
		'sanitize_callback' => 'blogprise_sanitize_radio',
	)
);
$wp_customize->add_control(
	new Blogprise_Radio_Image_Control(
		$wp_customize,
		'single_post_layout',
		array(
			'label'    => __( 'Single Post Layout', 'blogprise' ),
			'section'  => 'single_post_options',
			'choices'  => blogprise_get_general_layouts(),
			'priority' => 10,
		)
	)
);

/*Single Post Style*/
$wp_customize->add_setting(
	'single_post_style',
	array(
		'default'           => $theme_options_defaults['single_post_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'single_post_style',
	array(
		'label'    => __( 'Single Post Style', 'blogprise' ),
		'section'  => 'single_post_options',
		'type'     => 'select',
		'choices'  => blogprise_get_single_layouts(),
		'priority' => 20,
	)
);

/*Posts Navigation Style*/
$wp_customize->add_setting(
	'posts_navigation_style',
	array(
		'default'           => $theme_options_defaults['posts_navigation_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'posts_navigation_style',
	array(
		'label'    => __( 'Posts Navigation', 'blogprise' ),
		'section'  => 'single_post_options',
		'type'     => 'select',
		'choices'  => blogprise_get_single_navigation_styles(),
		'priority' => 30,
	)
);

/* Post Meta */
$wp_customize->add_setting(
	'single_post_meta',
	array(
		'default'           => $theme_options_defaults['single_post_meta'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox_multiple',
	)
);
$wp_customize->add_control(
	new Blogprise_Checkbox_Multiple(
		$wp_customize,
		'single_post_meta',
		array(
			'label'       => __( 'Single Post Meta', 'blogprise' ),
			'description' => __( 'Choose the post meta you want to be displayed on post detail page', 'blogprise' ),
			'section'     => 'single_post_options',
			'choices'     => array(
				'author'    => __( 'Author', 'blogprise' ),
				'read_time' => __( 'Post Read Time', 'blogprise' ),
				'date'      => __( 'Date', 'blogprise' ),
				'comment'   => __( 'Comment', 'blogprise' ),
				'category'  => __( 'Category', 'blogprise' ),
				'tags'      => __( 'Tags', 'blogprise' ),
			),
			'priority'    => 40,
		)
	)
);

// Show Post Meta Icon.
$wp_customize->add_setting(
	'show_single_post_meta_icon',
	array(
		'default'           => $theme_options_defaults['show_single_post_meta_icon'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'show_single_post_meta_icon',
		array(
			'label'       => __( 'Show Post Meta Icon', 'blogprise' ),
			'description' => __( 'Some Icons may show up regardless to provide better info.', 'blogprise' ),
			'section'     => 'single_post_options',
			'priority'    => 50,
		)
	)
);

// Center Align header meta.
$wp_customize->add_setting(
	'center_align_single_header_meta',
	array(
		'default'           => $theme_options_defaults['center_align_single_header_meta'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'center_align_single_header_meta',
		array(
			'label'    => __( 'Center Align Post Header Meta', 'blogprise' ),
			'section'  => 'single_post_options',
			'priority' => 60,
		)
	)
);

// Single Post Date Format.
$wp_customize->add_setting(
	'single_date_format',
	array(
		'default'           => $theme_options_defaults['single_date_format'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'single_date_format',
	array(
		'label'       => __( 'Date Format', 'blogprise' ),
		'description' => __( 'Make sure to enable Date post meta from above for this to work.', 'blogprise' ),
		'section'     => 'single_post_options',
		'type'        => 'select',
		'choices'     => array(
			'format_1' => __( 'Times Ago', 'blogprise' ),
			'format_2' => __( 'Default Format', 'blogprise' ),
		),
		'priority'    => 70,
	)
);

// Show Single Post author image.
$wp_customize->add_setting(
	'enable_single_author_image',
	array(
		'default'           => $theme_options_defaults['enable_single_author_image'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_single_author_image',
		array(
			'label'       => __( 'Show Author Image', 'blogprise' ),
			'description' => __( 'Make sure to enable Author post meta from above for this to work.', 'blogprise' ),
			'section'     => 'single_post_options',
			'priority'    => 80,
		)
	)
);

// Show Single Category Label.
$wp_customize->add_setting(
	'enable_single_cat_label',
	array(
		'default'           => $theme_options_defaults['enable_single_cat_label'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_single_cat_label',
		array(
			'label'       => __( 'Show Category Label', 'blogprise' ),
			'description' => __( 'Make sure to enable Category post meta from above for this to work.', 'blogprise' ),
			'section'     => 'single_post_options',
			'priority'    => 90,
		)
	)
);

// Single Category Color Display.
$wp_customize->add_setting(
	'single_category_color_display',
	array(
		'default'           => $theme_options_defaults['single_category_color_display'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'single_category_color_display',
	array(
		'label'    => __( 'Category Color Display', 'blogprise' ),
		'section'  => 'single_post_options',
		'type'     => 'select',
		'choices'  => blogprise_get_category_color_display(),
		'priority' => 100,
	)
);

/* Category Style in Single post Page*/
$wp_customize->add_setting(
	'single_category_style',
	array(
		'default'           => $theme_options_defaults['single_category_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'single_category_style',
	array(
		'label'    => __( 'Category Style', 'blogprise' ),
		'section'  => 'single_post_options',
		'type'     => 'select',
		'choices'  => blogprise_get_category_styles(),
		'priority' => 110,
	)
);

// No of Single Categories.
$wp_customize->add_setting(
	'single_category_limit',
	array(
		'default'           => $theme_options_defaults['single_category_limit'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'single_category_limit',
	array(
		'label'       => __( 'Limit Categories To Display', 'blogprise' ),
		'description' => __( 'Use 0 for no limit.', 'blogprise' ),
		'section'     => 'single_post_options',
		'type'        => 'number',
		'priority'    => 120,
	)
);

// Single Category Position.
$wp_customize->add_setting(
	'single_category_position',
	array(
		'default'           => $theme_options_defaults['single_category_position'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'single_category_position',
	array(
		'label'    => __( 'Single Category Position', 'blogprise' ),
		'section'  => 'single_post_options',
		'type'     => 'select',
		'choices'  => array(
			'before_title'  => __( 'Before Title', 'blogprise' ),
			'after_content' => __( 'After Content', 'blogprise' ),
		),
		'priority' => 130,
	)
);

// Show Single Tag Label.
$wp_customize->add_setting(
	'enable_single_tag_label',
	array(
		'default'           => $theme_options_defaults['enable_single_tag_label'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_single_tag_label',
		array(
			'label'       => __( 'Show Tag Icon', 'blogprise' ),
			'description' => __( 'Make sure to enable Tags post meta from above for this to work.', 'blogprise' ),
			'section'     => 'single_post_options',
			'priority'    => 140,
		)
	)
);

/* Tag Style in Single post Page*/
$wp_customize->add_setting(
	'single_tag_style',
	array(
		'default'           => $theme_options_defaults['single_tag_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'single_tag_style',
	array(
		'label'    => __( 'Tag Style', 'blogprise' ),
		'section'  => 'single_post_options',
		'type'     => 'select',
		'choices'  => blogprise_get_tag_styles(),
		'priority' => 150,
	)
);

// No of Single Tags.
$wp_customize->add_setting(
	'single_tag_limit',
	array(
		'default'           => $theme_options_defaults['single_tag_limit'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'single_tag_limit',
	array(
		'label'       => __( 'Limit Tags To Display', 'blogprise' ),
		'description' => __( 'Use 0 for no limit.', 'blogprise' ),
		'section'     => 'single_post_options',
		'type'        => 'number',
		'priority'    => 160,
	)
);
