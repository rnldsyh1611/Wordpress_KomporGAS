<?php
// Add Home Page Banner Section.
$wp_customize->add_section(
	'home_banner_options',
	array(
		'title' => __( 'Banner Options', 'blogprise' ),
		'panel' => 'theme_home_option_panel',
	)
);

// Enable Banner Section.
$wp_customize->add_setting(
	'enable_banner',
	array(
		'default'           => $theme_options_defaults['enable_banner'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_banner',
		array(
			'label'    => __( 'Enable Home Banner', 'blogprise' ),
			'section'  => 'home_banner_options',
			'priority' => 10,
		)
	)
);

// Banner section background.
$wp_customize->add_setting(
	'banner_section_bg_color',
	array(
		'default'           => $theme_options_defaults['banner_section_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'banner_section_bg_color',
		array(
			'label'           => __( 'Banner Section Background', 'blogprise' ),
			'section'         => 'home_banner_options',
			'type'            => 'color',
			'active_callback' => 'blogprise_is_home_banner_enabled',
			'priority'        => 20,
		)
	)
);

// Banner Title.
$wp_customize->add_setting(
	'banner_title',
	array(
		'default'           => $theme_options_defaults['banner_title'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'banner_title',
	array(
		'label'           => __( 'Banner Title', 'blogprise' ),
		'description'     => __( 'Leave empty if you don\'t want to show the title.', 'blogprise' ),
		'section'         => 'home_banner_options',
		'type'            => 'text',
		'active_callback' => 'blogprise_is_home_banner_enabled',
		'priority'        => 30,
	)
);

// Banner Title Style.
$wp_customize->add_setting(
	'banner_title_style',
	array(
		'default'           => $theme_options_defaults['banner_title_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'banner_title_style',
	array(
		'label'           => __( 'Banner Title Style', 'blogprise' ),
		'section'         => 'home_banner_options',
		'type'            => 'select',
		'choices'         => blogprise_get_title_styles(),
		'active_callback' => 'blogprise_is_home_banner_enabled',
		'priority'        => 40,
	)
);

// Banner Title Align.
$wp_customize->add_setting(
	'banner_title_align',
	array(
		'default'           => $theme_options_defaults['banner_title_align'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'banner_title_align',
	array(
		'label'           => __( 'Banner Title Alignment', 'blogprise' ),
		'section'         => 'home_banner_options',
		'type'            => 'select',
		'choices'         => blogprise_get_title_alignments(),
		'active_callback' => 'blogprise_is_home_banner_enabled',
		'priority'        => 50,
	)
);

// Banner Layout.
$wp_customize->add_setting(
	'banner_layout',
	array(
		'default'           => $theme_options_defaults['banner_layout'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'banner_layout',
	array(
		'label'           => __( 'Banner Layout', 'blogprise' ),
		'description'     => __( 'If you want to show pinned posts on the side, use "Boxed" layout in here.', 'blogprise' ),
		'section'         => 'home_banner_options',
		'type'            => 'select',
		'choices'         => array(
			'full-width' => __( 'FullWidth', 'blogprise' ),
			'boxed'      => __( 'Boxed', 'blogprise' ),
		),
		'active_callback' => 'blogprise_is_home_banner_enabled',
		'priority'        => 60,
	)
);

// Banner Display as slider/carousel.
$wp_customize->add_setting(
	'banner_display_as',
	array(
		'default'           => $theme_options_defaults['banner_display_as'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'banner_display_as',
	array(
		'label'           => __( 'Banner Display As', 'blogprise' ),
		'section'         => 'home_banner_options',
		'type'            => 'select',
		'choices'         => array(
			'slider'   => __( 'Slider', 'blogprise' ),
			'carousel' => __( 'Carousel', 'blogprise' ),
		),
		'active_callback' => 'blogprise_is_home_banner_enabled',
		'priority'        => 70,
	)
);

// Banner Carousel gap.
$wp_customize->add_setting(
	'banner_carousel_item_gap',
	array(
		'default'           => $theme_options_defaults['banner_carousel_item_gap'],
		'sanitize_callback' => 'blogprise_sanitize_float',
	)
);
$wp_customize->add_control(
	'banner_carousel_item_gap',
	array(
		'label'           => __( 'Carousel Item Gap', 'blogprise' ),
		'section'         => 'home_banner_options',
		'type'            => 'number',
		'input_attrs'     => array(
			'min'   => 0,
			'max'   => 100,
			'step'  => 1,
			'style' => 'width: 150px;',
		),
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_home_banner_enabled( $control )
				&&
				blogprise_is_home_banner_as_carousel( $control )
			);
		},
		'priority'        => 80,
	)
);

// Banner Content from ids or category.
$wp_customize->add_setting(
	'banner_content_from',
	array(
		'default'           => $theme_options_defaults['banner_content_from'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'banner_content_from',
	array(
		'label'           => __( 'Get Banner Content From', 'blogprise' ),
		'section'         => 'home_banner_options',
		'type'            => 'select',
		'choices'         => array(
			'category' => __( 'Category', 'blogprise' ),
			'post_ids' => __( 'Post ID\'s', 'blogprise' ),
		),
		'active_callback' => 'blogprise_is_home_banner_enabled',
		'priority'        => 90,
	)
);

// Banner Post Category.
$wp_customize->add_setting(
	'banner_cat',
	array(
		'default'           => $theme_options_defaults['banner_cat'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Blogprise_Dropdown_Taxonomies_Control(
		$wp_customize,
		'banner_cat',
		array(
			'label'           => __( 'Choose Category', 'blogprise' ),
			'description'     => __( 'Leave Empty if you don\'t want the posts to be category specific', 'blogprise' ),
			'section'         => 'home_banner_options',
			'active_callback' => function ( $control ) {
				return (
					blogprise_is_home_banner_enabled( $control )
					&&
					blogprise_banner_content_from_category( $control )
				);
			},
			'priority'        => 100,
		)
	)
);

// No of posts.
$wp_customize->add_setting(
	'no_of_banner_posts',
	array(
		'default'           => $theme_options_defaults['no_of_banner_posts'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'no_of_banner_posts',
	array(
		'label'           => __( 'Number of Posts', 'blogprise' ),
		'section'         => 'home_banner_options',
		'type'            => 'number',
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_home_banner_enabled( $control )
				&&
				blogprise_banner_content_from_category( $control )
			);
		},
		'priority'        => 110,
	)
);

// Posts Orderby.
$wp_customize->add_setting(
	'banner_posts_orderby',
	array(
		'default'           => $theme_options_defaults['banner_posts_orderby'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'banner_posts_orderby',
	array(
		'label'           => __( 'Orderby', 'blogprise' ),
		'section'         => 'home_banner_options',
		'type'            => 'select',
		'choices'         => array(
			'date'  => __( 'Date', 'blogprise' ),
			'id'    => __( 'ID', 'blogprise' ),
			'title' => __( 'Title', 'blogprise' ),
			'rand'  => __( 'Random', 'blogprise' ),
		),
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_home_banner_enabled( $control )
				&&
				blogprise_banner_content_from_category( $control )
			);
		},
		'priority'        => 120,
	)
);

// Posts Order.
$wp_customize->add_setting(
	'banner_posts_order',
	array(
		'default'           => $theme_options_defaults['banner_posts_order'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'banner_posts_order',
	array(
		'label'           => __( 'Order', 'blogprise' ),
		'section'         => 'home_banner_options',
		'type'            => 'select',
		'choices'         => array(
			'asc'  => __( 'ASC', 'blogprise' ),
			'desc' => __( 'DESC', 'blogprise' ),
		),
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_home_banner_enabled( $control )
				&&
				blogprise_banner_content_from_category( $control )
			);
		},
		'priority'        => 130,
	)
);

// Banner Post IDs.
$wp_customize->add_setting(
	'banner_post_ids',
	array(
		'default'           => $theme_options_defaults['banner_post_ids'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'banner_post_ids',
	array(
		'label'           => __( 'Post ID\'s', 'blogprise' ),
		'description'     => __( 'Comma ( , ) separated posts ids. Ex: 1, 2, 3', 'blogprise' ),
		'section'         => 'home_banner_options',
		'type'            => 'text',
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_home_banner_enabled( $control )
				&&
				blogprise_banner_content_from_post_ids( $control )
			);
		},
		'priority'        => 140,
	)
);

// Enable Banner Autoplay.
$wp_customize->add_setting(
	'enable_banner_autoplay',
	array(
		'default'           => $theme_options_defaults['enable_banner_autoplay'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_banner_autoplay',
		array(
			'label'           => __( 'Enable Banner Autoplay', 'blogprise' ),
			'section'         => 'home_banner_options',
			'active_callback' => 'blogprise_is_home_banner_enabled',
			'priority'        => 150,
		)
	)
);

// Autoplay speed.
$wp_customize->add_setting(
	'banner_autoplay_speed',
	array(
		'default'           => $theme_options_defaults['banner_autoplay_speed'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'banner_autoplay_speed',
	array(
		'label'           => __( 'Autoplay Speed', 'blogprise' ),
		'description'     => __( 'In milliseconds', 'blogprise' ),
		'section'         => 'home_banner_options',
		'type'            => 'number',
		'active_callback' => 'blogprise_is_home_banner_enabled',
		'priority'        => 151,
	)
);

// Enable Banner Arrows.
$wp_customize->add_setting(
	'enable_banner_arrows',
	array(
		'default'           => $theme_options_defaults['enable_banner_arrows'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_banner_arrows',
		array(
			'label'           => __( 'Enable Banner Arrows', 'blogprise' ),
			'section'         => 'home_banner_options',
			'active_callback' => 'blogprise_is_home_banner_enabled',
			'priority'        => 160,
		)
	)
);

// Banner Arrows background.
$wp_customize->add_setting(
	'banner_arrows_bg_color',
	array(
		'default'           => $theme_options_defaults['banner_arrows_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'banner_arrows_bg_color',
		array(
			'label'           => __( 'Banner Arrows Background', 'blogprise' ),
			'section'         => 'home_banner_options',
			'type'            => 'color',
			'active_callback' => function ( $control ) {
				return (
					blogprise_is_home_banner_enabled( $control )
					&&
					blogprise_is_home_banner_arrows_enabled( $control )
				);
			},
			'priority'        => 170,
		)
	)
);

// Enable Banner Dots.
$wp_customize->add_setting(
	'enable_banner_dots',
	array(
		'default'           => $theme_options_defaults['enable_banner_dots'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_banner_dots',
		array(
			'label'           => __( 'Enable Banner Dots', 'blogprise' ),
			'section'         => 'home_banner_options',
			'active_callback' => 'blogprise_is_home_banner_enabled',
			'priority'        => 180,
		)
	)
);

// Enable Banner Overlay.
$wp_customize->add_setting(
	'enable_banner_overlay',
	array(
		'default'           => $theme_options_defaults['enable_banner_overlay'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_banner_overlay',
		array(
			'label'           => __( 'Show Banner Overlay', 'blogprise' ),
			'section'         => 'home_banner_options',
			'active_callback' => 'blogprise_is_home_banner_enabled',
			'priority'        => 190,
		)
	)
);

// Banner overlay color.
$wp_customize->add_setting(
	'banner_overlay_color',
	array(
		'default'           => $theme_options_defaults['banner_overlay_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'banner_overlay_color',
		array(
			'label'           => __( 'Overlay Color', 'blogprise' ),
			'section'         => 'home_banner_options',
			'type'            => 'color',
			'active_callback' => function ( $control ) {
				return (
					blogprise_is_home_banner_enabled( $control )
					&&
					blogprise_is_banner_overlay_enabled( $control )
				);
			},
			'priority'        => 200,
		)
	)
);

// Banner Overlay Opacity.
$wp_customize->add_setting(
	'banner_overlay_opacity',
	array(
		'default'           => $theme_options_defaults['banner_overlay_opacity'],
		'sanitize_callback' => 'blogprise_sanitize_float',
	)
);
$wp_customize->add_control(
	'banner_overlay_opacity',
	array(
		'label'           => __( 'Overlay Opacity', 'blogprise' ),
		'section'         => 'home_banner_options',
		'type'            => 'number',
		'input_attrs'     => array(
			'min'   => 0,
			'max'   => 1,
			'step'  => 0.1,
			'style' => 'width: 150px;',
		),
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_home_banner_enabled( $control )
				&&
				blogprise_is_banner_overlay_enabled( $control )
			);
		},
		'priority'        => 210,
	)
);

// Show Banner Category.
$wp_customize->add_setting(
	'show_banner_category',
	array(
		'default'           => $theme_options_defaults['show_banner_category'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'show_banner_category',
		array(
			'label'           => __( 'Show Banner Category', 'blogprise' ),
			'section'         => 'home_banner_options',
			'active_callback' => 'blogprise_is_home_banner_enabled',
			'priority'        => 220,
		)
	)
);

// Banner Category Color Display.
$wp_customize->add_setting(
	'banner_category_color_display',
	array(
		'default'           => $theme_options_defaults['banner_category_color_display'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'banner_category_color_display',
	array(
		'label'           => __( 'Banner Category Color Display', 'blogprise' ),
		'section'         => 'home_banner_options',
		'type'            => 'select',
		'choices'         => blogprise_get_category_color_display(),
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_home_banner_enabled( $control )
				&&
				blogprise_is_banner_category_enabled( $control )
			);
		},
		'priority'        => 230,
	)
);

// Banner Category Style.
$wp_customize->add_setting(
	'banner_category_style',
	array(
		'default'           => $theme_options_defaults['banner_category_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'banner_category_style',
	array(
		'label'           => __( 'Banner Category Style', 'blogprise' ),
		'section'         => 'home_banner_options',
		'type'            => 'select',
		'choices'         => blogprise_get_category_styles(),
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_home_banner_enabled( $control )
				&&
				blogprise_is_banner_category_enabled( $control )
			);
		},
		'priority'        => 240,
	)
);

// No of Banner Categories.
$wp_customize->add_setting(
	'banner_category_limit',
	array(
		'default'           => $theme_options_defaults['banner_category_limit'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'banner_category_limit',
	array(
		'label'           => __( 'Number of Categories To Display', 'blogprise' ),
		'section'         => 'home_banner_options',
		'type'            => 'number',
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_home_banner_enabled( $control )
				&&
				blogprise_is_banner_category_enabled( $control )
			);
		},
		'priority'        => 250,
	)
);

/* Banner Posts Meta */
$wp_customize->add_setting(
	'banner_post_meta',
	array(
		'default'           => $theme_options_defaults['banner_post_meta'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox_multiple',
	)
);
$wp_customize->add_control(
	new Blogprise_Checkbox_Multiple(
		$wp_customize,
		'banner_post_meta',
		array(
			'label'           => __( 'Banner Post Meta', 'blogprise' ),
			'section'         => 'home_banner_options',
			'choices'         => array(
				'author'    => __( 'Author', 'blogprise' ),
				'read_time' => __( 'Post Read Time', 'blogprise' ),
				'date'      => __( 'Date', 'blogprise' ),
				'comment'   => __( 'Comment', 'blogprise' ),
			),
			'active_callback' => 'blogprise_is_home_banner_enabled',
			'priority'        => 260,
		)
	)
);

// Show Post Meta Icon.
$wp_customize->add_setting(
	'show_banner_post_meta_icon',
	array(
		'default'           => $theme_options_defaults['show_banner_post_meta_icon'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'show_banner_post_meta_icon',
		array(
			'label'           => __( 'Show Post Meta Icon', 'blogprise' ),
			'description'     => __( 'Some Icons may show up regardless to provide better info.', 'blogprise' ),
			'section'         => 'home_banner_options',
			'active_callback' => 'blogprise_is_home_banner_enabled',
			'priority'        => 270,
		)
	)
);

// Banner Date Format
$wp_customize->add_setting(
	'banner_posts_date_format',
	array(
		'default'           => $theme_options_defaults['banner_posts_date_format'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'banner_posts_date_format',
	array(
		'label'           => __( 'Date Format', 'blogprise' ),
		'description'     => __( 'Make sure to enable Date post meta from above for this to work.', 'blogprise' ),
		'section'         => 'home_banner_options',
		'type'            => 'select',
		'choices'         => array(
			'format_1' => __( 'Times Ago', 'blogprise' ),
			'format_2' => __( 'Default Format', 'blogprise' ),
		),
		'active_callback' => 'blogprise_is_home_banner_enabled',
		'priority'        => 280,
	)
);

// Show Banner author image.
$wp_customize->add_setting(
	'enable_banner_author_image',
	array(
		'default'           => $theme_options_defaults['enable_banner_author_image'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_banner_author_image',
		array(
			'label'           => __( 'Show Author Image', 'blogprise' ),
			'description'     => __( 'Make sure to enable Author post meta from above for this to work.', 'blogprise' ),
			'section'         => 'home_banner_options',
			'active_callback' => 'blogprise_is_home_banner_enabled',
			'priority'        => 290,
		)
	)
);

// Post Title Limit.
$wp_customize->add_setting(
	'banner_posts_title_limit',
	array(
		'default'           => '',
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'banner_posts_title_limit',
	array(
		'label'           => __( 'Post Title Limit', 'blogprise' ),
		'section'         => 'home_banner_options',
		'type'            => 'select',
		'choices'         => blogprise_get_title_limit_choices(),
		'active_callback' => 'blogprise_is_home_banner_enabled',
		'priority'        => 300,
	)
);

// Show Banner desc.
$wp_customize->add_setting(
	'enable_banner_desc',
	array(
		'default'           => $theme_options_defaults['enable_banner_desc'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_banner_desc',
		array(
			'label'           => __( 'Show Banner Description', 'blogprise' ),
			'section'         => 'home_banner_options',
			'active_callback' => 'blogprise_is_home_banner_enabled',
			'priority'        => 310,
		)
	)
);

// Banner desc length.
$wp_customize->add_setting(
	'banner_desc_length',
	array(
		'default'           => $theme_options_defaults['banner_desc_length'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'banner_desc_length',
	array(
		'label'           => __( 'Banner Description Length', 'blogprise' ),
		'section'         => 'home_banner_options',
		'type'            => 'number',
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_home_banner_enabled( $control )
				&&
				blogprise_is_banner_desc_enabled( $control )
			);
		},
		'priority'        => 320,
	)
);

// Show Banner read more.
$wp_customize->add_setting(
	'enable_banner_read_more_btn',
	array(
		'default'           => $theme_options_defaults['enable_banner_read_more_btn'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_banner_read_more_btn',
		array(
			'label'           => __( 'Show Banner Read More', 'blogprise' ),
			'section'         => 'home_banner_options',
			'active_callback' => 'blogprise_is_home_banner_enabled',
			'priority'        => 330,
		)
	)
);

// Read More Text.
$wp_customize->add_setting(
	'banner_read_more_btn_text',
	array(
		'default'           => $theme_options_defaults['banner_read_more_btn_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'banner_read_more_btn_text',
	array(
		'label'           => __( 'Banner Read More Text', 'blogprise' ),
		'description'     => __( 'Leave empty if you want to use the default text "Read more".', 'blogprise' ),
		'section'         => 'home_banner_options',
		'type'            => 'text',
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_home_banner_enabled( $control )
				&&
				blogprise_is_banner_read_more_enabled( $control )
			);
		},
		'priority'        => 340,
	)
);

// Read more stlye.
$wp_customize->add_setting(
	'banner_read_more_style',
	array(
		'default'           => $theme_options_defaults['banner_read_more_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'banner_read_more_style',
	array(
		'label'           => __( 'Read More Style', 'blogprise' ),
		'section'         => 'home_banner_options',
		'type'            => 'select',
		'choices'         => blogprise_get_read_more_styles(),
		'active_callback' => function ( $control ) {
			return (
				blogprise_is_home_banner_enabled( $control )
				&&
				blogprise_is_banner_read_more_enabled( $control )
			);
		},
		'priority'        => 350,
	)
);

// Read More Icon.
$wp_customize->add_setting(
	'banner_read_more_icon',
	array(
		'default'           => $theme_options_defaults['banner_read_more_icon'],
		'sanitize_callback' => 'blogprise_sanitize_radio',
	)
);
$wp_customize->add_control(
	new Blogprise_Radio_Image_Control(
		$wp_customize,
		'banner_read_more_icon',
		array(
			'label'           => __( 'Read More Icon', 'blogprise' ),
			'section'         => 'home_banner_options',
			'choices'         => blogprise_get_read_more_icons(),
			'active_callback' => function ( $control ) {
				return (
					blogprise_is_home_banner_enabled( $control )
					&&
					blogprise_is_banner_read_more_enabled( $control )
				);
			},
			'priority'        => 360,
		)
	)
);
