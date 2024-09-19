<?php
namespace Elementor\Core\Page_Assets\Data_Managers;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Assets Data.
 *
 * @since 3.3.0
 */
class Widgets_Css extends Base {
	protected $content_type = 'css';

	protected $assets_category = 'widgets';

	protected function get_asset_content() {
<<<<<<< HEAD
		$asset_css_file_exists = $this->get_file_data( 'exists' );

		$widget_css = '';

		if ( $asset_css_file_exists ) {
			$asset_url = $this->get_config_data( 'file_url' );
			$widget_css = sprintf( '<link rel="stylesheet" href="%s">', $asset_url );
=======
		$asset_css_file_size = $this->get_file_data( 'size' );

		$widget_css = '';

		if ( $asset_css_file_size ) {
			// If the file size is larger than 8KB then calling the external CSS file, otherwise, printing inline CSS.
			if ( $asset_css_file_size > 8000 ) {
				$asset_url = $this->get_config_data( 'file_url' );

				$widget_css = sprintf( '<link rel="stylesheet" href="%s">', $asset_url );
			} else {
				$widget_css = $this->get_file_data( 'content' );
				$widget_css = sprintf( '<style>%s</style>', $widget_css );
			}
>>>>>>> 221ebc616d24a224f325a1b5acdc1e837ccf3350
		}

		return $widget_css;
	}
}
