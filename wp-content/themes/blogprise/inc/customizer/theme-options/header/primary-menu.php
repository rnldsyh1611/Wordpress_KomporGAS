<?php

// Primary Menu Options.
$wp_customize->add_section(
	'primary_menu_options',
	array(
		'title' => __( 'Primary Menu Bar Options', 'blogprise' ),
		'panel' => 'header_options_panel',
	)
);

// Primary menu Background color.
$wp_customize->add_setting(
	'primary_menu_bg_color',
	array(
		'default'           => $theme_options_defaults['primary_menu_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'primary_menu_bg_color',
		array(
			'label'    => __( 'Primary Menu Background Color', 'blogprise' ),
			'section'  => 'primary_menu_options',
			'type'     => 'color',
			'priority' => 11,
		)
	)
);

// Offcanvas icon color.
$wp_customize->add_setting(
	'offcanvas_icon_color',
	array(
		'default'           => $theme_options_defaults['offcanvas_icon_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'offcanvas_icon_color',
		array(
			'label'    => __( 'Offcanvas Icon Color', 'blogprise' ),
			'section'  => 'primary_menu_options',
			'type'     => 'color',
			'priority' => 20,
		)
	)
);

/*Center align Menu*/
$wp_customize->add_setting(
	'center_align_primary_nav',
	array(
		'default'           => $theme_options_defaults['center_align_primary_nav'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'center_align_primary_nav',
		array(
			'label'    => __( 'Center Align Menu', 'blogprise' ),
			'section'  => 'primary_menu_options',
			'priority' => 30,
		)
	)
);

/*Enable Different Menu Bar Logo*/
$wp_customize->add_setting(
	'enable_different_logo_menu_bar',
	array(
		'default'           => $theme_options_defaults['enable_different_logo_menu_bar'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_different_logo_menu_bar',
		array(
			'label'           => __( 'Different Logo Menu Bar', 'blogprise' ),
			'section'         => 'primary_menu_options',
			'active_callback' => 'blogprise_is_menu_bar_logo_available',
			'priority'        => 40,
		)
	)
);

/*Menu Bar Logo*/
$wp_customize->add_setting(
	'logo_menu_bar',
	array(
		'default'           => $theme_options_defaults['logo_menu_bar'],
		'sanitize_callback' => 'blogprise_sanitize_image',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'logo_menu_bar',
		array(
			'label'           => __( 'Menu Bar Logo', 'blogprise' ),
			'description'     => __( 'Use images with 16:9 aspect ratio for best results', 'blogprise' ),
			'section'         => 'primary_menu_options',
			'active_callback' => function ( $control ) {
				return (
					blogprise_is_menu_bar_logo_available( $control )
					&&
					blogprise_is_menu_bar_logo_enabled( $control )
				);
			},
			'priority'        => 50,
		)
	)
);

/*Enable Menu Bar Social Nav*/
$wp_customize->add_setting(
	'show_menu_bar_social_nav',
	array(
		'default'           => $theme_options_defaults['show_menu_bar_social_nav'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'show_menu_bar_social_nav',
		array(
			'label'       => __( 'Enable Menu Bar Social Nav Menu', 'blogprise' ),
			'description' => sprintf( __( 'You can add/edit social nav menu from <a href="%s">here</a>.', 'blogprise' ), "javascript:wp.customize.control( 'nav_menu_locations[social-menu]' ).focus();" ),
			'section'     => 'primary_menu_options',
			'priority'    => 60,
		)
	)
);

/*Enable random post*/
$wp_customize->add_setting(
	'enable_random_post_menu_bar',
	array(
		'default'           => $theme_options_defaults['enable_random_post_menu_bar'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_random_post_menu_bar',
		array(
			'label'           => __( 'Enable Random Post Icon', 'blogprise' ),
			'section'         => 'primary_menu_options',
			'priority'        => 65,
		)
	)
);

/*Enable Search*/
$wp_customize->add_setting(
	'enable_search_on_menu_bar',
	array(
		'default'           => $theme_options_defaults['enable_search_on_menu_bar'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_search_on_menu_bar',
		array(
			'label'    => __( 'Enable Search Icon', 'blogprise' ),
			'section'  => 'primary_menu_options',
			'priority' => 70,
		)
	)
);

$wp_customize->add_setting(
	'enable_menu_bar_btn_one',
	array(
		'default'           => $theme_options_defaults['enable_menu_bar_btn_one'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_menu_bar_btn_one',
		array(
			'label'           => __( 'Enable Menu Bar Button', 'blogprise' ),
			'description'     => sprintf( __( 'You can edit button details from <a href="%s">here</a>.', 'blogprise' ), "javascript:wp.customize.section( 'header_button_one_options' ).focus();" ),
			'section'         => 'primary_menu_options',
			'priority'        => 75,
		)
	)
);

if ( blogprise_is_wc_active() ) {

	/*Enable Mini Cart Icon on header*/
	$wp_customize->add_setting(
		'enable_woo_mini_cart_menu_bar',
		array(
			'default'           => $theme_options_defaults['enable_woo_mini_cart_menu_bar'],
			'sanitize_callback' => 'blogprise_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		new Blogprise_Toggle_Control(
			$wp_customize,
			'enable_woo_mini_cart_menu_bar',
			array(
				'label'    => __( 'Enable Mini Cart Icon', 'blogprise' ),
				'section'  => 'primary_menu_options',
				'priority' => 80,
			)
		)
	);

	/*Enable Myaccount Link*/
	$wp_customize->add_setting(
		'enable_woo_my_account_menu_bar',
		array(
			'default'           => $theme_options_defaults['enable_woo_my_account_menu_bar'],
			'sanitize_callback' => 'blogprise_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		new Blogprise_Toggle_Control(
			$wp_customize,
			'enable_woo_my_account_menu_bar',
			array(
				'label'    => __( 'Enable My Account Icon', 'blogprise' ),
				'section'  => 'primary_menu_options',
				'priority' => 90,
			)
		)
	);

}

// Primary menu text color.
$wp_customize->add_setting(
	'primary_menu_text_color',
	array(
		'default'           => $theme_options_defaults['primary_menu_text_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'primary_menu_text_color',
		array(
			'label'    => __( 'Primary Menu Text Color', 'blogprise' ),
			'section'  => 'primary_menu_options',
			'type'     => 'color',
			'priority' => 100,
		)
	)
);

// Primary menu text hover color.
$wp_customize->add_setting(
	'primary_menu_text_hover_color',
	array(
		'default'           => $theme_options_defaults['primary_menu_text_hover_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'primary_menu_text_hover_color',
		array(
			'label'    => __( 'Primary Menu Text Hover Color', 'blogprise' ),
			'section'  => 'primary_menu_options',
			'type'     => 'color',
			'priority' => 110,
		)
	)
);

// Primary menu text hover Border color.
$wp_customize->add_setting(
	'primary_menu_text_hover_border',
	array(
		'default'           => $theme_options_defaults['primary_menu_text_hover_border'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'primary_menu_text_hover_border',
		array(
			'label'    => __( 'Primary Menu Text Hover Border Color', 'blogprise' ),
			'section'  => 'primary_menu_options',
			'type'     => 'color',
			'priority' => 120,
		)
	)
);

// Primary menu active item color.
$wp_customize->add_setting(
	'primary_menu_active_item_color',
	array(
		'default'           => $theme_options_defaults['primary_menu_active_item_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'primary_menu_active_item_color',
		array(
			'label'    => __( 'Primary Menu Active Item Color', 'blogprise' ),
			'section'  => 'primary_menu_options',
			'type'     => 'color',
			'priority' => 130,
		)
	)
);

// Primary menu active item border color.
$wp_customize->add_setting(
	'primary_menu_active_item_border',
	array(
		'default'           => $theme_options_defaults['primary_menu_active_item_border'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'primary_menu_active_item_border',
		array(
			'label'    => __( 'Primary Menu Active Item Border Color', 'blogprise' ),
			'section'  => 'primary_menu_options',
			'type'     => 'color',
			'priority' => 140,
		)
	)
);

// Primary menu desc color.
$wp_customize->add_setting(
	'primary_menu_desc_color',
	array(
		'default'           => $theme_options_defaults['primary_menu_desc_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'primary_menu_desc_color',
		array(
			'label'    => __( 'Primary Menu Description Color', 'blogprise' ),
			'section'  => 'primary_menu_options',
			'type'     => 'color',
			'priority' => 150,
		)
	)
);

// Capitalzie primary menu text.
$wp_customize->add_setting(
	'capitalize_primary_nav_text',
	array(
		'default'           => $theme_options_defaults['capitalize_primary_nav_text'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'capitalize_primary_nav_text',
		array(
			'label'    => __( 'Capitalize Primary Menu Text', 'blogprise' ),
			'section'  => 'primary_menu_options',
			'priority' => 160,
		)
	)
);

// Sub menu style.
$wp_customize->add_setting(
	'sub_menu_style',
	array(
		'default'           => $theme_options_defaults['sub_menu_style'],
		'sanitize_callback' => 'blogprise_sanitize_select',
	)
);
$wp_customize->add_control(
	'sub_menu_style',
	array(
		'label'    => __( 'Sub Menu Style', 'blogprise' ),
		'section'  => 'primary_menu_options',
		'type'     => 'select',
		'choices'  => blogprise_get_submenu_styles_arr(),
		'priority' => 169,
	)
);

// Sub menu background color.
$wp_customize->add_setting(
	'sub_menu_bg_color',
	array(
		'default'           => $theme_options_defaults['sub_menu_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'sub_menu_bg_color',
		array(
			'label'    => __( 'Sub Menu Background Color', 'blogprise' ),
			'section'  => 'primary_menu_options',
			'type'     => 'color',
			'priority' => 170,
		)
	)
);

// Sub menu text color.
$wp_customize->add_setting(
	'sub_menu_text_color',
	array(
		'default'           => $theme_options_defaults['sub_menu_text_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'sub_menu_text_color',
		array(
			'label'    => __( 'Sub Menu Text Color', 'blogprise' ),
			'section'  => 'primary_menu_options',
			'type'     => 'color',
			'priority' => 180,
		)
	)
);

// Sub menu text hover color.
$wp_customize->add_setting(
	'sub_menu_text_hover_color',
	array(
		'default'           => $theme_options_defaults['sub_menu_text_hover_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'sub_menu_text_hover_color',
		array(
			'label'    => __( 'Sub Menu Text Hover Color', 'blogprise' ),
			'section'  => 'primary_menu_options',
			'type'     => 'color',
			'priority' => 190,
		)
	)
);

// Sub menu desc color.
$wp_customize->add_setting(
	'sub_menu_desc_color',
	array(
		'default'           => $theme_options_defaults['sub_menu_desc_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'sub_menu_desc_color',
		array(
			'label'    => __( 'Sub Menu Description Color', 'blogprise' ),
			'section'  => 'primary_menu_options',
			'type'     => 'color',
			'priority' => 200,
		)
	)
);

// Capitalzie sub menu text.
$wp_customize->add_setting(
	'capitalize_sub_nav_text',
	array(
		'default'           => $theme_options_defaults['capitalize_sub_nav_text'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'capitalize_sub_nav_text',
		array(
			'label'    => __( 'Capitalize Sub Menu Text', 'blogprise' ),
			'section'  => 'primary_menu_options',
			'priority' => 210,
		)
	)
);

/*Enable Border Top*/
$wp_customize->add_setting(
	'enable_top_border_menu_bar',
	array(
		'default'           => $theme_options_defaults['enable_top_border_menu_bar'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_top_border_menu_bar',
		array(
			'label'    => __( 'Enable Top Border', 'blogprise' ),
			'section'  => 'primary_menu_options',
			'priority' => 220,
		)
	)
);

/*Enable Border Bottom*/
$wp_customize->add_setting(
	'enable_bottom_border_menu_bar',
	array(
		'default'           => $theme_options_defaults['enable_bottom_border_menu_bar'],
		'sanitize_callback' => 'blogprise_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Blogprise_Toggle_Control(
		$wp_customize,
		'enable_bottom_border_menu_bar',
		array(
			'label'    => __( 'Enable Bottom Border', 'blogprise' ),
			'section'  => 'primary_menu_options',
			'priority' => 230,
		)
	)
);
