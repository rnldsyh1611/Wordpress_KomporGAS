<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Blogprise_Ads_Code extends Blogprise_Widget_Base {
	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'blogprise_ads_code_widget';
		$this->widget_description = __( 'Advertisements or codes widget.', 'blogprise' );
		$this->widget_id          = 'blogprise_ads_code_widget';
		$this->widget_name        = __( 'Blogprise: Ads Code', 'blogprise' );
		$this->settings           = array(
			'ads_code'        => array(
				'type'  => 'textarea',
				'label' => __( 'Ads Code', 'blogprise' ),
			),
			'align'           => array(
				'type'    => 'select',
				'label'   => __( 'Alignment', 'blogprise' ),
				'options' => array(
					'left'    => __( 'Left', 'blogprise' ),
					'center'  => __( 'Center', 'blogprise' ),
					'right'   => __( 'Right', 'blogprise' ),
					'strecth' => __( 'Stretch', 'blogprise' ),
				),
				'std'     => 'center',
			),
			'hide_on_desktop' => array(
				'type'  => 'checkbox',
				'label' => __( 'Hide on Desktop', 'blogprise' ),
				'std'   => false,
			),
			'hide_on_tablet'  => array(
				'type'  => 'checkbox',
				'label' => __( 'Hide on Tablet', 'blogprise' ),
				'std'   => false,
			),
			'hide_on_mobile'  => array(
				'type'  => 'checkbox',
				'label' => __( 'Hide on Mobile', 'blogprise' ),
				'std'   => false,
			),
		);

		parent::__construct();
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

		$before_widget = $args['before_widget'];
		$after_widget  = $args['after_widget'];

		echo wp_kses_post( $before_widget );

		$ad_class = '';
		if ( isset( $instance['hide_on_desktop'] ) && $instance['hide_on_desktop'] ) {
			$ad_class .= ' hide-on-desktop';
		}
		if ( isset( $instance['hide_on_tablet'] ) && $instance['hide_on_tablet'] ) {
			$ad_class .= ' hide-on-tablet';
		}
		if ( isset( $instance['hide_on_mobile'] ) && $instance['hide_on_mobile'] ) {
			$ad_class .= ' hide-on-mobile';
		}

		do_action( 'blogprise_before_ads_code' );

		if ( isset( $instance['ads_code'] ) && $instance['ads_code'] ) {
			?>

			<div class="blogprise-ads-code-widget<?php echo esc_attr( $ad_class ); ?>" style="justify-items:<?php echo esc_attr( $instance['align'] ); ?>;" >
				<?php echo wp_kses_post( $instance['ads_code'] ); ?>
			</div>

			<?php
		}

		do_action( 'blogprise_after_ads_code' );

		echo wp_kses_post( $after_widget );

		echo ob_get_clean();
	}
}
