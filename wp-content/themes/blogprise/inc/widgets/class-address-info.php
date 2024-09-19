<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Blogprise_Address_info extends Blogprise_Widget_Base {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'blogprise_address_info_widget';
		$this->widget_description = __( 'Displays address and contact info', 'blogprise' );
		$this->widget_id          = 'blogprise_address_info';
		$this->widget_name        = __( 'Blogprise: Address Info', 'blogprise' );
		$this->settings           = array(
			'title'                   => array(
				'type'  => 'text',
				'label' => __( 'Title', 'blogprise' ),
			),
			'desc'                    => array(
				'type'  => 'textarea',
				'label' => __( 'Description', 'blogprise' ),
			),
			'address'                 => array(
				'type'  => 'textarea',
				'label' => __( 'Address', 'blogprise' ),
			),
			'phone'                   => array(
				'type'  => 'text',
				'label' => __( 'Phone', 'blogprise' ),
			),
			'fax'                     => array(
				'type'  => 'text',
				'label' => __( 'Fax', 'blogprise' ),
			),
			'email'                   => array(
				'type'  => 'text',
				'label' => __( 'Email', 'blogprise' ),
			),
			'widget_settings_heading' => array(
				'type'  => 'heading',
				'label' => __( 'Widget Settings', 'blogprise' ),
			),
			'style'                   => array(
				'type'    => 'select',
				'label'   => __( 'Style', 'blogprise' ),
				'options' => array(
					'style_1' => __( 'Stack', 'blogprise' ),
					'style_2' => __( 'Inline', 'blogprise' ),
				),
				'std'     => 'style_1',
			),
			'show_icons'              => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Icons', 'blogprise' ),
				'std'   => false,
			),
			'show_label'              => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Label', 'blogprise' ),
				'std'   => false,
			),
			'icon_color'              => array(
				'type'  => 'color',
				'label' => __( 'Icon Color', 'blogprise' ),
				'std'   => '',
			),
			'inverted_block_color'    => array(
				'type'  => 'checkbox',
				'label' => __( 'Inverted Color', 'blogprise' ),
				'desc'  => __( 'Can be used if you have dark background and want lighter color on the text.', 'blogprise' ),
				'std'   => false,
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

		do_action( 'blogprise_before_address_info' );

		$widget_class = '';

		$desc       = isset( $instance['desc'] ) ? $instance['desc'] : '';
		$address    = isset( $instance['address'] ) ? $instance['address'] : '';
		$phone      = isset( $instance['phone'] ) ? $instance['phone'] : '';
		$fax        = isset( $instance['fax'] ) ? $instance['fax'] : '';
		$email      = isset( $instance['email'] ) ? $instance['email'] : '';
		$show_icons = isset( $instance['show_icons'] ) ? $instance['show_icons'] : $this->settings['show_icons']['std'];
		$show_label = isset( $instance['show_label'] ) ? $instance['show_label'] : $this->settings['show_label']['std'];
		$style      = isset( $instance['style'] ) ? $instance['style'] : $this->settings['inverted_block_color']['std'];

		$inverted_block_color = isset( $instance['inverted_block_color'] ) ? $instance['inverted_block_color'] : $this->settings['inverted_block_color']['std'];

		$widget_class .= ' ' . $style;

		// Inverted Color.
		if ( $inverted_block_color ) {
			$widget_class .= ' saga-block-inverted-color';
		}

		$widget_inline_styles = '';
		$widget_id            = isset( $args['widget_id'] ) ? $args['widget_id'] : '';

		if ( $widget_id ) {
			$icon_color = isset( $instance['icon_color'] ) ? $instance['icon_color'] : $this->settings['icon_color']['std'];
			if ( $icon_color ) {
				$widget_inline_styles .= "
					#{$widget_id} .blogprise-address-info-widget svg {
						fill:{$icon_color} !important;
					}
				";
			}
			if ( $widget_inline_styles ) {
				echo '<style>' . wp_strip_all_tags( blogprise_refactor_css( $widget_inline_styles ) ) . '</style>';
			}
		}
		?>

		<div class="blogprise-address-info-widget <?php echo esc_attr( $widget_class ); ?>">
			<?php if ( ! empty( $desc ) ) : ?>
				<div class="blogprise-address-desc">
					<?php echo wp_kses_post( nl2br( $desc ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</div>
			<?php endif; ?>
			<address>
				<?php if ( ! empty( $address ) ) : ?>
					<div class="blogprise-address-field">
						<?php
						if ( $show_icons ) :
							blogprise_the_theme_svg( 'geo-alt-fill' );
						endif;
						if ( $show_label ) :
							esc_html_e('Address:', 'blogprise');
						endif;
						?>
						<span class="address-meta"><?php echo wp_kses_post( nl2br( $address ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $phone ) ) : ?>
					<div class="blogprise-address-field">
						<?php
						if ( $show_icons ) :
							blogprise_the_theme_svg( 'phone' );
						endif;
						if ( $show_label ) :
							esc_html_e('Phone:', 'blogprise');
						endif;
						?>
						<span class="address-meta">
							<a href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', esc_attr( $phone ) ) ); ?>" ><?php echo esc_html( $phone ); ?></a>
						</span>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $fax ) ) : ?>
					<div class="blogprise-address-field">
						<?php
						if ( $show_icons ) :
							blogprise_the_theme_svg( 'printer-fill' );
						endif;
						if ( $show_label ) :
							esc_html_e('Fax:', 'blogprise');
						endif;
						?>
						<span class="address-meta"><?php echo esc_html( $fax ); ?></span>
					</div>
				<?php endif; ?>
				<?php
				if ( ! empty( $email ) ) :
					$email = sanitize_email( $email );
					?>
					<div class="blogprise-address-field">
						<?php
						if ( $show_icons ) :
							blogprise_the_theme_svg( 'envelope-fill' );
						endif;
						if ( $show_label ) :
							esc_html_e('E-mail:', 'blogprise');
						endif;
						?>
						<span class="address-meta">
							<a href="mailto:<?php echo esc_attr( antispambot( $email ) ); ?>" ><?php echo esc_html( antispambot( $email ) ); ?></a>
						</span>
					</div>
				<?php endif; ?>
			</address>
		</div>
		<?php

		do_action( 'blogprise_after_address_info' );

		$this->widget_end( $args );

		echo ob_get_clean();
	}

	public function enqueue_assets() {
		if ( is_active_widget( false, false, $this->id_base ) ) {
			$file_prefix = is_rtl() ? '-rtl' : '';
			$css_file    = get_template_directory() . '/inc/widgets/css/address-info' . $file_prefix . '.css';
			if ( file_exists( $css_file ) ) {
				$styles = wp_strip_all_tags( file_get_contents( $css_file ) );
				wp_add_inline_style( 'blogprise-style', $styles );
			}
		}
	}
}
