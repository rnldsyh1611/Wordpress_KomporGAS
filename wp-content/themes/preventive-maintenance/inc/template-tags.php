<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Preventive Maintenance
 * @subpackage preventive_maintenance
 */

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function preventive_maintenance_categorized_blog() {
	$preventive_maintenance_category_count = get_transient( 'preventive_maintenance_categories' );

	if ( false === $preventive_maintenance_category_count ) {
		// Create an array of all the categories that are attached to posts.
		$preventive_maintenance_categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$preventive_maintenance_category_count = count( $preventive_maintenance_categories );

		set_transient( 'preventive_maintenance_categories', $preventive_maintenance_category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $preventive_maintenance_category_count > 1;
}

if ( ! function_exists( 'preventive_maintenance_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Preventive Maintenance
 */
function preventive_maintenance_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Flush out the transients used in preventive_maintenance_categorized_blog.
 */
function preventive_maintenance_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'preventive_maintenance_categories' );
}
add_action( 'edit_category', 'preventive_maintenance_category_transient_flusher' );
add_action( 'save_post',     'preventive_maintenance_category_transient_flusher' );
