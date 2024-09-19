<?php
/**
 * Preventive Maintenance: Customizer
 *
 * @package Preventive Maintenance
 * @subpackage preventive_maintenance
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function preventive_maintenance_customize_register( $wp_customize ) {

	require get_parent_theme_file_path('/inc/controls/icon-changer.php');

	require get_parent_theme_file_path('/inc/controls/range-slider-control.php');

	// Register the custom control type.
	$wp_customize->register_control_type( 'Preventive_Maintenance_Toggle_Control' );

	//Register the sortable control type.
	$wp_customize->register_control_type( 'Preventive_Maintenance_Control_Sortable' );	

	//add home page setting pannel
	$wp_customize->add_panel( 'preventive_maintenance_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Home page Settings', 'preventive-maintenance' ),
	    'description' => __( 'Description of what this panel does.', 'preventive-maintenance' ),
	) );

	//TP General Option
	$wp_customize->add_section('preventive_maintenance_tp_general_settings',array(
        'title' => __('TP General Option', 'preventive-maintenance'),
        'panel' => 'preventive_maintenance_panel_id',
        'priority' => 1,
    ) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('preventive_maintenance_sidebar_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'preventive_maintenance_sanitize_choices'
	));
	$wp_customize->add_control('preventive_maintenance_sidebar_post_layout',array(
        'type' => 'radio',
        'label'     => __('Post Sidebar Position', 'preventive-maintenance'),
        'description'   => __('This option work for blog page, archive page and search page.', 'preventive-maintenance'),
        'section' => 'preventive_maintenance_tp_general_settings',
        'choices' => array(
            'full' => __('Full','preventive-maintenance'),
            'left' => __('Left','preventive-maintenance'),
            'right' => __('Right','preventive-maintenance'),
            'three-column' => __('Three Columns','preventive-maintenance'),
            'four-column' => __('Four Columns','preventive-maintenance'),
            'grid' => __('Grid Layout','preventive-maintenance')
        ),
	) );

	// Add Settings and Controls for Post sidebar Layout
	$wp_customize->add_setting('preventive_maintenance_sidebar_single_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'preventive_maintenance_sanitize_choices'
	));
	$wp_customize->add_control('preventive_maintenance_sidebar_single_post_layout',array(
        'type' => 'radio',
        'label'     => __('Single Post Sidebar Position', 'preventive-maintenance'),
        'description'   => __('This option work for single blog page', 'preventive-maintenance'),
        'section' => 'preventive_maintenance_tp_general_settings',
        'choices' => array(
            'full' => __('Full','preventive-maintenance'),
            'left' => __('Left','preventive-maintenance'),
            'right' => __('Right','preventive-maintenance'),
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('preventive_maintenance_sidebar_page_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'preventive_maintenance_sanitize_choices'
	));
	$wp_customize->add_control('preventive_maintenance_sidebar_page_layout',array(
        'type' => 'radio',
        'label'     => __('Page Sidebar Position', 'preventive-maintenance'),
        'description'   => __('This option work for pages.', 'preventive-maintenance'),
        'section' => 'preventive_maintenance_tp_general_settings',
        'choices' => array(
            'full' => __('Full','preventive-maintenance'),
            'left' => __('Left','preventive-maintenance'),
            'right' => __('Right','preventive-maintenance')
        ),
	) );

		//tp typography option
	$preventive_maintenance_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One',
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower',
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit',
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two',
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda',
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli',
		'Marck Script'           => 'Marck Script',
		'Noto Serif'             => 'Noto Serif',
		'Open Sans'              => 'Open Sans',
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen',
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display',
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik',
		'Rokkitt'                => 'Rokkitt',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Slabo'                  => 'Slabo',
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn',
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);

	$wp_customize->add_section('preventive_maintenance_typography_option',array(
		'title'         => __('TP Typography Option', 'preventive-maintenance'),
		'priority' => 1,
		'panel' => 'preventive_maintenance_panel_id'
   	));

   	$wp_customize->add_setting('preventive_maintenance_heading_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'preventive_maintenance_sanitize_choices',
	));
	$wp_customize->add_control(	'preventive_maintenance_heading_font_family', array(
		'section' => 'preventive_maintenance_typography_option',
		'label'   => __('heading Fonts', 'preventive-maintenance'),
		'type'    => 'select',
		'choices' => $preventive_maintenance_font_array,
	));

	$wp_customize->add_setting('preventive_maintenance_body_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'preventive_maintenance_sanitize_choices',
	));
	$wp_customize->add_control(	'preventive_maintenance_body_font_family', array(
		'section' => 'preventive_maintenance_typography_option',
		'label'   => __('Body Fonts', 'preventive-maintenance'),
		'type'    => 'select',
		'choices' => $preventive_maintenance_font_array,
	));

	//TP Preloader Option
	$wp_customize->add_section('preventive_maintenance_prelaoder_option',array(
		'title'         => __('TP Preloader Option', 'preventive-maintenance'),
		'panel' => 'preventive_maintenance_panel_id',
		'priority' => 1,
	) );
	$wp_customize->add_setting( 'preventive_maintenance_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'preventive_maintenance_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Preventive_Maintenance_Toggle_Control( $wp_customize, 'preventive_maintenance_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'preventive-maintenance' ),
		'section'     => 'preventive_maintenance_prelaoder_option',
		'type'        => 'toggle',
		'settings'    => 'preventive_maintenance_preloader_show_hide',
	) ) );
	$wp_customize->add_setting( 'preventive_maintenance_tp_preloader_color1_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'preventive_maintenance_tp_preloader_color1_option', array(
			'label'     => __('Preloader First Ring Color', 'preventive-maintenance'),
	    'description' => __('It will change the complete theme preloader ring 1 color in one click.', 'preventive-maintenance'),
	    'section' => 'preventive_maintenance_prelaoder_option',
	    'settings' => 'preventive_maintenance_tp_preloader_color1_option',
  	)));
  	$wp_customize->add_setting( 'preventive_maintenance_tp_preloader_color2_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'preventive_maintenance_tp_preloader_color2_option', array(
			'label'     => __('Preloader Second Ring Color', 'preventive-maintenance'),
	    'description' => __('It will change the complete theme preloader ring 2 color in one click.', 'preventive-maintenance'),
	    'section' => 'preventive_maintenance_prelaoder_option',
	    'settings' => 'preventive_maintenance_tp_preloader_color2_option',
  	)));
  	$wp_customize->add_setting( 'preventive_maintenance_tp_preloader_bg_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'preventive_maintenance_tp_preloader_bg_color_option', array(
			'label'     => __('Preloader Background Color', 'preventive-maintenance'),
	    'description' => __('It will change the complete theme preloader bg color in one click.', 'preventive-maintenance'),
	    'section' => 'preventive_maintenance_prelaoder_option',
	    'settings' => 'preventive_maintenance_tp_preloader_bg_color_option',
  	)));

	//TP Color Option
	$wp_customize->add_section('preventive_maintenance_color_option',array(
     'title'         => __('TP Color Option', 'preventive-maintenance'),
     'panel' => 'preventive_maintenance_panel_id',
     'priority' => 1,
    ) );
	$wp_customize->add_setting( 'preventive_maintenance_tp_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'preventive_maintenance_tp_color_option', array(
			'label'     => __('Theme First Color', 'preventive-maintenance'),
	    'description' => __('It will change the complete theme color in one click.', 'preventive-maintenance'),
	    'section' => 'preventive_maintenance_color_option',
	    'settings' => 'preventive_maintenance_tp_color_option',
  	)));
  	$wp_customize->add_setting( 'preventive_maintenance_tp_second_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'preventive_maintenance_tp_second_color_option', array(
			'label'     => __('Theme  Second Color', 'preventive-maintenance'),
	    'description' => __('It will change the complete theme color in one click.', 'preventive-maintenance'),
	    'section' => 'preventive_maintenance_color_option',
	    'settings' => 'preventive_maintenance_tp_second_color_option',
  	)));
  	$wp_customize->add_setting( 'preventive_maintenance_tp_third_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'preventive_maintenance_tp_third_color_option', array(
			'label'     => __('Theme Third Color', 'preventive-maintenance'),
	    'description' => __('It will change the complete theme color in one click.', 'preventive-maintenance'),
	    'section' => 'preventive_maintenance_color_option',
	    'settings' => 'preventive_maintenance_tp_third_color_option',
  	)));

	//TP Blog Option
	$wp_customize->add_section('preventive_maintenance_blog_option',array(
        'title' => __('TP Blog Option', 'preventive-maintenance'),
        'panel' => 'preventive_maintenance_panel_id',
        'priority' => 1,
    ) );
	/** Meta Order */
    $wp_customize->add_setting('blog_meta_order', array(
        'default' => array('date', 'author', 'comment', 'category'),
        'sanitize_callback' => 'preventive_maintenance_sanitize_sortable',
    ));
    $wp_customize->add_control(new Preventive_Maintenance_Control_Sortable($wp_customize, 'blog_meta_order', array(
    	'label' => esc_html__('Meta Order', 'preventive-maintenance'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'preventive-maintenance') ,
        'section' => 'preventive_maintenance_blog_option',
        'choices' => array(
            'date' => __('date', 'preventive-maintenance') ,
            'author' => __('author', 'preventive-maintenance') ,
            'comment' => __('comment', 'preventive-maintenance') ,
            'category' => __('category', 'preventive-maintenance') ,
        ) ,
    )));
    $wp_customize->add_setting( 'preventive_maintenance_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'preventive_maintenance_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'preventive_maintenance_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','preventive-maintenance' ),
		'section'     => 'preventive_maintenance_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );
	$wp_customize->add_setting('preventive_maintenance_read_more_text',array(
		'default'=> __('Read More','preventive-maintenance'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('preventive_maintenance_read_more_text',array(
		'label'	=> __('Edit Button Text','preventive-maintenance'),
		'section'=> 'preventive_maintenance_blog_option',
		'type'=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'preventive_maintenance_read_more_text', array(
		'selector' => '.readmore-btn',
		'render_callback' => 'preventive_maintenance_customize_partial_preventive_maintenance_read_more_text',
	) );
	$wp_customize->add_setting( 'preventive_maintenance_remove_read_button', array(
		 'default'           => true,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'preventive_maintenance_sanitize_checkbox',
	 ) );
	 $wp_customize->add_control( new Preventive_Maintenance_Toggle_Control( $wp_customize, 'preventive_maintenance_remove_read_button', array(
		 'label'       => esc_html__( 'Show / Hide Read More Button', 'preventive-maintenance' ),
		 'section'     => 'preventive_maintenance_blog_option',
		 'type'        => 'toggle',
		 'settings'    => 'preventive_maintenance_remove_read_button',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'preventive_maintenance_remove_read_button', array(
		'selector' => '.readmore-btn',
		'render_callback' => 'preventive_maintenance_customize_partial_preventive_maintenance_remove_read_button',
	));
	$wp_customize->add_setting( 'preventive_maintenance_remove_tags', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'preventive_maintenance_sanitize_checkbox',
	) );

	$wp_customize->add_control( new Preventive_Maintenance_Toggle_Control( $wp_customize, 'preventive_maintenance_remove_tags', array(
		'label'       => esc_html__( 'Show / Hide Tags Option', 'preventive-maintenance' ),
		'section'     => 'preventive_maintenance_blog_option',
		'type'        => 'toggle',
		'settings'    => 'preventive_maintenance_remove_tags',
		) ) );
    $wp_customize->selective_refresh->add_partial( 'preventive_maintenance_remove_tags', array(
		'selector' => '.box-content a[rel="tag"]',
		'render_callback' => 'preventive_maintenance_customize_partial_preventive_maintenance_remove_tags',
	));

	$wp_customize->add_setting( 'preventive_maintenance_remove_category', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'preventive_maintenance_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Preventive_Maintenance_Toggle_Control( $wp_customize, 'preventive_maintenance_remove_category', array(
		'label'       => esc_html__( 'Show / Hide Category Option', 'preventive-maintenance' ),
		'section'     => 'preventive_maintenance_blog_option',
		'type'        => 'toggle',
		'settings'    => 'preventive_maintenance_remove_category',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'preventive_maintenance_remove_category', array(
		'selector' => '.box-content a[rel="category"]',
		'render_callback' => 'preventive_maintenance_customize_partial_preventive_maintenance_remove_category',
	));
	$wp_customize->add_setting( 'preventive_maintenance_remove_comment', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'preventive_maintenance_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Preventive_Maintenance_Toggle_Control( $wp_customize, 'preventive_maintenance_remove_comment', array(
	 'label'       => esc_html__( 'Show / Hide Comment Form', 'preventive-maintenance' ),
	 'section'     => 'preventive_maintenance_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'preventive_maintenance_remove_comment',
	) ) );

	$wp_customize->add_setting( 'preventive_maintenance_remove_related_post', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'preventive_maintenance_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Preventive_Maintenance_Toggle_Control( $wp_customize, 'preventive_maintenance_remove_related_post', array(
	 'label'       => esc_html__( 'Show / Hide Related Post', 'preventive-maintenance' ),
	 'section'     => 'preventive_maintenance_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'preventive_maintenance_remove_related_post',
	) ) );
	$wp_customize->add_setting('preventive_maintenance_related_post_heading',array(
		'default'=> __('Related Posts','preventive-maintenance'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('preventive_maintenance_related_post_heading',array(
		'label'	=> __('Related Posts Title','preventive-maintenance'),
		'section'=> 'preventive_maintenance_blog_option',
		'type'=> 'text'
	));
	$wp_customize->add_setting( 'preventive_maintenance_related_post_per_page', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'preventive_maintenance_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'preventive_maintenance_related_post_per_page', array(
		'label'       => esc_html__( 'Related Post Per Page','preventive-maintenance' ),
		'section'     => 'preventive_maintenance_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 3,
			'max'              => 9,
		),
	) );
	$wp_customize->add_setting( 'preventive_maintenance_related_post_per_columns', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'preventive_maintenance_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'preventive_maintenance_related_post_per_columns', array(
		'label'       => esc_html__( 'Related Post Per Row','preventive-maintenance' ),
		'section'     => 'preventive_maintenance_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	) );
	$wp_customize->add_setting('preventive_maintenance_post_layout',array(
        'default' => 'image-content',
        'sanitize_callback' => 'preventive_maintenance_sanitize_choices'
	));
	$wp_customize->add_control('preventive_maintenance_post_layout',array(
        'type' => 'radio',
        'label'     => __('Post Layout', 'preventive-maintenance'),
        'description' => __( 'Control Works only for full,left and right sidebar position in archieve posts', 'preventive-maintenance' ),
        'section' => 'preventive_maintenance_blog_option',
        'choices' => array(
            'image-content' => __('Media-Content','preventive-maintenance'),
            'content-image' => __('Content-Media','preventive-maintenance'),
        ),
	) );

	 //MENU TYPOGRAPHY
	$wp_customize->add_section( 'preventive_maintenance_menu_typography', array(
    	'title'      => __( 'Menu Typography', 'preventive-maintenance' ),
		'panel' => 'preventive_maintenance_panel_id',
		'priority' => 1,
	) );
	$wp_customize->add_setting('preventive_maintenance_menu_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'preventive_maintenance_sanitize_choices',
	));
	$wp_customize->add_control(	'preventive_maintenance_menu_font_family', array(
		'section' => 'preventive_maintenance_menu_typography',
		'label'   => __('Menu Fonts', 'preventive-maintenance'),
		'type'    => 'select',
		'choices' => $preventive_maintenance_font_array,
	));
	$wp_customize->add_setting('preventive_maintenance_menu_font_weight',array(
        'default' => '500',
        'sanitize_callback' => 'preventive_maintenance_sanitize_choices'
	));
	$wp_customize->add_control('preventive_maintenance_menu_font_weight',array(
     'type' => 'radio',
     'label'     => __('Font Weight', 'preventive-maintenance'),
     'section' => 'preventive_maintenance_menu_typography',
     'type' => 'select',
     'choices' => array(
         '100' => __('100','preventive-maintenance'),
         '200' => __('200','preventive-maintenance'),
         '300' => __('300','preventive-maintenance'),
         '400' => __('400','preventive-maintenance'),
         '500' => __('500','preventive-maintenance'),
         '600' => __('600','preventive-maintenance'),
         '700' => __('700','preventive-maintenance'),
         '800' => __('800','preventive-maintenance'),
         '900' => __('900','preventive-maintenance')
     ),
	) );
	$wp_customize->add_setting('preventive_maintenance_menu_text_tranform',array(
		'default' => 'Uppercase',
		'sanitize_callback' => 'preventive_maintenance_sanitize_choices'
 	));
 	$wp_customize->add_control('preventive_maintenance_menu_text_tranform',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','preventive-maintenance'),
		'section' => 'preventive_maintenance_menu_typography',
		'choices' => array(
		   'Uppercase' => __('Uppercase','preventive-maintenance'),
		   'Lowercase' => __('Lowercase','preventive-maintenance'),
		   'Capitalize' => __('Capitalize','preventive-maintenance'),
		),
	) );
	$wp_customize->add_setting('preventive_maintenance_menu_font_size', array(
		'default' => 15,
	    'sanitize_callback' => 'preventive_maintenance_sanitize_number_range',
	));
	$wp_customize->add_control(new Preventive_Maintenance_Range_Slider($wp_customize, 'preventive_maintenance_menu_font_size', array(
	    'section' => 'preventive_maintenance_menu_typography',
	    'label' => esc_html__('Font Size', 'preventive-maintenance'),
	    'input_attrs' => array(
	        'min' => 0,
	        'max' => 20,
	        'step' => 1
	    )
	)));


	// Topbar Section Section
	$wp_customize->add_section( 'preventive_maintenance_topbar', array(
    	'title'      => __( 'Topbar Details', 'preventive-maintenance' ),
    	'description' => __( 'Add your contact details', 'preventive-maintenance' ),
		'panel' => 'preventive_maintenance_panel_id',
		'priority' => 2,
	) );
	$wp_customize->add_setting('preventive_maintenance_timming',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('preventive_maintenance_timming',array(
		'label'	=> __('Add Timming','preventive-maintenance'),
		'section'=> 'preventive_maintenance_topbar',
		'type'=> 'text'
	));
    $wp_customize->add_setting('preventive_maintenance_timming_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Preventive_Maintenance_Icon_Changer(
        $wp_customize,'preventive_maintenance_timming_icon',array(
		'label'	=> __('Timing Icon','preventive-maintenance'),
		'transport' => 'refresh',
		'section'	=> 'preventive_maintenance_topbar',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('preventive_maintenance_calender',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('preventive_maintenance_calender',array(
		'label'	=> __('Add Calender Text','preventive-maintenance'),
		'section'=> 'preventive_maintenance_topbar',
		'type'=> 'text'
	));
	$wp_customize->add_setting('preventive_maintenance_calender_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Preventive_Maintenance_Icon_Changer(
        $wp_customize,'preventive_maintenance_calender_icon',array(
		'label'	=> __('Calender Icon','preventive-maintenance'),
		'transport' => 'refresh',
		'section'	=> 'preventive_maintenance_topbar',
		'type'		=> 'icon'
	)));

	// Contact Details Section
	$wp_customize->add_section( 'preventive_maintenance_contact_details', array(
    	'title'      => __( 'Contact Details', 'preventive-maintenance' ),
    	'description' => __( 'Add your contact details', 'preventive-maintenance' ),
		'panel' => 'preventive_maintenance_panel_id',
		'priority' => 2,
	) );
	$wp_customize->add_setting( 'preventive_maintenance_search_icon', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'preventive_maintenance_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Preventive_Maintenance_Toggle_Control( $wp_customize, 'preventive_maintenance_search_icon', array(
		'label'       => esc_html__( 'Show / Hide Search Option', 'preventive-maintenance' ),
		'section'     => 'preventive_maintenance_contact_details',
		'type'        => 'toggle',
		'settings'    => 'preventive_maintenance_search_icon',
	) ) );
	$wp_customize->selective_refresh->add_partial( 'preventive_maintenance_search_icon', array(
		'selector' => '.search_btn i',
		'render_callback' => 'preventive_maintenance_customize_partial_preventive_maintenance_search_icon',
	) );
	$wp_customize->add_setting('preventive_maintenance_location_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('preventive_maintenance_location_text',array(
		'label'	=> __('Add Location Text','preventive-maintenance'),
		'section'=> 'preventive_maintenance_contact_details',
		'type'=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'preventive_maintenance_location_text', array(
		'selector' => '.timebox i',
		'render_callback' => 'preventive_maintenance_customize_partial_preventive_maintenance_location',
	) );
	$wp_customize->add_setting('preventive_maintenance_location',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('preventive_maintenance_location',array(
		'label'	=> __('Add Location','preventive-maintenance'),
		'section'=> 'preventive_maintenance_contact_details',
		'type'=> 'text'
	));
	$wp_customize->add_setting('preventive_maintenance_location_icon',array(
		'default'	=> 'far fa-map',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Preventive_Maintenance_Icon_Changer(
        $wp_customize,'preventive_maintenance_location_icon',array(
		'label'	=> __('Location Icon','preventive-maintenance'),
		'transport' => 'refresh',
		'section'	=> 'preventive_maintenance_contact_details',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('preventive_maintenance_mail_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('preventive_maintenance_mail_text',array(
		'label'	=> __('Add Mail Text','preventive-maintenance'),
		'section'=> 'preventive_maintenance_contact_details',
		'type'=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'preventive_maintenance_mail_text', array(
		'selector' => '.email',
		'render_callback' => 'preventive_maintenance_customize_partial_preventive_maintenance_mail_text',
	) );
	$wp_customize->add_setting('preventive_maintenance_mail',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('preventive_maintenance_mail',array(
		'label'	=> __('Add Mail Address','preventive-maintenance'),
		'section'=> 'preventive_maintenance_contact_details',
		'type'=> 'text'
	));
	$wp_customize->add_setting('preventive_maintenance_envelope_icon',array(
		'default'	=> 'fas fa-envelope-open',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Preventive_Maintenance_Icon_Changer(
        $wp_customize,'preventive_maintenance_envelope_icon',array(
		'label'	=> __('Mail Icon','preventive-maintenance'),
		'transport' => 'refresh',
		'section'	=> 'preventive_maintenance_contact_details',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('preventive_maintenance_call_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('preventive_maintenance_call_text',array(
		'label'	=> __('Add Call Text','preventive-maintenance'),
		'section'=> 'preventive_maintenance_contact_details',
		'type'=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'preventive_maintenance_call_text', array(
		'selector' => '.call',
		'render_callback' => 'preventive_maintenance_customize_partial_preventive_maintenance_call_text',
	) );
	$wp_customize->add_setting('preventive_maintenance_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'preventive_maintenance_sanitize_phone_number'
	));
	$wp_customize->add_control('preventive_maintenance_call',array(
		'label'	=> __('Add Phone Number','preventive-maintenance'),
		'section'=> 'preventive_maintenance_contact_details',
		'type'=> 'text'
	));
    $wp_customize->add_setting('preventive_maintenance_call_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Preventive_Maintenance_Icon_Changer(
        $wp_customize,'preventive_maintenance_call_icon',array(
		'label'	=> __('Call Icon','preventive-maintenance'),
		'transport' => 'refresh',
		'section'	=> 'preventive_maintenance_contact_details',
		'type'		=> 'icon'
	)));

	// Social Link
	$wp_customize->add_section( 'preventive_maintenance_social_media', array(
    	'title'      => __( 'Social Media Links', 'preventive-maintenance' ),
    	'description' => __( 'Add your Social Links', 'preventive-maintenance' ),
		'panel' => 'preventive_maintenance_panel_id',
		'priority' => 2,
	) );
	$wp_customize->add_setting( 'preventive_maintenance_header_fb_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'preventive_maintenance_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Preventive_Maintenance_Toggle_Control( $wp_customize, 'preventive_maintenance_header_fb_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'preventive-maintenance' ),
		'section'     => 'preventive_maintenance_social_media',
		'type'        => 'toggle',
		'settings'    => 'preventive_maintenance_header_fb_new_tab',
	) ) );
	$wp_customize->add_setting('preventive_maintenance_facebook_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('preventive_maintenance_facebook_url',array(
		'label'	=> __('Facebook Link','preventive-maintenance'),
		'section'=> 'preventive_maintenance_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('preventive_maintenance_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Preventive_Maintenance_Icon_Changer(
        $wp_customize,'preventive_maintenance_facebook_icon',array(
		'label'	=> __('Facebook Icon','preventive-maintenance'),
		'transport' => 'refresh',
		'section'	=> 'preventive_maintenance_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->selective_refresh->add_partial( 'preventive_maintenance_facebook_url', array(
		'selector' => '.social-media',
		'render_callback' => 'preventive_maintenance_customize_partial_preventive_maintenance_facebook_url',
	) );
	$wp_customize->add_setting( 'preventive_maintenance_header_twt_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'preventive_maintenance_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Preventive_Maintenance_Toggle_Control( $wp_customize, 'preventive_maintenance_header_twt_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'preventive-maintenance' ),
		'section'     => 'preventive_maintenance_social_media',
		'type'        => 'toggle',
		'settings'    => 'preventive_maintenance_header_twt_new_tab',
	) ) );
	$wp_customize->add_setting('preventive_maintenance_twitter_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('preventive_maintenance_twitter_url',array(
		'label'	=> __('Twitter Link','preventive-maintenance'),
		'section'=> 'preventive_maintenance_social_media',
		'type'=> 'url'
	));
    $wp_customize->add_setting('preventive_maintenance_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Preventive_Maintenance_Icon_Changer(
        $wp_customize,'preventive_maintenance_twitter_icon',array(
		'label'	=> __('Twitter Icon','preventive-maintenance'),
		'transport' => 'refresh',
		'section'	=> 'preventive_maintenance_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting( 'preventive_maintenance_header_ins_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'preventive_maintenance_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Preventive_Maintenance_Toggle_Control( $wp_customize, 'preventive_maintenance_header_ins_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'preventive-maintenance' ),
		'section'     => 'preventive_maintenance_social_media',
		'type'        => 'toggle',
		'settings'    => 'preventive_maintenance_header_ins_new_tab',
	) ) );
	$wp_customize->add_setting('preventive_maintenance_instagram_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('preventive_maintenance_instagram_url',array(
		'label'	=> __('Instagram Link','preventive-maintenance'),
		'section'=> 'preventive_maintenance_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('preventive_maintenance_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Preventive_Maintenance_Icon_Changer(
        $wp_customize,'preventive_maintenance_instagram_icon',array(
		'label'	=> __('Instagram Icon','preventive-maintenance'),
		'transport' => 'refresh',
		'section'	=> 'preventive_maintenance_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting( 'preventive_maintenance_header_ut_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'preventive_maintenance_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Preventive_Maintenance_Toggle_Control( $wp_customize, 'preventive_maintenance_header_ut_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'preventive-maintenance' ),
		'section'     => 'preventive_maintenance_social_media',
		'type'        => 'toggle',
		'settings'    => 'preventive_maintenance_header_ut_new_tab',
	) ) );
	$wp_customize->add_setting('preventive_maintenance_youtube_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('preventive_maintenance_youtube_url',array(
		'label'	=> __('YouTube Link','preventive-maintenance'),
		'section'=> 'preventive_maintenance_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('preventive_maintenance_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Preventive_Maintenance_Icon_Changer(
        $wp_customize,'preventive_maintenance_youtube_icon',array(
		'label'	=> __('YouTube Icon','preventive-maintenance'),
		'transport' => 'refresh',
		'section'	=> 'preventive_maintenance_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting( 'preventive_maintenance_header_pint_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'preventive_maintenance_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Preventive_Maintenance_Toggle_Control( $wp_customize, 'preventive_maintenance_header_pint_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'preventive-maintenance' ),
		'section'     => 'preventive_maintenance_social_media',
		'type'        => 'toggle',
		'settings'    => 'preventive_maintenance_header_pint_new_tab',
	) ) );
	$wp_customize->add_setting('preventive_maintenance_pint_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('preventive_maintenance_pint_url',array(
		'label'	=> __('Pinterest Link','preventive-maintenance'),
		'section'=> 'preventive_maintenance_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('preventive_maintenance_pinterest_icon',array(
		'default'	=> 'fab fa-pinterest',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Preventive_Maintenance_Icon_Changer(
        $wp_customize,'preventive_maintenance_pinterest_icon',array(
		'label'	=> __('Pinterest Icon','preventive-maintenance'),
		'transport' => 'refresh',
		'section'	=> 'preventive_maintenance_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('preventive_maintenance_social_icon_fontsize',array(
		'default'=> '20',
		'sanitize_callback'	=> 'preventive_maintenance_sanitize_number_absint'
	));
	$wp_customize->add_control('preventive_maintenance_social_icon_fontsize',array(
		'label'	=> __('Social Icons Font Size in PX','preventive-maintenance'),
		'type'=> 'number',
		'section'=> 'preventive_maintenance_social_media',
		'input_attrs' => array(
	      		'step' => 1,
				'min'  => 0,
				'max'  => 30,
	        ),
	));

	//home page slider
	$wp_customize->add_section( 'preventive_maintenance_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'preventive-maintenance' ),
		'panel' => 'preventive_maintenance_panel_id',
		'priority' => 3,
	) );
	$wp_customize->add_setting( 'preventive_maintenance_slider_arrows', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'preventive_maintenance_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Preventive_Maintenance_Toggle_Control( $wp_customize, 'preventive_maintenance_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide slider', 'preventive-maintenance' ),
		'section'     => 'preventive_maintenance_slider_section',
		'type'        => 'toggle',
		'settings'    => 'preventive_maintenance_slider_arrows',
	) ) );
	$wp_customize->add_setting('preventive_maintenance_slider_short_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('preventive_maintenance_slider_short_heading',array(
		'label'	=> __('Add short Heading','preventive-maintenance'),
		'section'=> 'preventive_maintenance_slider_section',
		'type'=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'preventive_maintenance_slider_arrows', array(
		'selector' => '#slider .carousel-caption',
		'render_callback' => 'preventive_maintenance_customize_partial_preventive_maintenance_slider_arrows',
	) );

	for ( $preventive_maintenance_count = 1; $preventive_maintenance_count <= 4; $preventive_maintenance_count++ ) {
		// Add color scheme setting and control.
		$wp_customize->add_setting( 'preventive_maintenance_slider_page' . $preventive_maintenance_count, array(
			'default'           => '',
			'sanitize_callback' => 'preventive_maintenance_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'preventive_maintenance_slider_page' . $preventive_maintenance_count, array(
			'label'    => __( 'Select Slide Image Page', 'preventive-maintenance' ),
			'section'  => 'preventive_maintenance_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}
	$wp_customize->add_setting( 'preventive_maintenance_slider_button', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'preventive_maintenance_sanitize_checkbox',
 	) );
 	$wp_customize->add_control( new Preventive_Maintenance_Toggle_Control( $wp_customize, 'preventive_maintenance_slider_button', array(
	 'label'       => esc_html__( 'Show / Hide Slider Button', 'preventive-maintenance' ),
	 'section'     => 'preventive_maintenance_slider_section',
	 'type'        => 'toggle',
	 'settings'    => 'preventive_maintenance_slider_button',
 	) ) );
	$wp_customize->add_setting('preventive_maintenance_slider_content_layout',array(
        'default' => 'CENTER-ALIGN',
        'sanitize_callback' => 'preventive_maintenance_sanitize_choices'
	));
	$wp_customize->add_control('preventive_maintenance_slider_content_layout',array(
        'type' => 'radio',
        'label'     => __('Slider Content Layout', 'preventive-maintenance'),
        'section' => 'preventive_maintenance_slider_section',
        'choices' => array(
            'CENTER-ALIGN' => __('CENTER-ALIGN','preventive-maintenance'),
            'LEFT-ALIGN' => __('LEFT-ALIGN','preventive-maintenance'),
            'RIGHT-ALIGN' => __('RIGHT-ALIGN','preventive-maintenance'),
        ),
	) );

	//About Section
	$wp_customize->add_section('preventive_maintenance_about_section',array(
		'title'	=> __('About Section','preventive-maintenance'),
		'panel' => 'preventive_maintenance_panel_id',
		'priority' => 3,
	));
	$wp_customize->add_setting( 'preventive_maintenance_about_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'preventive_maintenance_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Preventive_Maintenance_Toggle_Control( $wp_customize, 'preventive_maintenance_about_show_hide', array(
		'label'       => esc_html__( 'Show / Hide About Section', 'preventive-maintenance' ),
		'section'     => 'preventive_maintenance_about_section',
		'type'        => 'toggle',
		'settings'    => 'preventive_maintenance_about_show_hide',
		'priority' => 1,
	) ) );
	$wp_customize->add_setting('preventive_maintenance_about_short_heading',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('preventive_maintenance_about_short_heading',array(
		'label'	=> __('About Title','preventive-maintenance'),
		'section'	=> 'preventive_maintenance_about_section',
		'type'		=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'preventive_maintenance_about_short_heading', array(
		'selector' => '#about h3',
		'render_callback' => 'preventive_maintenance_customize_partial_preventive_maintenance_about_short_heading',
	) );
	$wp_customize->add_setting('preventive_maintenance_about_sub_heading',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('preventive_maintenance_about_sub_heading',array(
		'label'	=> __('About List Heading','preventive-maintenance'),
		'section'	=> 'preventive_maintenance_about_section',
		'type'		=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'preventive_maintenance_about_sub_heading', array(
		'selector' => '#about h5',
		'render_callback' => 'preventive_maintenance_customize_partial_preventive_maintenance_about_sub_heading',
	) );
	$wp_customize->add_setting( 'preventive_maintenance_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'preventive_maintenance_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'preventive_maintenance_about_page', array(
		'label'    => __( 'Select About Page', 'preventive-maintenance' ),
		'section'  => 'preventive_maintenance_about_section',
		'type'     => 'dropdown-pages'
	) );
	$wp_customize->add_setting('preventive_maintenance_about_points',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('preventive_maintenance_about_points',array(
		'label'	=> __('Add number of points','preventive-maintenance'),
		'section'	=> 'preventive_maintenance_about_section',
		'type'		=> 'number',
		'input_attrs' => array(
		'step' => 1,
        'min' => 0,     
        'max' => 10
    	)
	));
	$preventive_maintenance_about_point = get_theme_mod('preventive_maintenance_about_points','');
   	for ( $m = 1; $m <= $preventive_maintenance_about_point; $m++ ){
		$wp_customize->add_setting('preventive_maintenance_about_points_text'.$m,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('preventive_maintenance_about_points_text'.$m,array(
			'label'	=> __('Add Text ','preventive-maintenance').$m,
			'section'	=> 'preventive_maintenance_about_section',
			'type'		=> 'text'
		));
	}
	$wp_customize->add_setting('preventive_maintenance_about_us_exp_no',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('preventive_maintenance_about_us_exp_no',array(
		'label'	=> __('Number of Experience','preventive-maintenance'),
		'section'	=> 'preventive_maintenance_about_section',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('preventive_maintenance_about_us_exp_text',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('preventive_maintenance_about_us_exp_text',array(
		'label'	=> __('Text For Experience','preventive-maintenance'),
		'section'	=> 'preventive_maintenance_about_section',
		'type'		=> 'text'
	));
	//footer
	$wp_customize->add_section('preventive_maintenance_footer_section',array(
		'title'	=> __('Footer Text','preventive-maintenance'),
		'description'	=> __('Add copyright text.','preventive-maintenance'),
		'panel' => 'preventive_maintenance_panel_id',
		'priority' => 4,
	));
	$wp_customize->add_setting('preventive_maintenance_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('preventive_maintenance_footer_text',array(
		'label'	=> __('Copyright Text','preventive-maintenance'),
		'section'	=> 'preventive_maintenance_footer_section',
		'type'		=> 'text'
	));
	// footer columns
	$wp_customize->add_setting('preventive_maintenance_footer_columns',array(
		'default'	=> 4,
		'sanitize_callback'	=> 'preventive_maintenance_sanitize_number_absint'
	));
	$wp_customize->add_control('preventive_maintenance_footer_columns',array(
		'label'	=> __('Footer Widget Columns','preventive-maintenance'),
		'section'	=> 'preventive_maintenance_footer_section',
		'setting'	=> 'preventive_maintenance_footer_columns',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	));
	$wp_customize->add_setting( 'preventive_maintenance_tp_footer_bg_color_option', array(
		'default' => '#151515',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'preventive_maintenance_tp_footer_bg_color_option', array(
		'label'     => __('Footer Widget Background Color', 'preventive-maintenance'),
		'description' => __('It will change the complete footer widget backgorund color.', 'preventive-maintenance'),
		'section' => 'preventive_maintenance_footer_section',
		'settings' => 'preventive_maintenance_tp_footer_bg_color_option',
	)));
	$wp_customize->add_setting('preventive_maintenance_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'preventive_maintenance_footer_widget_image',array(
	    'label' => __('Footer Widget Background Image','preventive-maintenance'),
	    'section' => 'preventive_maintenance_footer_section'
	)));
	$wp_customize->selective_refresh->add_partial( 'preventive_maintenance_footer_text', array(
		'selector' => '#footer p',
		'render_callback' => 'preventive_maintenance_customize_partial_preventive_maintenance_footer_text',
	) );
	$wp_customize->add_setting( 'preventive_maintenance_return_to_header', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'preventive_maintenance_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Preventive_Maintenance_Toggle_Control( $wp_customize, 'preventive_maintenance_return_to_header', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'preventive-maintenance' ),
		'section'     => 'preventive_maintenance_footer_section',
		'type'        => 'toggle',
		'settings'    => 'preventive_maintenance_return_to_header',
	) ) );
	$wp_customize->add_setting('preventive_maintenance_scroll_top_icon',array(
		'default'	=> 'fas fa-arrow-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Preventive_Maintenance_Icon_Changer(
        $wp_customize,'preventive_maintenance_scroll_top_icon',array(
		'label'	=> __('Scroll to top Icon','preventive-maintenance'),
		'transport' => 'refresh',
		'section'	=> 'preventive_maintenance_footer_section',
		'type'		=> 'icon'
	)));
	// Add Settings and Controls for Scroll top
	$wp_customize->add_setting('preventive_maintenance_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'preventive_maintenance_sanitize_choices'
	));
	$wp_customize->add_control('preventive_maintenance_scroll_top_position',array(
        'type' => 'radio',
        'label'     => __('Scroll to top Position', 'preventive-maintenance'),
        'description'   => __('This option work for scroll to top', 'preventive-maintenance'),
        'section' => 'preventive_maintenance_footer_section',
        'choices' => array(
            'Right' => __('Right','preventive-maintenance'),
            'Left' => __('Left','preventive-maintenance'),
            'Center' => __('Center','preventive-maintenance')
        ),
	) );

	// mobile responsive
	$wp_customize->add_section('preventive_maintenance_mobile_media_option',array(
		'title'         => __('Mobile Responsive media', 'preventive-maintenance'),
		'description' => __('Control will no function if the toggle in the main settings is off.', 'preventive-maintenance'),
		'panel' => 'preventive_maintenance_panel_id',
		'priority' => 5,
	) );
	$wp_customize->add_setting( 'preventive_maintenance_return_to_header_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'preventive_maintenance_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Preventive_Maintenance_Toggle_Control( $wp_customize, 'preventive_maintenance_return_to_header_mob', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'preventive-maintenance' ),
		'section'     => 'preventive_maintenance_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'preventive_maintenance_return_to_header_mob',
	) ) );
	$wp_customize->add_setting( 'preventive_maintenance_slider_button_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'preventive_maintenance_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Preventive_Maintenance_Toggle_Control( $wp_customize, 'preventive_maintenance_slider_button_mob', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'preventive-maintenance' ),
		'section'     => 'preventive_maintenance_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'preventive_maintenance_slider_button_mob',
	) ) );
	$wp_customize->add_setting( 'preventive_maintenance_related_post_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'preventive_maintenance_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Preventive_Maintenance_Toggle_Control( $wp_customize, 'preventive_maintenance_related_post_mob', array(
		'label'       => esc_html__( 'Show / Hide Related Post', 'preventive-maintenance' ),
		'section'     => 'preventive_maintenance_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'preventive_maintenance_related_post_mob',
	) ) );

	//Site identity
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'preventive_maintenance_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'preventive_maintenance_customize_partial_blogdescription',
	) );

	$wp_customize->add_setting( 'preventive_maintenance_site_title_text', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'preventive_maintenance_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Preventive_Maintenance_Toggle_Control( $wp_customize, 'preventive_maintenance_site_title_text', array(
		'label'       => esc_html__( 'Show / Hide Site Title', 'preventive-maintenance' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'preventive_maintenance_site_title_text',
	) ) );

	// site identity
	// logo site title size
	$wp_customize->add_setting('preventive_maintenance_site_title_font_size',array(
		'default'	=> 30,
		'sanitize_callback'	=> 'preventive_maintenance_sanitize_number_absint'
	));
	$wp_customize->add_control('preventive_maintenance_site_title_font_size',array(
		'label'	=> __('Site Title Font Size in PX','preventive-maintenance'),
		'section'	=> 'title_tagline',
		'setting'	=> 'preventive_maintenance_site_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 30,
		),
	));
	$wp_customize->add_setting( 'preventive_maintenance_site_tagline_text', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'preventive_maintenance_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Preventive_Maintenance_Toggle_Control( $wp_customize, 'preventive_maintenance_site_tagline_text', array(
		'label'       => esc_html__( 'Show / Hide Site Tagline', 'preventive-maintenance' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'preventive_maintenance_site_tagline_text',
	) ) );
	// logo site tagline size
	$wp_customize->add_setting('preventive_maintenance_site_tagline_font_size',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'preventive_maintenance_sanitize_number_absint'
	));
	$wp_customize->add_control('preventive_maintenance_site_tagline_font_size',array(
		'label'	=> __('Site Tagline Font Size in PX','preventive-maintenance'),
		'section'	=> 'title_tagline',
		'setting'	=> 'preventive_maintenance_site_tagline_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 30,
		),
	));
    $wp_customize->add_setting('preventive_maintenance_logo_width',array(
		'default' => 150,
		'sanitize_callback'	=> 'preventive_maintenance_sanitize_number_absint'
	));
	$wp_customize->add_control('preventive_maintenance_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','preventive-maintenance'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));
	$wp_customize->add_setting('preventive_maintenance_logo_settings',array(
        'default' => 'Different Line',
        'sanitize_callback' => 'preventive_maintenance_sanitize_choices'
	));
   	$wp_customize->add_control('preventive_maintenance_logo_settings',array(
        'type' => 'radio',
        'label'     => __('Logo Layout Settings', 'preventive-maintenance'),
        'description'   => __('Here you have two options 1. Logo and Site tite in differnt line. 2. Logo and Site title in same line.', 'preventive-maintenance'),
        'section' => 'title_tagline',
        'choices' => array(
            'Different Line' => __('Different Line','preventive-maintenance'),
            'Same Line' => __('Same Line','preventive-maintenance')
        ),
	) );

   	// woocommerce settings
	$wp_customize->add_setting('preventive_maintenance_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'preventive_maintenance_sanitize_number_absint'
	));
	$wp_customize->add_control('preventive_maintenance_per_columns',array(
		'label'	=> __('Product Per Row','preventive-maintenance'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
	$wp_customize->add_setting('preventive_maintenance_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'preventive_maintenance_sanitize_number_absint'
	));
	$wp_customize->add_control('preventive_maintenance_product_per_page',array(
		'label'	=> __('Product Per Page','preventive-maintenance'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
	$wp_customize->add_setting( 'preventive_maintenance_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'preventive_maintenance_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Preventive_Maintenance_Toggle_Control( $wp_customize, 'preventive_maintenance_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Shop page sidebar', 'preventive-maintenance' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'preventive_maintenance_product_sidebar',
	) ) );
	$wp_customize->add_setting('preventive_maintenance_sale_tag_position',array(
        'default' => 'right',
        'sanitize_callback' => 'preventive_maintenance_sanitize_choices'
	));
	$wp_customize->add_control('preventive_maintenance_sale_tag_position',array(
        'type' => 'radio',
        'label'     => __('Sale Badge Position', 'preventive-maintenance'),
        'description'   => __('This option work for Archieve Products', 'preventive-maintenance'),
        'section' => 'woocommerce_product_catalog',
        'choices' => array(
            'left' => __('Left','preventive-maintenance'),
            'right' => __('Right','preventive-maintenance'),
        ),
	) );
	$wp_customize->add_setting( 'preventive_maintenance_single_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'preventive_maintenance_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Preventive_Maintenance_Toggle_Control( $wp_customize, 'preventive_maintenance_single_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Product page sidebar', 'preventive-maintenance' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'preventive_maintenance_single_product_sidebar',
	) ) );
	$wp_customize->add_setting( 'preventive_maintenance_related_product', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'preventive_maintenance_sanitize_checkbox',
	) );
	$wp_customize->add_control( new preventive_maintenance_Toggle_Control( $wp_customize, 'preventive_maintenance_related_product', array(
			'label'       => esc_html__( 'Show / Hide related product', 'preventive-maintenance' ),
			'section'     => 'woocommerce_product_catalog',
			'type'        => 'toggle',
			'settings'    => 'preventive_maintenance_related_product',
	) ) );
	
	// 404 PAGE
	$wp_customize->add_section('preventive_maintenance_404_page_section',array(
		'title'         => __('404 Page', 'preventive-maintenance'),
		'description'   => 'Here you can customize 404 Page content.',
	) );
	$wp_customize->add_setting('preventive_maintenance_not_found_title',array(
		'default'=> __('Oops! That page cant be found.','preventive-maintenance'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('preventive_maintenance_not_found_title',array(
		'label'	=> __('Edit Title','preventive-maintenance'),
		'section'=> 'preventive_maintenance_404_page_section',
		'type'=> 'text',
	));
	$wp_customize->add_setting('preventive_maintenance_not_found_text',array(
		'default'=> __('It looks like nothing was found at this location. Maybe try a search?','preventive-maintenance'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('preventive_maintenance_not_found_text',array(
		'label'	=> __('Edit Text','preventive-maintenance'),
		'section'=> 'preventive_maintenance_404_page_section',
		'type'=> 'text'
	));
}
add_action( 'customize_register', 'preventive_maintenance_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Preventive Maintenance 1.0
 * @see preventive_maintenance_customize_register()
 *
 * @return void
 */
function preventive_maintenance_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Preventive Maintenance 1.0
 * @see preventive_maintenance_customize_register()
 *
 * @return void
 */
function preventive_maintenance_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'PREVENTIVE_MAINTENANCE_PRO_THEME_NAME' ) ) {
	define( 'PREVENTIVE_MAINTENANCE_PRO_THEME_NAME', esc_html__( 'Maintenance Pro Theme', 'preventive-maintenance' ));
}
if ( ! defined( 'PREVENTIVE_MAINTENANCE_PRO_THEME_URL' ) ) {
	define( 'PREVENTIVE_MAINTENANCE_PRO_THEME_URL', esc_url('https://www.themespride.com/products/maintenance-services-wordpress-theme/'));
}
if ( ! defined( 'PREVENTIVE_MAINTENANCE_DOCS_URL' ) ) {
	define( 'PREVENTIVE_MAINTENANCE_DOCS_URL', esc_url('https://page.themespride.com/demo/docs/preventive-maintenance/'));
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Preventive_Maintenance_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Preventive_Maintenance_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Preventive_Maintenance_Customize_Section_Pro(
				$manager,
				'preventive_maintenance_section_pro',
				array(
					'priority'   => 9,
					'title'    => PREVENTIVE_MAINTENANCE_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'preventive-maintenance' ),
					'pro_url'  => esc_url( PREVENTIVE_MAINTENANCE_PRO_THEME_URL, 'preventive-maintenance' ),
				)
			)
		);

	        // Register sections.
		$manager->add_section(
			new Preventive_Maintenance_Customize_Section_Pro(
				$manager,
				'preventive_maintenance_documentation',
				array(
					'priority'   => 500,
					'title'    => esc_html__( 'Theme Documentation', 'preventive-maintenance' ),
					'pro_text' => esc_html__( 'Click Here', 'preventive-maintenance' ),
					'pro_url'  => esc_url( PREVENTIVE_MAINTENANCE_DOCS_URL, 'preventive-maintenance'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'preventive-maintenance-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'preventive-maintenance-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Preventive_Maintenance_Customize::get_instance();
