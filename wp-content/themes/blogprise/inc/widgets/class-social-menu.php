<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Blogprise_Social_Menu extends Blogprise_Widget_Base {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->widget_cssclass    = 'widget_blogprise_social_menu';
		$this->widget_description = __( 'Displays social menu if you have set it.', 'blogprise' );
		$this->widget_id          = 'blogprise_social_menu';
		$this->widget_name        = __( 'Blogprise: Social Menu', 'blogprise' );
		$this->settings           = array(
			'title'      => array(
				'type'  => 'text',
				'label' => __( 'Title', 'blogprise' ),
			),
			'color'      => array(
				'type'    => 'select',
				'label'   => __( 'Social Links Color', 'blogprise' ),
				'options' => array(
					'theme_color' => __( 'Use Theme Color', 'blogprise' ),
					'brand_color' => __( 'Use Brand Color', 'blogprise' ),
				),
				'std'     => 'theme_color',
			),
			'style'      => array(
				'type'    => 'select',
				'label'   => __( 'Style', 'blogprise' ),
				'options' => blogprise_get_social_links_styles(),
				'std'     => 'style_1',
			),
			'show_label' => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Label', 'blogprise' ),
				'std'   => false,
			),
			'column'     => array(
				'type'    => 'select',
				'label'   => __( 'Column', 'blogprise' ),
				'desc'    => __( 'Will only work when label is enabled from above and there is enough space to display the columns.', 'blogprise' ),
				'options' => array(
					'one'   => __( 'One', 'blogprise' ),
					'two'   => __( 'Two', 'blogprise' ),
					'three' => __( 'Three', 'blogprise' ),
				),
				'std'     => 'two',
			),
			'align'      => array(
				'type'    => 'select',
				'label'   => __( 'Alignment', 'blogprise' ),
				'options' => array(
					'left'   => __( 'Left', 'blogprise' ),
					'center' => __( 'Center', 'blogprise' ),
					'right'  => __( 'Right', 'blogprise' ),
				),
				'std'     => 'left',
			),
		);

		parent::__construct();

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
	}

	/**
	 * Output widget.
	 *
	 * @see WP_Widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		ob_start();

		$this->widget_start( $args, $instance );

		do_action( 'blogprise_before_social_menu' );

		$wrapper_class = isset( $instance['align'] ) ? $instance['align'] : $this->settings['align']['std'];

		?>
		<div class="blogprise-social-menu-widget menu-align-<?php echo esc_attr( $wrapper_class ); ?>">
			<?php

			if ( has_nav_menu( 'social-menu' ) ) {

				$social_link_class  = ' reset-list-style blogprise-social-icons ';
				$social_link_style  = isset( $instance['style'] ) ? $instance['style'] : $this->settings['style']['std'];
				$social_link_style .= blogprise_get_social_icons_class( $social_link_style );
				$social_link_color  = isset( $instance['color'] ) ? $instance['color'] : $this->settings['color']['std'];

				$social_link_class .= $social_link_style . ' ' . $social_link_color;

				$label_class = 'screen-reader-text';
				$show_label  = isset( $instance['show_label'] ) ? $instance['show_label'] : $this->settings['show_label']['std'];
				if ( $show_label ) {
					$label_class        = 'em-social-menu-label';
					$social_link_class .= ' has-social-menu-label';
					$column             = isset( $instance['column'] ) ? $instance['column'] : $this->settings['column']['std'];
					$social_link_class .= ' em-flex-col-' . $column;
				}

				wp_nav_menu(
					array(
						'theme_location'  => 'social-menu',
						'container_class' => 'social-navigation',
						'fallback_cb'     => false,
						'depth'           => 1,
						'menu_class'      => $social_link_class,
						'link_before'     => '<span class="' . $label_class . '">',
						'link_after'      => '</span>',
					)
				);
			} else {
				esc_html_e( 'Social menu is not set. You need to create menu and assign it to Social Menu on Menu Settings.', 'blogprise' );
			}
			?>
		</div>
		<?php

		do_action( 'blogprise_after_social_menu' );

		$this->widget_end( $args );

		echo ob_get_clean();
	}

	public function enqueue_assets() {
		if ( is_active_widget( false, false, $this->id_base ) ) {
			$file_prefix = is_rtl() ? '-rtl' : '';
			$css_file = get_template_directory() . '/inc/widgets/css/social-menu' . $file_prefix . '.css';
			if ( file_exists( $css_file ) ) {
				$styles = wp_strip_all_tags( file_get_contents( $css_file ) );
				wp_add_inline_style( 'blogprise-style', $styles );
			}
		}
	}
}
