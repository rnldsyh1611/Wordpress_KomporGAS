<?php
$wp_customize->add_section(
	'single_author_post_options',
	array(
		'title' => __( 'Author Post Options', 'blogprise' ),
		'panel' => 'single_posts_options_panel',
	)
);

/*
Show Author Posts
*-----------------------------------------*/
$wp_customize->add_setting(
	'show_author_posts',
	array(
		'default'           => $theme_options_defaults['show_author_posts'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'show_author_posts',
		array(
			'label'    => __( 'Show Author Posts', 'blogprise' ),
			'section'  => 'single_author_post_options',
			'priority' => 10,
		)
	)
);

/*Author Posts Text.*/
$wp_customize->add_setting(
	'author_posts_text',
	array(
		'default'           => $theme_options_defaults['author_posts_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'author_posts_text',
	array(
		'label'           => __( 'Author Posts Title', 'blogprise' ),
		'section'         => 'single_author_post_options',
		'type'            => 'text',
		'active_callback' => 'blogprise_is_author_posts_enabled',
		'priority'        => 20,
	)
);

// Author Posts Title Style.
$wp_customize->add_setting(
	'author_posts_title_style',
	array(
		'default'           => $theme_options_defaults['author_posts_title_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'author_posts_title_style',
	array(
		'label'           => __( 'Author Posts Title Style', 'blogprise' ),
		'section'         => 'single_author_post_options',
		'type'            => 'select',
		'choices'         => blogprise_get_title_styles(),
		'active_callback' => 'blogprise_is_author_posts_enabled',
		'priority'        => 30,
	)
);

// Author Posts Title Align.
$wp_customize->add_setting(
	'author_posts_title_align',
	array(
		'default'           => $theme_options_defaults['author_posts_title_align'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'author_posts_title_align',
	array(
		'label'           => __( 'Author Posts Title Align', 'blogprise' ),
		'section'         => 'single_author_post_options',
		'type'            => 'select',
		'choices'         => blogprise_get_title_alignments(),
		'active_callback' => 'blogprise_is_author_posts_enabled',
		'priority'        => 40,
	)
);

/* Number of Author Posts */
$wp_customize->add_setting(
	'no_of_author_posts',
	array(
		'default'           => $theme_options_defaults['no_of_author_posts'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'no_of_author_posts',
	array(
		'label'           => __( 'Number of Author Posts', 'blogprise' ),
		'section'         => 'single_author_post_options',
		'type'            => 'number',
		'active_callback' => 'blogprise_is_author_posts_enabled',
		'priority'        => 50,
	)
);

/*Author Posts Orderby*/
$wp_customize->add_setting(
	'author_posts_orderby',
	array(
		'default'           => $theme_options_defaults['author_posts_orderby'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'author_posts_orderby',
	array(
		'label'           => __( 'Orderby', 'blogprise' ),
		'section'         => 'single_author_post_options',
		'type'            => 'select',
		'choices'         => array(
			'date'  => __( 'Date', 'blogprise' ),
			'id'    => __( 'ID', 'blogprise' ),
			'title' => __( 'Title', 'blogprise' ),
			'rand'  => __( 'Random', 'blogprise' ),
		),
		'active_callback' => 'blogprise_is_author_posts_enabled',
		'priority'        => 60,
	)
);

/*Author Posts Order*/
$wp_customize->add_setting(
	'author_posts_order',
	array(
		'default'           => $theme_options_defaults['author_posts_order'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'author_posts_order',
	array(
		'label'           => __( 'Order', 'blogprise' ),
		'section'         => 'single_author_post_options',
		'type'            => 'select',
		'choices'         => array(
			'asc'  => __( 'ASC', 'blogprise' ),
			'desc' => __( 'DESC', 'blogprise' ),
		),
		'active_callback' => 'blogprise_is_author_posts_enabled',
		'priority'        => 70,
	)
);

// Show Author Post Category.
$wp_customize->add_setting(
	'show_author_posts_category',
	array(
		'default'           => $theme_options_defaults['show_author_posts_category'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'show_author_posts_category',
		array(
			'label'           => __( 'Show Author Post Category', 'blogprise' ),
			'section'         => 'single_author_post_options',
			'active_callback' => 'blogprise_is_author_posts_enabled',
			'priority'        => 80,
		)
	)
);

// Author Posts Category Color Display.
$wp_customize->add_setting(
	'author_posts_category_color_display',
	array(
		'default'           => $theme_options_defaults['author_posts_category_color_display'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'author_posts_category_color_display',
	array(
		'label'           => __( 'Author Posts Category Color Display', 'blogprise' ),
		'section'         => 'single_author_post_options',
		'type'            => 'select',
		'choices'         => blogprise_get_category_color_display(),
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_author_posts_enabled( $control )
				&&
				blogprise_is_author_posts_category_enabled( $control )
			);
		},
		'priority'        => 90,
	)
);

// Author Post Category Style.
$wp_customize->add_setting(
	'author_posts_category_style',
	array(
		'default'           => $theme_options_defaults['author_posts_category_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'author_posts_category_style',
	array(
		'label'           => __( 'Author Post Category Style', 'blogprise' ),
		'section'         => 'single_author_post_options',
		'type'            => 'select',
		'choices'         => blogprise_get_category_styles(),
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_author_posts_enabled( $control )
				&&
				blogprise_is_author_posts_category_enabled( $control )
			);
		},
		'priority'        => 100,
	)
);

// No of Author Post Categories.
$wp_customize->add_setting(
	'author_posts_category_limit',
	array(
		'default'           => $theme_options_defaults['author_posts_category_limit'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'author_posts_category_limit',
	array(
		'label'           => __( 'Number of Categories To Display', 'blogprise' ),
		'section'         => 'single_author_post_options',
		'type'            => 'number',
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_author_posts_enabled( $control )
				&&
				blogprise_is_author_posts_category_enabled( $control )
			);
		},
		'priority'        => 110,
	)
);

/* Author Posts Meta */
$wp_customize->add_setting(
	'author_post_meta',
	array(
		'default'           => $theme_options_defaults['author_post_meta'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox_multiple',
	)
);
$wp_customize->add_control(
	new Blogprise_Checkbox_Multiple(
		$wp_customize,
		'author_post_meta',
		array(
			'label'           => __( 'Author Post Meta', 'blogprise' ),
			'section'         => 'single_author_post_options',
			'choices'         => array(
				'author'    => __( 'Author', 'blogprise' ),
				'read_time' => __( 'Post Read Time', 'blogprise' ),
				'date'      => __( 'Date', 'blogprise' ),
				'comment'   => __( 'Comment', 'blogprise' ),
			),
			'active_callback' => 'blogprise_is_author_posts_enabled',
			'priority'        => 120,
		)
	)
);

// Show Post Meta Icon.
$wp_customize->add_setting(
	'show_author_post_meta_icon',
	array(
		'default'           => $theme_options_defaults['show_author_post_meta_icon'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'show_author_post_meta_icon',
		array(
			'label'           => __( 'Show Post Meta Icon', 'blogprise' ),
			'description'     => __( 'Some Icons may show up regardless to provide better info.', 'blogprise' ),
			'section'         => 'single_author_post_options',
			'active_callback' => 'blogprise_is_author_posts_enabled',
			'priority'        => 130,
		)
	)
);

// Author Post Date Format
$wp_customize->add_setting(
	'author_posts_date_format',
	array(
		'default'           => $theme_options_defaults['author_posts_date_format'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'author_posts_date_format',
	array(
		'label'           => __( 'Date Format', 'blogprise' ),
		'description'     => __( 'Make sure to enable Date post meta from above for this to work.', 'blogprise' ),
		'section'         => 'single_author_post_options',
		'type'            => 'select',
		'choices'         => array(
			'format_1' => __( 'Times Ago', 'blogprise' ),
			'format_2' => __( 'Default Format', 'blogprise' ),
		),
		'active_callback' => 'blogprise_is_author_posts_enabled',
		'priority'        => 140,
	)
);

// Show Author Post author image.
$wp_customize->add_setting(
	'enable_author_posts_author_image',
	array(
		'default'           => $theme_options_defaults['enable_author_posts_author_image'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_author_posts_author_image',
		array(
			'label'           => __( 'Show Author Image', 'blogprise' ),
			'description'     => __( 'Make sure to enable Author post meta from above for this to work.', 'blogprise' ),
			'section'         => 'single_author_post_options',
			'active_callback' => 'blogprise_is_author_posts_enabled',
			'priority'        => 150,
		)
	)
);

// Show desc.
$wp_customize->add_setting(
	'enable_author_posts_desc',
	array(
		'default'           => $theme_options_defaults['enable_author_posts_desc'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_author_posts_desc',
		array(
			'label'           => __( 'Show Post Description', 'blogprise' ),
			'section'         => 'single_author_post_options',
			'active_callback' => 'blogprise_is_author_posts_enabled',
			'priority'        => 160,
		)
	)
);

// Author_post desc length.
$wp_customize->add_setting(
	'author_posts_desc_length',
	array(
		'default'           => $theme_options_defaults['author_posts_desc_length'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'author_posts_desc_length',
	array(
		'label'           => __( 'Post Description Length', 'blogprise' ),
		'section'         => 'single_author_post_options',
		'type'            => 'number',
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_author_posts_enabled( $control )
				&&
				blogprise_is_author_posts_desc_enabled( $control )
			);
		},
		'priority'        => 170,
	)
);

// Show read more.
$wp_customize->add_setting(
	'enable_author_posts_read_more_btn',
	array(
		'default'           => $theme_options_defaults['enable_author_posts_read_more_btn'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_author_posts_read_more_btn',
		array(
			'label'           => __( 'Show Read More', 'blogprise' ),
			'section'         => 'single_author_post_options',
			'active_callback' => 'blogprise_is_author_posts_enabled',
			'priority'        => 180,
		)
	)
);

// Read More Text.
$wp_customize->add_setting(
	'author_posts_read_more_btn_text',
	array(
		'default'           => $theme_options_defaults['author_posts_read_more_btn_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'author_posts_read_more_btn_text',
	array(
		'label'           => __( 'Read More Text', 'blogprise' ),
		'description'     => __( 'Leave empty if you want to use the default text "Read more".', 'blogprise' ),
		'section'         => 'single_author_post_options',
		'type'            => 'text',
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_author_posts_enabled( $control )
				&&
				blogprise_is_author_posts_read_more_enabled( $control )
			);
		},
		'priority'        => 190,
	)
);

// Read more stlye.
$wp_customize->add_setting(
	'author_posts_read_more_style',
	array(
		'default'           => $theme_options_defaults['author_posts_read_more_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'author_posts_read_more_style',
	array(
		'label'           => __( 'Read More Style', 'blogprise' ),
		'section'         => 'single_author_post_options',
		'type'            => 'select',
		'choices'         => blogprise_get_read_more_styles(),
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_author_posts_enabled( $control )
				&&
				blogprise_is_author_posts_read_more_enabled( $control )
			);
		},
		'priority'        => 200,
	)
);

// Read More Icon.
$wp_customize->add_setting(
	'author_posts_read_more_icon',
	array(
		'default'           => $theme_options_defaults['author_posts_read_more_icon'],
		'sanitize_callback' => 'blogprise_sanitize_radio',
	)
);
$wp_customize->add_control(
	new Blogprise_Radio_Image_Control(
		$wp_customize,
		'author_posts_read_more_icon',
		array(
			'label'           => __( 'Read More Icon', 'blogprise' ),
			'section'         => 'single_author_post_options',
			'choices'         => blogprise_get_read_more_icons(),
			'active_callback' => function ( $control ) {
				return (
					blogprise_is_author_posts_enabled( $control )
					&&
					blogprise_is_author_posts_read_more_enabled( $control )
				);
			},
			'priority'        => 210,
		)
	)
);

// Author Post Title Limit.
$wp_customize->add_setting(
	'author_posts_title_limit',
	array(
		'default'           => '',
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'author_posts_title_limit',
	array(
		'label'           => __( 'Post Title Limit', 'blogprise' ),
		'section'         => 'single_author_post_options',
		'type'            => 'select',
		'choices'         => blogprise_get_title_limit_choices(),
		'active_callback' => 'blogprise_is_author_posts_enabled',
		'priority'        => 220,
	)
);

// Show Post Format Icons.
$wp_customize->add_setting(
	'show_author_posts_post_format_icon',
	array(
		'default'           => $theme_options_defaults['show_author_posts_post_format_icon'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'show_author_posts_post_format_icon',
		array(
			'label'           => __( 'Show Post Format Icon', 'blogprise' ),
			'section'         => 'single_author_post_options',
			'active_callback' => 'blogprise_is_author_posts_enabled',
			'priority'        => 230,
		)
	)
);
