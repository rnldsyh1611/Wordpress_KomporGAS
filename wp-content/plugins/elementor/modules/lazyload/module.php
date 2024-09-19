<?php
namespace Elementor\Modules\LazyLoad;

use Elementor\Core\Base\Module as BaseModule;
<<<<<<< HEAD
=======
use Elementor\Core\Experiments\Manager as Experiments_Manager;
>>>>>>> 221ebc616d24a224f325a1b5acdc1e837ccf3350
use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Module extends BaseModule {

<<<<<<< HEAD
=======
	const EXPERIMENT_NAME = 'e_lazyload';

>>>>>>> 221ebc616d24a224f325a1b5acdc1e837ccf3350
	public function get_name() {
		return 'lazyload';
	}

<<<<<<< HEAD
=======
	public static function get_experimental_data() {
		return [
			'name' => static::EXPERIMENT_NAME,
			'title' => esc_html__( 'Lazy Load Background Images', 'elementor' ),
			'tag' => esc_html__( 'Performance', 'elementor' ),
			'description' => esc_html__( 'Lazy loading images that are not in the viewport improves initial page load performance and user experience. By activating this experiment all background images except the first one on your page will be lazy loaded to improve your LCP score', 'elementor' ),
			'release_status' => Experiments_Manager::RELEASE_STATUS_STABLE,
			'default' => Experiments_Manager::STATE_ACTIVE,
			'generator_tag' => true,
		];
	}

>>>>>>> 221ebc616d24a224f325a1b5acdc1e837ccf3350
	public function __construct() {
		parent::__construct();

		add_action( 'init', [ $this, 'init' ] );
	}

	public function init() {
<<<<<<< HEAD
		if ( ! $this->is_lazy_load_background_images_enabled() ) {
			return;
		}

=======
>>>>>>> 221ebc616d24a224f325a1b5acdc1e837ccf3350
		add_action( 'wp_head', function() {
			if ( ! $this->should_lazyload() ) {
				return;
			}
			?>
			<style>
				.e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload),
				.e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload) * {
					background-image: none !important;
				}
				@media screen and (max-height: 1024px) {
					.e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload),
					.e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload) * {
						background-image: none !important;
					}
				}
				@media screen and (max-height: 640px) {
					.e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload),
					.e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload) * {
						background-image: none !important;
					}
				}
			</style>
			<?php
		} );

		add_action( 'wp_footer', function() {
			if ( ! $this->should_lazyload() ) {
				return;
			}
			?>
			<script type='text/javascript'>
				const lazyloadRunObserver = () => {
					const lazyloadBackgrounds = document.querySelectorAll( `.e-con.e-parent:not(.e-lazyloaded)` );
					const lazyloadBackgroundObserver = new IntersectionObserver( ( entries ) => {
						entries.forEach( ( entry ) => {
							if ( entry.isIntersecting ) {
								let lazyloadBackground = entry.target;
								if( lazyloadBackground ) {
									lazyloadBackground.classList.add( 'e-lazyloaded' );
								}
								lazyloadBackgroundObserver.unobserve( entry.target );
							}
						});
					}, { rootMargin: '200px 0px 200px 0px' } );
					lazyloadBackgrounds.forEach( ( lazyloadBackground ) => {
						lazyloadBackgroundObserver.observe( lazyloadBackground );
					} );
				};
				const events = [
					'DOMContentLoaded',
					'elementor/lazyload/observe',
				];
				events.forEach( ( event ) => {
					document.addEventListener( event, lazyloadRunObserver );
				} );
			</script>
			<?php
		} );
	}

	private function should_lazyload() {
		return ! is_admin() && ! Plugin::$instance->preview->is_preview_mode() && ! Plugin::$instance->editor->is_edit_mode();
	}
<<<<<<< HEAD

	private static function is_lazy_load_background_images_enabled(): bool {
		return '1' === get_option( 'elementor_lazy_load_background_images', '1' );
	}
=======
>>>>>>> 221ebc616d24a224f325a1b5acdc1e837ccf3350
}
