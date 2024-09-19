<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class beauty_parlour_elementor_Customize {

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
		require_once( trailingslashit( get_template_directory() ) . '/inc/custom-addition/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'beauty_parlour_elementor_Customize_Section_Pro' );

		$manager->add_section(
			new beauty_parlour_elementor_Customize_Section_Pro(
				$manager,
				'beauty-parlour-elementor-demo',
				array(
					'title'    => esc_html__( 'Theme Demo', 'beauty-parlour-elementor' ),
					'pro_text' => esc_html__( 'Theme Demo', 'beauty-parlour-elementor' ),
					'pro_url'  => 'https://testerwp.com/elementor-wp/beauty-parlour-elementor/',
					'priority'  => 0
				)
			)
		);

		// upgrade sections.
		$manager->add_section(
			new beauty_parlour_elementor_Customize_Section_Pro(
				$manager,
				'upgrade-pros',
				array(
					'title'    => esc_html__( 'Test Pro Version for free', 'beauty-parlour-elementor'),
					'pro_text' => esc_html__( 'Click Here', 'beauty-parlour-elementor' ),
					'pro_url'  => 'https://testerwp.com/premium-wordpress-theme-trail/',
					'priority'  => 0
				)
			)
		);
 

	}
	public function enqueue_control_scripts() {
		wp_enqueue_script( 'beauty-parlour-elementor-customize-controls', trailingslashit( get_template_directory_uri() ) . '/inc/custom-addition/customize-controls.js', array( 'customize-controls' ) );
		wp_enqueue_style( 'beauty-parlour-elementor-customize-controls', trailingslashit( get_template_directory_uri() ) . '/inc/custom-addition/customize-controls.css' );
	}
}
beauty_parlour_elementor_Customize::get_instance();