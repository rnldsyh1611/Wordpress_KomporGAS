<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Blogprise_Heading extends Blogprise_Widget_Base {
	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'blogprise_heading_widget';
		$this->widget_description = __( 'Displays widget heading style to match the theme styles. It helps if you\'re using blocks in widgets but want a heading style of the theme.', 'blogprise' );
		$this->widget_id          = 'blogprise_heading_widget';
		$this->widget_name        = __( 'Blogprise: Heading', 'blogprise' );
		$this->settings           = array(
			'title'               => array(
				'type'  => 'text',
				'label' => __( 'Title', 'blogprise' ),
			),
			'subtitle'            => array(
				'type'  => 'text',
				'label' => __( 'Subtitle', 'blogprise' ),
			),
			'heading_style'       => array(
				'type'    => 'select',
				'label'   => __( 'Heading Style', 'blogprise' ),
				'options' => blogprise_get_title_styles(),
				'std'     => 'style_1',
			),
			'heading_alignment'   => array(
				'type'    => 'select',
				'label'   => __( 'Heading Alignment', 'blogprise' ),
				'options' => blogprise_get_title_alignments(),
				'std'     => 'left',
			),
			'inverted_text_color' => array(
				'type'  => 'checkbox',
				'label' => __( 'Inverted Text Color', 'blogprise' ),
				'desc'  => __( 'Can be used if you have dark background and want lighter color on the text.', 'blogprise' ),
				'std'   => false,
			),
			'accent_color'        => array(
				'type'  => 'color',
				'label' => __( 'Accent Color', 'blogprise' ),
				'std'   => '',
				'desc'  => __( 'Choose if you want different accent color. Only works on heading styles that use accent color.', 'blogprise' ),
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

		$heading_style     = isset( $instance['heading_style'] ) ? $instance['heading_style'] : $this->settings['heading_style']['std'];
		$heading_alignment = isset( $instance['heading_alignment'] ) ? $instance['heading_alignment'] : $this->settings['heading_alignment']['std'];

		$wrapper_class  = 'saga-element-header ' . $heading_style;
		$wrapper_class .= ' saga-title-align-' . $heading_alignment;

		$subtitle            = isset( $instance['subtitle'] ) ? $instance['subtitle'] : '';
		$inverted_text_color = isset( $instance['inverted_text_color'] ) ? $instance['inverted_text_color'] : $this->settings['inverted_text_color']['std'];

		if ( $inverted_text_color ) {
			$wrapper_class .= ' blogprise-inverted-title-color';
		}

		echo wp_kses_post( $before_widget );

		if ( $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base ) ) {

			$widget_inline_styles = '';
			$widget_id            = isset( $args['widget_id'] ) ? $args['widget_id'] : '';

			if ( $widget_id ) {
				$accent_color = isset( $instance['accent_color'] ) ? $instance['accent_color'] : $this->settings['accent_color']['std'];
				if ( $accent_color ) {
					$widget_inline_styles .= "
						#{$widget_id} .saga-element-header.{$heading_style} {
							--heading-accent-color:{$accent_color} !important;
						}
					";
				}
				if ( $widget_inline_styles ) {
					echo '<style>' . wp_strip_all_tags( blogprise_refactor_css( $widget_inline_styles ) ) . '</style>';
				}
			}
			?>
			<div class="<?php echo esc_attr( $wrapper_class ); ?>">
				<div class="saga-element-title-wrapper">
					<h2 class="saga-element-title">
						<span><?php echo esc_html( $title ); ?></span>
					</h2>
				</div>
				<?php
				if ( $subtitle ) {
					?>
					<p class="saga-element-subtitle"><?php echo esc_html( $subtitle ); ?></p>
					<?php
				}
				?>
			</div>
			<?php
		}

		echo wp_kses_post( $after_widget );

		echo ob_get_clean();
	}
}
