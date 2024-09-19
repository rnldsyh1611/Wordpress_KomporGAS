<?php
/**
 * Beauty Spa Elementor manage the Customizer options of general panel.
 *
 * @subpackage beauty-parlour-elementor
 * @since 1.0 
 */
Kirki::add_field(
	'beauty_parlour_elementor_config', array(
		'type'        => 'checkbox',
		'settings'    => 'beauty_parlour_elementor_home_posts',
		'label'       => esc_attr__( 'Checked to hide latest posts in homepage.', 'beauty-parlour-elementor' ),
		'section'     => 'static_front_page',
		'default'     => true,
	)
);
