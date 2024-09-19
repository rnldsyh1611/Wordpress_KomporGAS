<?php

// Upsell.
$wp_customize->add_section(
	'theme_upsell',
	array(
		'title'    => esc_html__( 'Unlock More Features', 'blogprise' ),
		'priority' => 1,
	)
);
$wp_customize->add_setting(
	'theme_pro_features',
	array(
		'sanitize_callback' => '__return_true',
	)
);
$wp_customize->add_control(
	new Blogprise_Upsell(
		$wp_customize,
		'theme_pro_features',
		array(
			'section' => 'theme_upsell',
			'type'    => 'upsell',
		)
	)
);

// General Options.
$wp_customize->add_section(
	new Blogprise_Section_Features_List(
		$wp_customize,
		'theme_general_features',
		array(
			'title'         => esc_html__( 'More Options on Blogprise Pro!', 'blogprise' ),
			'features_list' => array(
				esc_html__( 'Dark mode options', 'blogprise' ),
				esc_html__( 'Menu badge options', 'blogprise' ),
				esc_html__( '20+ Preloader options', 'blogprise' ),
				esc_html__( 'More color options', 'blogprise' ),
				esc_html__( '404 page options', 'blogprise' ),
				esc_html__( '... and many other premium features', 'blogprise' ),
			),
			'panel'         => 'general_options_panel',
			'priority'      => 999,
		)
	)
);

// Header Options.
$wp_customize->add_section(
	new Blogprise_Section_Features_List(
		$wp_customize,
		'theme_header_features',
		array(
			'title'         => esc_html__( 'More Options on Blogprise Pro!', 'blogprise' ),
			'features_list' => array(
				esc_html__( 'More topbar options', 'blogprise' ),
				esc_html__( '5+ header styles', 'blogprise' ),
				esc_html__( 'Header margin & padding controls', 'blogprise' ),
				esc_html__( 'Dark mode options', 'blogprise' ),
				esc_html__( 'More color options', 'blogprise' ),
				esc_html__( '... and many other premium features', 'blogprise' ),
			),
			'panel'         => 'header_options_panel',
			'priority'      => 999,
		)
	)
);

// Footer Options.
$wp_customize->add_section(
	new Blogprise_Section_Features_List(
		$wp_customize,
		'theme_footer_features',
		array(
			'title'         => esc_html__( 'More Options on Blogprise Pro!', 'blogprise' ),
			'features_list' => array(
				esc_html__( '13+ footer layouts', 'blogprise' ),
				esc_html__( '40+ footer shape dividers', 'blogprise' ),
				esc_html__( 'Footer margin & padding controls', 'blogprise' ),
				esc_html__( 'More sub footer styles', 'blogprise' ),
				esc_html__( '40+ sub footer shape dividers', 'blogprise' ),
				esc_html__( 'Sub footer margin & padding controls', 'blogprise' ),
				esc_html__( '9+ scroll to top icons', 'blogprise' ),
				esc_html__( 'More scroll to top options', 'blogprise' ),
				esc_html__( 'Dark mode options', 'blogprise' ),
				esc_html__( 'More color options', 'blogprise' ),
				esc_html__( '... and many other premium features', 'blogprise' ),
			),
			'panel'         => 'footer_options_panel',
			'priority'      => 999,
		)
	)
);

// Front Page.
$wp_customize->add_section(
	new Blogprise_Section_Features_List(
		$wp_customize,
		'theme_widget_features_home',
		array(
			'title'             => esc_html__( 'Over 16+ Widgets', 'blogprise' ),
			'description'       => sprintf( __( 'Along with the above sections, this theme comes with wide range of widgets that you can combine in any number and sequences and place in over 10+ widgetareas to build your unique website. <br/> <br/> Go to <a href="%s" target="_blank">widgets</a>.', 'blogprise' ), esc_url( admin_url( 'widgets.php' ) ) ),
			'features_list'     => array(
				esc_html__( 'Ads Code', 'blogprise' ),
				esc_html__( 'Adress Info ( 2+ Styles )', 'blogprise' ),
				esc_html__( 'Author Info ( 3+ Styles )', 'blogprise' ),
				esc_html__( 'Call To Action ( 4+ Styles )', 'blogprise' ),
				esc_html__( 'Grid Posts ( Upto 5 Columns )', 'blogprise' ),
				esc_html__( 'Heading ( 10+ Styles )', 'blogprise' ),
				esc_html__( 'List Posts ( 11+ Styles )', 'blogprise' ),
				esc_html__( 'Mailchimp/Newsletter ( 3+ Styles )', 'blogprise' ),
				esc_html__( 'Popular Posts ( 2+ Styles )', 'blogprise' ),
				esc_html__( 'Categories Grid ( 4+ Styles )', 'blogprise' ),
				esc_html__( 'Posts Overlay Grid ( 7+ Styles )', 'blogprise' ),
				esc_html__( 'Posts slider ( 2+ Styles )', 'blogprise' ),
				esc_html__( 'Posts Carousel ( 2+ Styles )', 'blogprise' ),
				esc_html__( 'Single Column Posts', 'blogprise' ),
				esc_html__( 'Tab Posts ( 3+ Styles )', 'blogprise' ),
				esc_html__( 'Social Menu ( 4+ Styles )', 'blogprise' ),
			),
			'is_upsell_feature' => false,
			'panel'             => 'theme_home_option_panel',
			'priority'          => 999,
		)
	)
);

