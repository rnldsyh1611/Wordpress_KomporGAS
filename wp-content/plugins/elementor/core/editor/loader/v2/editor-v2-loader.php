<?php
namespace Elementor\Core\Editor\Loader\V2;

use Elementor\Core\Editor\Loader\Common\Editor_Common_Scripts_Settings;
use Elementor\Core\Editor\Loader\Editor_Base_Loader;
use Elementor\Core\Utils\Assets_Translation_Loader;
<<<<<<< HEAD
use Elementor\Core\Utils\Collection;
=======
>>>>>>> 221ebc616d24a224f325a1b5acdc1e837ccf3350
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Editor_V2_Loader extends Editor_Base_Loader {
	const APP_PACKAGE = 'editor';
	const ENV_PACKAGE = 'env';

	/**
<<<<<<< HEAD
	 * Packages that should only be registered, unless some other asset depends on them.
	 */
	const LIBS = [
		'editor-responsive',
		'editor-v1-adapters',
		self::ENV_PACKAGE,
		'icons',
		'locations',
		'query',
		'schema',
		'store',
		'ui',
		'utils',
		'wp-media',
	];

	/**
	 * Additional dependencies for packages that rely on global variables, rather than
	 * an explicit npm dependency (e.g. `window.elementor`, `window.wp`, etc.).
	 */
	const ADDITIONAL_DEPS = [
		'editor-v1-adapters' => [
			'elementor-web-cli',
		],
		'wp-media' => [
			'media-models',
		],
=======
	 * Packages that should be enqueued (the main app and the extensions of the app).
	 */
	const PACKAGES_TO_ENQUEUE = [
		// App
		self::APP_PACKAGE,

		// Extensions
		'editor-app-bar',
		'editor-documents',
		'editor-panels',
		'editor-responsive',
		'editor-site-navigation',
		'editor-v1-adapters',
	];

	/**
	 * Packages that should only be registered, unless some other asset depends on them.
	 */
	const LIBS = [
		self::ENV_PACKAGE,
		'editor-app-bar-ui',
		'icons',
		'locations',
		'query',
		'store',
		'ui',
>>>>>>> 221ebc616d24a224f325a1b5acdc1e837ccf3350
	];

	/**
	 * @return void
	 */
	public function init() {
		$packages = array_merge( $this->get_packages_to_enqueue(), self::LIBS );
<<<<<<< HEAD
		$packages_with_app = array_merge( $packages, [ self::APP_PACKAGE ] );

		foreach ( $packages_with_app as $package ) {
=======

		foreach ( $packages as $package ) {
>>>>>>> 221ebc616d24a224f325a1b5acdc1e837ccf3350
			$this->assets_config_provider->load( $package );
		}

		do_action( 'elementor/editor/v2/init' );
	}

	/**
	 * @return void
	 */
	public function register_scripts() {
		parent::register_scripts();

		$assets_url = $this->config->get( 'assets_url' );
		$min_suffix = $this->config->get( 'min_suffix' );

		foreach ( $this->assets_config_provider->all() as $package => $config ) {
			if ( self::ENV_PACKAGE === $package ) {
				wp_register_script(
					'elementor-editor-environment-v2',
					"{$assets_url}js/editor-environment-v2{$min_suffix}.js",
					[ $config['handle'] ],
					ELEMENTOR_VERSION,
					true
				);
			}

			if ( static::APP_PACKAGE === $package ) {
				wp_register_script(
					'elementor-editor-loader-v2',
					"{$assets_url}js/editor-loader-v2{$min_suffix}.js",
					[ 'elementor-editor', $config['handle'] ],
					ELEMENTOR_VERSION,
					true
				);
			}

<<<<<<< HEAD
			$additional_deps = self::ADDITIONAL_DEPS[ $package ] ?? [];
			$deps = array_merge( $config['deps'], $additional_deps );

			wp_register_script(
				$config['handle'],
				"{$assets_url}js/packages/{$package}/{$package}{$min_suffix}.js",
				$deps,
=======
			wp_register_script(
				$config['handle'],
				"{$assets_url}js/packages/{$package}/{$package}{$min_suffix}.js",
				$config['deps'],
>>>>>>> 221ebc616d24a224f325a1b5acdc1e837ccf3350
				ELEMENTOR_VERSION,
				true
			);
		}

		$packages_handles = $this->assets_config_provider->pluck( 'handle' )->all();

		Assets_Translation_Loader::for_handles( $packages_handles, 'elementor' );

		do_action( 'elementor/editor/v2/scripts/register' );
	}

	/**
	 * @return void
	 */
	public function enqueue_scripts() {
		do_action( 'elementor/editor/v2/scripts/enqueue/before' );

<<<<<<< HEAD
		parent::enqueue_scripts();

=======
>>>>>>> 221ebc616d24a224f325a1b5acdc1e837ccf3350
		wp_enqueue_script( 'elementor-editor-environment-v2' );

		$env_config = $this->assets_config_provider->get( self::ENV_PACKAGE );

		if ( $env_config ) {
			$client_env = apply_filters( 'elementor/editor/v2/scripts/env', [] );

			Utils::print_js_config(
				$env_config['handle'],
				'elementorEditorV2Env',
				$client_env
			);
		}

<<<<<<< HEAD
		$packages_with_app = array_merge( $this->get_packages_to_enqueue(), [ self::APP_PACKAGE ] );

		foreach ( $this->assets_config_provider->only( $packages_with_app ) as $config ) {
=======
		foreach ( $this->assets_config_provider->only( $this->get_packages_to_enqueue() ) as $config ) {
>>>>>>> 221ebc616d24a224f325a1b5acdc1e837ccf3350
			wp_enqueue_script( $config['handle'] );
		}

		do_action( 'elementor/editor/v2/scripts/enqueue' );

		Utils::print_js_config(
			'elementor-editor',
			'ElementorConfig',
			Editor_Common_Scripts_Settings::get()
		);

		// Must be last.
		wp_enqueue_script( 'elementor-editor-loader-v2' );

		do_action( 'elementor/editor/v2/scripts/enqueue/after' );
	}

	/**
	 * @return void
	 */
	public function register_styles() {
		parent::register_styles();

		$assets_url = $this->config->get( 'assets_url' );
		$min_suffix = $this->config->get( 'min_suffix' );

<<<<<<< HEAD
		foreach ( $this->get_styles() as $style ) {
			wp_register_style(
				"elementor-{$style}",
				"{$assets_url}css/{$style}{$min_suffix}.css",
				[ 'elementor-editor' ],
				ELEMENTOR_VERSION
			);
		}
=======
		wp_register_style(
			'elementor-editor-v2-overrides',
			"{$assets_url}css/editor-v2-overrides{$min_suffix}.css",
			[ 'elementor-editor' ],
			ELEMENTOR_VERSION
		);
>>>>>>> 221ebc616d24a224f325a1b5acdc1e837ccf3350

		do_action( 'elementor/editor/v2/styles/register' );
	}

	/**
	 * @return void
	 */
	public function enqueue_styles() {
		parent::enqueue_styles();

<<<<<<< HEAD
		foreach ( $this->get_styles() as $style ) {
			wp_enqueue_style( "elementor-{$style}" );
		}
=======
		wp_enqueue_style( 'elementor-editor-v2-overrides' );
>>>>>>> 221ebc616d24a224f325a1b5acdc1e837ccf3350

		do_action( 'elementor/editor/v2/styles/enqueue' );
	}

	/**
	 * @return void
	 */
	public function print_root_template() {
		// Exposing the path for the view part to render the body of the editor template.
		$body_file_path = __DIR__ . '/templates/editor-body-v2.view.php';

		include ELEMENTOR_PATH . 'includes/editor-templates/editor-wrapper.php';
	}

<<<<<<< HEAD
	public static function get_packages_to_enqueue() : array {
		return apply_filters( 'elementor/editor/v2/packages', [] );
	}

	private function get_styles() : array {
		$styles = apply_filters( 'elementor/editor/v2/styles', [] );

		return Collection::make( $styles )
			->unique()
			->all();
=======
	private function get_packages_to_enqueue() : array {
		return apply_filters( 'elementor/editor/v2/packages', self::PACKAGES_TO_ENQUEUE );
>>>>>>> 221ebc616d24a224f325a1b5acdc1e837ccf3350
	}
}
