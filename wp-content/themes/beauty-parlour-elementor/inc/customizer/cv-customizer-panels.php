<?php
/**
 * Beauty Spa Elementor manage the Customizer panels.
 *
 * @subpackage beauty-parlour-elementor
 * @since 1.0 
 */

/**
 * General Settings Panel
 */
Kirki::add_panel( 'beauty_parlour_elementor_general_panel', array(
	'priority' => 10,
	'title'    => __( 'General Settings', 'beauty-parlour-elementor' ),
) );

/**
 * Beauty Spa Elementor Options
 */
Kirki::add_panel( 'beauty_parlour_elementor_options_panel', array(
	'priority' => 20,
	'title'    => __( 'Beauty Spa Elementor Theme Options', 'beauty-parlour-elementor' ),
) );