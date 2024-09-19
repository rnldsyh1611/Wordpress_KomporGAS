<?php
// Trending Posts Options.
$wp_customize->add_section(
	'home_page_trending_posts_options',
	array(
		'title' => __( 'Trending Post Options', 'blogprise' ),
		'panel' => 'theme_home_option_panel',
	)
);

// Enable Trending Posts.
$wp_customize->add_setting(
	'enable_trending_posts',
	array(
		'default'           => $theme_options_defaults['enable_trending_posts'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_trending_posts',
		array(
			'label'    => __( 'Enable Trending Posts', 'blogprise' ),
			'section'  => 'home_page_trending_posts_options',
			'priority' => 10,
		)
	)
);

// Trending section background.
$wp_customize->add_setting(
	'trending_section_bg_color',
	array(
		'default'           => $theme_options_defaults['trending_section_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'trending_section_bg_color',
		array(
			'label'           => __( 'Trending Section Background', 'blogprise' ),
			'section'         => 'home_page_trending_posts_options',
			'type'            => 'color',
			'active_callback' => 'blogprise_is_trending_posts_enabled',
			'priority'        => 20,
		)
	)
);

// Trending Posts Title.
$wp_customize->add_setting(
	'trending_posts_title',
	array(
		'default'           => $theme_options_defaults['trending_posts_title'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'trending_posts_title',
	array(
		'label'           => __( 'Trending Posts Title', 'blogprise' ),
		'description'     => __( 'Leave empty if you don\'t want to show the title.', 'blogprise' ),
		'section'         => 'home_page_trending_posts_options',
		'type'            => 'text',
		'active_callback' => 'blogprise_is_trending_posts_enabled',
		'priority'        => 30,
	)
);

// Trending Post Title Style.
$wp_customize->add_setting(
	'trending_posts_title_style',
	array(
		'default'           => $theme_options_defaults['trending_posts_title_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'trending_posts_title_style',
	array(
		'label'           => __( 'Trending Post Title Style', 'blogprise' ),
		'section'         => 'home_page_trending_posts_options',
		'type'            => 'select',
		'choices'         => blogprise_get_title_styles(),
		'active_callback' => 'blogprise_is_trending_posts_enabled',
		'priority'        => 40,
	)
);

// Trending Post Title Align.
$wp_customize->add_setting(
	'trending_posts_title_align',
	array(
		'default'           => $theme_options_defaults['trending_posts_title_align'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'trending_posts_title_align',
	array(
		'label'           => __( 'Trending Post Title Alignment', 'blogprise' ),
		'section'         => 'home_page_trending_posts_options',
		'type'            => 'select',
		'choices'         => blogprise_get_title_alignments(),
		'active_callback' => 'blogprise_is_trending_posts_enabled',
		'priority'        => 50,
	)
);

// Trending Post Column.
$wp_customize->add_setting(
	'trending_posts_column',
	array(
		'default'           => $theme_options_defaults['trending_posts_column'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'trending_posts_column',
	array(
		'label'           => __( 'Trending Post Column', 'blogprise' ),
		'section'         => 'home_page_trending_posts_options',
		'type'            => 'select',
		'choices'         => array(
			'2' => __( '2', 'blogprise' ),
			'3' => __( '3', 'blogprise' ),
			'4' => __( '4', 'blogprise' ),
			'5' => __( '5', 'blogprise' ),
		),
		'active_callback' => 'blogprise_is_trending_posts_enabled',
		'priority'        => 60,
	)
);

// Trending Posts Category.
$wp_customize->add_setting(
	'trending_posts_cat',
	array(
		'default'           => $theme_options_defaults['trending_posts_cat'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Blogprise_Dropdown_Taxonomies_Control(
		$wp_customize,
		'trending_posts_cat',
		array(
			'label'           => __( 'Choose Trending posts category', 'blogprise' ),
			'section'         => 'home_page_trending_posts_options',
			'active_callback' => 'blogprise_is_trending_posts_enabled',
			'priority'        => 70,
		)
	)
);

// No of posts.
$wp_customize->add_setting(
	'no_of_trending_posts',
	array(
		'default'           => $theme_options_defaults['no_of_trending_posts'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'no_of_trending_posts',
	array(
		'label'           => __( 'Number of Posts', 'blogprise' ),
		'section'         => 'home_page_trending_posts_options',
		'type'            => 'number',
		'active_callback' => 'blogprise_is_trending_posts_enabled',
		'priority'        => 80,
	)
);

// Posts Orderby.
$wp_customize->add_setting(
	'trending_posts_orderby',
	array(
		'default'           => $theme_options_defaults['trending_posts_orderby'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'trending_posts_orderby',
	array(
		'label'           => __( 'Orderby', 'blogprise' ),
		'section'         => 'home_page_trending_posts_options',
		'type'            => 'select',
		'choices'         => array(
			'date'  => __( 'Date', 'blogprise' ),
			'id'    => __( 'ID', 'blogprise' ),
			'title' => __( 'Title', 'blogprise' ),
			'rand'  => __( 'Random', 'blogprise' ),
		),
		'active_callback' => 'blogprise_is_trending_posts_enabled',
		'priority'        => 90,
	)
);

// Posts Order.
$wp_customize->add_setting(
	'trending_posts_order',
	array(
		'default'           => $theme_options_defaults['trending_posts_order'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'trending_posts_order',
	array(
		'label'           => __( 'Order', 'blogprise' ),
		'section'         => 'home_page_trending_posts_options',
		'type'            => 'select',
		'choices'         => array(
			'asc'  => __( 'ASC', 'blogprise' ),
			'desc' => __( 'DESC', 'blogprise' ),
		),
		'active_callback' => 'blogprise_is_trending_posts_enabled',
		'priority'        => 100,
	)
);

// Show Trending Post Category.
$wp_customize->add_setting(
	'show_trending_posts_category',
	array(
		'default'           => $theme_options_defaults['show_trending_posts_category'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'show_trending_posts_category',
		array(
			'label'           => __( 'Show Trending Post Category', 'blogprise' ),
			'section'         => 'home_page_trending_posts_options',
			'active_callback' => 'blogprise_is_trending_posts_enabled',
			'priority'        => 110,
		)
	)
);

// Trending Posts Category Color Display.
$wp_customize->add_setting(
	'trending_posts_category_color_display',
	array(
		'default'           => $theme_options_defaults['trending_posts_category_color_display'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'trending_posts_category_color_display',
	array(
		'label'           => __( 'Trending Posts Category Color Display', 'blogprise' ),
		'section'         => 'home_page_trending_posts_options',
		'type'            => 'select',
		'choices'         => blogprise_get_category_color_display(),
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_trending_posts_enabled( $control )
				&&
				blogprise_is_trending_posts_category_enabled( $control )
			);
		},
		'priority'        => 120,
	)
);

// Trending Post Category Style.
$wp_customize->add_setting(
	'trending_posts_category_style',
	array(
		'default'           => $theme_options_defaults['trending_posts_category_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'trending_posts_category_style',
	array(
		'label'           => __( 'Trending Post Category Style', 'blogprise' ),
		'section'         => 'home_page_trending_posts_options',
		'type'            => 'select',
		'choices'         => blogprise_get_category_styles(),
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_trending_posts_enabled( $control )
				&&
				blogprise_is_trending_posts_category_enabled( $control )
			);
		},
		'priority'        => 130,
	)
);

// No of Trending Post Categories.
$wp_customize->add_setting(
	'trending_posts_category_limit',
	array(
		'default'           => $theme_options_defaults['trending_posts_category_limit'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'trending_posts_category_limit',
	array(
		'label'           => __( 'Number of Categories To Display', 'blogprise' ),
		'section'         => 'home_page_trending_posts_options',
		'type'            => 'number',
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_trending_posts_enabled( $control )
				&&
				blogprise_is_trending_posts_category_enabled( $control )
			);
		},
		'priority'        => 140,
	)
);

/* Trending Posts Meta */
$wp_customize->add_setting(
	'trending_post_meta',
	array(
		'default'           => $theme_options_defaults['trending_post_meta'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox_multiple',
	)
);
$wp_customize->add_control(
	new Blogprise_Checkbox_Multiple(
		$wp_customize,
		'trending_post_meta',
		array(
			'label'           => __( 'Trending Post Meta', 'blogprise' ),
			'section'         => 'home_page_trending_posts_options',
			'choices'         => array(
				'author'    => __( 'Author', 'blogprise' ),
				'read_time' => __( 'Post Read Time', 'blogprise' ),
				'date'      => __( 'Date', 'blogprise' ),
				'comment'   => __( 'Comment', 'blogprise' ),
			),
			'active_callback' => 'blogprise_is_trending_posts_enabled',
			'priority'        => 150,
		)
	)
);

// Show Post Meta Icon.
$wp_customize->add_setting(
	'show_trending_post_meta_icon',
	array(
		'default'           => $theme_options_defaults['show_trending_post_meta_icon'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'show_trending_post_meta_icon',
		array(
			'label'           => __( 'Show Post Meta Icon', 'blogprise' ),
			'description'     => __( 'Some Icons may show up regardless to provide better info.', 'blogprise' ),
			'section'         => 'home_page_trending_posts_options',
			'active_callback' => 'blogprise_is_trending_posts_enabled',
			'priority'        => 160,
		)
	)
);

// Trending Post Date Format
$wp_customize->add_setting(
	'trending_posts_date_format',
	array(
		'default'           => $theme_options_defaults['trending_posts_date_format'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'trending_posts_date_format',
	array(
		'label'           => __( 'Date Format', 'blogprise' ),
		'description'     => __( 'Make sure to enable Date post meta from above for this to work.', 'blogprise' ),
		'section'         => 'home_page_trending_posts_options',
		'type'            => 'select',
		'choices'         => array(
			'format_1' => __( 'Times Ago', 'blogprise' ),
			'format_2' => __( 'Default Format', 'blogprise' ),
		),
		'active_callback' => 'blogprise_is_trending_posts_enabled',
		'priority'        => 170,
	)
);

// Show Trending Post author image.
$wp_customize->add_setting(
	'enable_trending_posts_author_image',
	array(
		'default'           => $theme_options_defaults['enable_trending_posts_author_image'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_trending_posts_author_image',
		array(
			'label'           => __( 'Show Author Image', 'blogprise' ),
			'description'     => __( 'Make sure to enable Author post meta from above for this to work.', 'blogprise' ),
			'section'         => 'home_page_trending_posts_options',
			'active_callback' => 'blogprise_is_trending_posts_enabled',
			'priority'        => 180,
		)
	)
);

// Trending Post Title Limit.
$wp_customize->add_setting(
	'trending_posts_title_limit',
	array(
		'default'           => '',
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'trending_posts_title_limit',
	array(
		'label'           => __( 'Post Title Limit', 'blogprise' ),
		'section'         => 'home_page_trending_posts_options',
		'type'            => 'select',
		'choices'         => blogprise_get_title_limit_choices(),
		'active_callback' => 'blogprise_is_trending_posts_enabled',
		'priority'        => 190,
	)
);

// Show Post thumbnail
$wp_customize->add_setting(
	'show_trending_posts_thumbnail',
	array(
		'default'           => $theme_options_defaults['show_trending_posts_thumbnail'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'show_trending_posts_thumbnail',
		array(
			'label'           => __( 'Show Post Thumbnail', 'blogprise' ),
			'section'         => 'home_page_trending_posts_options',
			'active_callback' => 'blogprise_is_trending_posts_enabled',
			'priority'        => 200,
		)
	)
);

// Invert Post Listing
$wp_customize->add_setting(
	'invert_trending_posts_display',
	array(
		'default'           => $theme_options_defaults['invert_trending_posts_display'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'invert_trending_posts_display',
		array(
			'label'           => __( 'Invert Post Display', 'blogprise' ),
			'section'         => 'home_page_trending_posts_options',
			'active_callback' => 'blogprise_is_trending_posts_enabled',
			'priority'        => 210,
		)
	)
);

// Show Post Format Icons.
$wp_customize->add_setting(
	'show_trending_posts_post_format_icon',
	array(
		'default'           => $theme_options_defaults['show_trending_posts_post_format_icon'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'show_trending_posts_post_format_icon',
		array(
			'label'           => __( 'Show Post Format Icon', 'blogprise' ),
			'section'         => 'home_page_trending_posts_options',
			'active_callback' => 'blogprise_is_trending_posts_enabled',
			'priority'        => 220,
		)
	)
);

// Enable  Autoplay.
$wp_customize->add_setting(
	'enable_trending_posts_autoplay',
	array(
		'default'           => $theme_options_defaults['enable_trending_posts_autoplay'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_trending_posts_autoplay',
		array(
			'label'           => __( 'Enable Autoplay', 'blogprise' ),
			'section'         => 'home_page_trending_posts_options',
			'active_callback' => 'blogprise_is_trending_posts_enabled',
			'priority'        => 230,
		)
	)
);

// Enable  Arrows.
$wp_customize->add_setting(
	'enable_trending_posts_arrows',
	array(
		'default'           => $theme_options_defaults['enable_trending_posts_arrows'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_trending_posts_arrows',
		array(
			'label'           => __( 'Enable Arrows', 'blogprise' ),
			'section'         => 'home_page_trending_posts_options',
			'active_callback' => 'blogprise_is_trending_posts_enabled',
			'priority'        => 240,
		)
	)
);

// Enable Dots.
$wp_customize->add_setting(
	'enable_trending_posts_dots',
	array(
		'default'           => $theme_options_defaults['enable_trending_posts_dots'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_trending_posts_dots',
		array(
			'label'           => __( 'Enable Dots', 'blogprise' ),
			'section'         => 'home_page_trending_posts_options',
			'active_callback' => 'blogprise_is_trending_posts_enabled',
			'priority'        => 250,
		)
	)
);

// Trending Post Display Style.
$wp_customize->add_setting(
	'trending_posts_style',
	array(
		'default'           => $theme_options_defaults['trending_posts_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'trending_posts_style',
	array(
		'label'           => __( 'Trending Post Display Style', 'blogprise' ),
		'section'         => 'home_page_trending_posts_options',
		'type'            => 'select',
		'choices'         => array(
			'style_1' => __( 'Style 1', 'blogprise' ),
			'style_2' => __( 'Style 2', 'blogprise' ),
		),
		'active_callback' => 'blogprise_is_trending_posts_enabled',
		'priority'        => 260,
	)
);

// Post counter.
$wp_customize->add_setting(
	'trending_posts_counter',
	array(
		'default'           => $theme_options_defaults['trending_posts_counter'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'trending_posts_counter',
	array(
		'label'           => __( 'Trending Post Counter', 'blogprise' ),
		'section'         => 'home_page_trending_posts_options',
		'type'            => 'select',
		'choices'         => array(
			''             => __( '&mdash; Select &mdash;', 'blogprise' ),
			'top_left'     => __( 'Top Left', 'blogprise' ),
			'top_right'    => __( 'Top Right', 'blogprise' ),
			'bottom_left'  => __( 'Bottom Left', 'blogprise' ),
			'bottom_right' => __( 'Bottom Right', 'blogprise' ),
		),
		'active_callback' => 'blogprise_is_trending_posts_enabled',
		'priority'        => 270,
	)
);