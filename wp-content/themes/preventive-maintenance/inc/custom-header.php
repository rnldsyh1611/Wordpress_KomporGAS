<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Preventive Maintenance
 * @subpackage preventive_maintenance
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses preventive_maintenance_header_style()
 */
function preventive_maintenance_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'preventive_maintenance_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'flex-width'         	 => true,
    	'flex-height'            => true,
		'wp-head-callback'       => 'preventive_maintenance_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'preventive_maintenance_custom_header_setup' );

if ( ! function_exists( 'preventive_maintenance_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see preventive_maintenance_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'preventive_maintenance_header_style' );
function preventive_maintenance_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$preventive_maintenance_custom_css = "
        .headerbox,.header-img{
			background-image:url('".esc_url(get_header_image())."') !important;
			background-position: center top;
			background-size: cover;
		}";
	   	wp_add_inline_style( 'preventive-maintenance-style', $preventive_maintenance_custom_css );
	endif;
}
endif;