$wp_customize->add_section(
	new Blogprise_Section_Features_List(
		$wp_customize,
		'theme_home_features',
		array(
			'title'         => esc_html__( 'More Options on Blogprise Pro!', 'blogprise' ),
			'features_list' => array(
				esc_html__( '4+ home slider style', 'blogprise' ),
				esc_html__( '4+ home carousel style', 'blogprise' ),
				esc_html__( '2+ slider thumbnail style', 'blogprise' ),
				esc_html__( '5+ ticker styles', 'blogprise' ),
				esc_html__( 'More settings for home sections', 'blogprise' ),
				esc_html__( '6+ extra widgets', 'blogprise' ),
				esc_html__( 'Dark mode options', 'blogprise' ),
				esc_html__( '... and many other premium features', 'blogprise' ),
			),
			'panel'             => 'theme_home_option_panel',
			'priority'          => 999,
		)
	)
);

// Typography Options.
$wp_customize->add_section(
	new Blogprise_Section_Features_List(
		$wp_customize,
		'theme_typography_features',
		array(
			'title'         => esc_html__( 'More Options on Blogprise Pro!', 'blogprise' ),
			'features_list' => array(
				esc_html__( 'Line heights', 'blogprise' ),
				esc_html__( 'Letter spacings', 'blogprise' ),
				esc_html__( 'Menu font sizes', 'blogprise' ),
				esc_html__( '(H1-H6) font sizes', 'blogprise' ),
				esc_html__( 'Body font sizes', 'blogprise' ),
				esc_html__( '... and many other premium features', 'blogprise' ),
			),
			'panel'         => 'typography_options_panel',
			'priority'      => 999,
		)
	)
);

// Archive Options.
$wp_customize->add_section(
	new Blogprise_Section_Features_List(
		$wp_customize,
		'theme_archive_features',
		array(
			'title'         => esc_html__( 'More Options on Blogprise Pro!', 'blogprise' ),
			'features_list' => array(
				esc_html__( '9+ archive styles', 'blogprise' ),
				esc_html__( 'Read time options', 'blogprise' ),
				esc_html__( 'More category styles', 'blogprise' ),
				esc_html__( 'More read more styles', 'blogprise' ),
				esc_html__( '... and many other premium features', 'blogprise' ),
			),
			'panel'         => 'blog_options_panel',
			'priority'      => 999,
		)
	)
);

// Single Options.
$wp_customize->add_section(
	new Blogprise_Section_Features_List(
		$wp_customize,
		'theme_single_features',
		array(
			'title'         => esc_html__( 'More Options on Blogprise Pro!', 'blogprise' ),
			'features_list' => array(
				esc_html__( '6+ single styles', 'blogprise' ),
				esc_html__( '5+ post navigation styles', 'blogprise' ),
				esc_html__( 'Floating related posts', 'blogprise' ),
				esc_html__( 'Extended gallery formats', 'blogprise' ),
				esc_html__( 'Extended audio formats', 'blogprise' ),
				esc_html__( 'Extended video formats', 'blogprise' ),
				esc_html__( 'Author box social links', 'blogprise' ),
				esc_html__( 'Post subtitle options', 'blogprise' ),
				esc_html__( 'Social share options', 'blogprise' ),
				esc_html__( '8+ custom social share positions', 'blogprise' ),
				esc_html__( '... and many other premium features', 'blogprise' ),
			),
			'panel'         => 'single_posts_options_panel',
			'priority'      => 999,
		)
	)
);

// Widgetare Options.
$wp_customize->add_section(
	new Blogprise_Section_Features_List(
		$wp_customize,
		'theme_widgetarea_features',
		array(
			'title'         => esc_html__( 'More Options on Blogprise Pro!', 'blogprise' ),
			'features_list' => array(
				esc_html__( '40+ widgetareas shape dividers', 'blogprise' ),
				esc_html__( '20+ widgetareas title styles', 'blogprise' ),
				esc_html__( 'Widgetareas margin & padding', 'blogprise' ),
				esc_html__( 'Widgetareas visibilty options', 'blogprise' ),
				esc_html__( 'Dark mode options', 'blogprise' ),
				esc_html__( 'More color options', 'blogprise' ),
				esc_html__( '... and many other premium features', 'blogprise' ),
			),
			'panel'         => 'widgetareas_options_panel',
			'priority'      => 999,
		)
	)
);
