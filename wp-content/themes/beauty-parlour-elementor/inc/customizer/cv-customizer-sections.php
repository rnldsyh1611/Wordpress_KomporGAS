<?php
/**
 * Beauty Spa Elementor manage the Customizer sections.
 *
 * @subpackage beauty-parlour-elementor
 * @since 1.0 
 */

/**
 * Top Header Options
 */
Kirki::add_section( 'beauty_parlour_elementor_top_header_section_content', array(
	'title'    => __( 'Top Header Options', 'beauty-parlour-elementor' ),
	'panel'    => 'beauty_parlour_elementor_options_panel',
	'description' => __( 'Personalize the settings top header.', 'beauty-parlour-elementor' ),
	'priority' => 5,
) );

/**
 * General Options
 */
Kirki::add_section( 'beauty_parlour_elementor_general_section_content', array(
	'title'    => __( 'General Options', 'beauty-parlour-elementor' ),
	'panel'    => 'beauty_parlour_elementor_options_panel',
	'description' => __( 'Personalize the settings of your theme.', 'beauty-parlour-elementor' ),
	'priority' => 8,
) );

/**
 * Layout Options
 */
Kirki::add_section( 'beauty_parlour_elementor_layout_section_content', array(
	'title'    => __( 'Layout Options', 'beauty-parlour-elementor' ),
	'panel'    => 'beauty_parlour_elementor_options_panel',
	'description' => __( 'Personalize the layout settings of your theme.', 'beauty-parlour-elementor' ),
	'priority' => 10,
) );

/**
 * Blog Post Options
 */
Kirki::add_section( 'beauty_parlour_elementor_blog_post_section_content', array(
	'title'    => __( 'Blog Post Options', 'beauty-parlour-elementor' ),
	'panel'    => 'beauty_parlour_elementor_options_panel',
	'description' => __( 'Setting will also apply on archieve and search page.', 'beauty-parlour-elementor' ),
	'priority' => 12,
) );

/**
 * Single Post Options
 */
Kirki::add_section( 'beauty_parlour_elementor_single_post_section_content', array(
	'title'    => __( 'Single Post Options', 'beauty-parlour-elementor' ),
	'panel'    => 'beauty_parlour_elementor_options_panel',
	'description' => __( 'Setting will apply on the content of single posts.', 'beauty-parlour-elementor' ),
	'priority' => 14,
) );

/**
 * Footer Options
 */
Kirki::add_section( 'beauty_parlour_elementor_footer_section_content', array(
	'title'    => __( 'Footer Options', 'beauty-parlour-elementor' ),
	'panel'    => 'beauty_parlour_elementor_options_panel',
	'description' => __( 'Personalize the footer settings of your theme.', 'beauty-parlour-elementor' ),
	'priority' => 16,
) );

/**
 * Advance Options
 */
Kirki::add_section( 'beauty_parlour_elementor_advance_option_content', array(
	'title'    => __( 'Advance Options', 'beauty-parlour-elementor' ),
	'panel'    => 'beauty_parlour_elementor_options_panel',
	'description' => __( 'Personalize the Advance settings of your theme.', 'beauty-parlour-elementor' ),
	'priority' => 18,
) );