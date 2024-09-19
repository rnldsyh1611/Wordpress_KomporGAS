<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Adds Blogprise_Author_Info widget.
 */
class Blogprise_Author_Info extends WP_Widget {

	public $social_networks;

	/**
	 * Sets up a new widget instance.
	 *
	 * @since 1.0.0
	 */
	function __construct() {
		parent::__construct(
			'blogprise_author_info_widget',
			esc_html__( 'Blogprise: Author Info', 'blogprise' ),
			array( 'description' => esc_html__( 'Displays author short info.', 'blogprise' ) )
		);

		$this->social_networks = apply_filters(
			'blogprise_author_widget_social_networks',
			array(
				'facebook',
				'twitter',
				'linkedin',
				'instagram',
				'pinterest',
				'youtube',
				'tiktok',
				'twitch',
				'vk',
				'whatsapp',
				'amazon',
				'codepen',
				'dropbox',
				'flickr',
				'vimeo',
				'spotify',
				'github',
				'reddit',
				'skype',
				'soundcloud',
			)
		);

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
	}

	/**
	 * Outputs the content for the current widget instance.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args  Display arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		$style               = isset( $instance['style'] ) ? $instance['style'] : 'style_1';
		$image_border_radius = isset( $instance['image_border_radius'] ) ? (bool) $instance['image_border_radius'] : false;

		$image_size = 'blogprise-medium-img';
		if ( $image_border_radius ) {
			$image_size = 'blogprise-square-img';
			$style     .= ' rd-visible';
		}

		$social_link_class  = ' reset-list-style blogprise-social-icons ';
		$social_link_style  = isset( $instance['social_links_style'] ) ? $instance['social_links_style'] : 'style_1';
		$social_link_style .= blogprise_get_social_icons_class( $social_link_style );
		$social_link_color  = isset( $instance['social_links_color'] ) ? $instance['social_links_color'] : 'theme_color';

		$social_link_class .= $social_link_style . ' ' . $social_link_color;

		$wrapper_class = $style;

		$inverted_block_color = isset( $instance['inverted_block_color'] ) ? (bool) $instance['inverted_block_color'] : false;
		// Inverted Color.
		if ( $inverted_block_color ) {
			$wrapper_class .= ' saga-block-inverted-color';
		}

		do_action( 'blogprise_before_author_info' );
		?>
		<div class="blogprise-author-info-widget <?php echo esc_attr( $wrapper_class ); ?>">
			<?php
			if ( isset( $instance['author_img'] ) && $instance['author_img'] ) {
				?>
				<div class="author-image">
					<?php echo wp_get_attachment_image( absint( $instance['author_img'] ), $image_size, '', array( 'class' => 'img-responsive' ) ); ?>
				</div>
				<?php
			}
			?>
			<div class="author-details">
				<?php
				if ( isset( $instance['author_name'] ) && $instance['author_name'] ) {
					?>
					<h3 class="author-name"><?php echo esc_html( $instance['author_name'] ); ?></h3>
					<?php
				}
				?>
				<?php
				$author_pos = isset( $instance['author_pos'] ) ? $instance['author_pos'] : '';
				if ( $author_pos ) {
					?>
					<p class="author-position"><?php echo esc_html( $author_pos ); ?></p>
					<?php
				}
				?>

				<div class="author-desc">
					<?php
					if ( isset( $instance['author_desc'] ) && $instance['author_desc'] ) {
						echo wpautop( wp_kses_post( $instance['author_desc'] ) );
					}
					?>
				</div>

				<?php
				$social_networks = $this->social_networks;
				if ( ! empty( $social_networks ) && is_array( $social_networks ) ) {

					ob_start();

					foreach ( $social_networks as $network ) {
						if ( ! empty( $instance[ $network ] ) ) {
							$svg = Blogprise_SVG_Icons::get_social_link_svg( $instance[ $network ] );
							if ( $svg ) {
								?>
								<li>
									<a href="<?php echo esc_url( $instance[ $network ] ); ?>" target="_blank">
										<?php echo $svg; ?>
									</a>
								</li>
								<?php
							}
						}
					}

					$social_networks_list = ob_get_clean();

					if ( $social_networks_list ) {
						?>
						<div class="author-social">
							<ul class="<?php echo esc_attr( $social_link_class ); ?>">
								<?php echo $social_networks_list; ?>
							</ul>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
		<?php

		do_action( 'blogprise_after_author_info' );

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @since 1.0.0
	 *
	 * @param array $instance Previously saved values from database.
	 *
	 * @return void
	 */
	public function form( $instance ) {
		$title                      = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$author_name                = ! empty( $instance['author_name'] ) ? $instance['author_name'] : '';
		$author_pos                 = ! empty( $instance['author_pos'] ) ? $instance['author_pos'] : '';
		$author_desc                = ! empty( $instance['author_desc'] ) ? $instance['author_desc'] : '';
		$author_img                 = ! empty( $instance['author_img'] ) ? $instance['author_img'] : '';
		$enable_image_border_radius = ! empty( $instance['image_border_radius'] ) ? (bool) $instance['image_border_radius'] : false;
		$style                      = ! empty( $instance['style'] ) ? $instance['style'] : 'style_1';
		$social_links_color         = ! empty( $instance['social_links_color'] ) ? $instance['social_links_color'] : 'theme_color';
		$social_links_style         = ! empty( $instance['social_links_style'] ) ? $instance['social_links_style'] : 'style_1';
		$inverted_block_color       = ! empty( $instance['inverted_block_color'] ) ? (bool) $instance['inverted_block_color'] : false;
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
				<?php esc_attr_e( 'Title:', 'blogprise' ); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'author_name' ) ); ?>">
				<?php esc_attr_e( 'Author Name:', 'blogprise' ); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'author_name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'author_name' ) ); ?>" type="text" value="<?php echo esc_attr( $author_name ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'author_pos' ) ); ?>">
				<?php esc_attr_e( 'Author Position:', 'blogprise' ); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'author_pos' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'author_pos' ) ); ?>" type="text" value="<?php echo esc_attr( $author_pos ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'author_desc' ) ); ?>">
				<?php esc_attr_e( 'Short Description:', 'blogprise' ); ?>
			</label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'author_desc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'author_desc' ) ); ?>" rows="10"><?php echo esc_textarea( $author_desc ); ?></textarea>
		</p>
		<div>
			<label for="<?php echo esc_attr( $this->get_field_id( 'author_img' ) ); ?>">
				<?php esc_attr_e( 'Author Image:', 'blogprise' ); ?>
			</label>
			<?php
			$remove_button_style = ( $author_img ) ? 'display:inline-block' : 'display:none;';
			?>
			<div class="image-field">
				<div class="image-preview">
					<?php
					if ( ! empty( $author_img ) ) {
						$image_attributes = wp_get_attachment_image_src( $author_img );
						if ( $image_attributes ) {
							?>
							<img src="<?php echo esc_url( $image_attributes[0] ); ?>" />
							<?php
						}
					}
					?>
				</div>
				<p>
					<input type="hidden" class="img" name="<?php echo esc_attr( $this->get_field_name( 'author_img' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'author_img' ) ); ?>" value="<?php echo esc_attr( $author_img ); ?>" />
					<button type="button" class="upload_image_button button" data-uploader-title-txt="<?php esc_attr_e( 'Use Image', 'blogprise' ); ?>" data-uploader-btn-txt="<?php esc_attr_e( 'Choose an Image', 'blogprise' ); ?>">
						<?php esc_html_e( 'Upload/Add image', 'blogprise' ); ?>
					</button>
					<button type="button" class="remove_image_button button" style="<?php echo esc_attr( $remove_button_style ); ?>"><?php esc_html_e( 'Remove image', 'blogprise' ); ?></button>
				</p>
			</div>
		</div>
		<div>
			<p>
				<input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'image_border_radius' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'image_border_radius' ) ); ?>" value="1" <?php checked( $enable_image_border_radius, 1 ); ?>>
				<label for="<?php echo esc_attr( $this->get_field_id( 'image_border_radius' ) ); ?>">
					<?php esc_html_e( 'Enable Image Border Radius', 'blogprise' ); ?>
				</label>
			</p>
		</div>
		<div>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>">
					<span class="field-label"><?php esc_html_e( 'Author Info Style', 'blogprise' ); ?></span>
				</label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'style' ) ); ?>" class="widefat">
					<option value="style_1" <?php selected( 'style_1', $style ); ?>><?php esc_html_e( 'Style 1', 'blogprise' ); ?></option>
					<option value="style_2" <?php selected( 'style_2', $style ); ?>><?php esc_html_e( 'Style 2', 'blogprise' ); ?></option>
					<option value="style_3" <?php selected( 'style_3', $style ); ?>><?php esc_html_e( 'Style 3', 'blogprise' ); ?></option>
				</select>
			</p>
		</div>
		<div>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'social_links_color' ) ); ?>">
					<span class="field-label"><?php esc_html_e( 'Social Links Color', 'blogprise' ); ?></span>
				</label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'social_links_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'social_links_color' ) ); ?>" class="widefat">
					<option value="theme_color" <?php selected( 'theme_color', $social_links_color ); ?>><?php esc_html_e( 'Use Theme Color', 'blogprise' ); ?></option>
					<option value="brand_color" <?php selected( 'brand_color', $social_links_color ); ?>><?php esc_html_e( 'Use Brand Color', 'blogprise' ); ?></option>
				</select>
			</p>
		</div>
		<div>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'social_links_style' ) ); ?>">
					<span class="field-label"><?php esc_html_e( 'Social Links Style', 'blogprise' ); ?></span>
				</label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'social_links_style' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'social_links_style' ) ); ?>" class="widefat">
					<?php
					$social_link_styles_arr = blogprise_get_social_links_styles();
					foreach ( $social_link_styles_arr as $key => $value ) {
						?>
						<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $key, $social_links_style ); ?>>
							<?php echo $value; ?>
						</option>
						<?php
					}
					?>
				</select>
			</p>
		</div>
		<div>
			<p>
				<input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'inverted_block_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'inverted_block_color' ) ); ?>" value="1" <?php checked( $inverted_block_color, 1 ); ?>>
				<label for="<?php echo esc_attr( $this->get_field_id( 'inverted_block_color' ) ); ?>">
					<?php esc_html_e( 'Inverted Color', 'blogprise' ); ?>
				</label>
			</p>
			<em><?php esc_html_e( 'Can be used if you have dark background and want lighter color on the text.', 'blogprise' ); ?></em>
		</div>
		<?php
		$social_networks = $this->social_networks;
		if ( ! empty( $social_networks ) && is_array( $social_networks ) ) {
			foreach ( $social_networks as $network ) {
				$social_link = ! empty( $instance[ $network ] ) ? $instance[ $network ] : '';
				?>
				<p class="blogprise-social-link">
					<label for="<?php echo esc_attr( $this->get_field_id( $network ) ); ?>">
						<?php echo esc_html( ucfirst( $network ) ); ?>
					</label>
					<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $network ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $network ) ); ?>" type="text" value="<?php echo esc_url( $social_link ); ?>">
				</p>
				<?php
			}
		}
		?>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @since 1.0.0
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title']                = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['author_name']          = ( ! empty( $new_instance['author_name'] ) ) ? sanitize_text_field( $new_instance['author_name'] ) : '';
		$instance['author_pos']           = ( ! empty( $new_instance['author_pos'] ) ) ? sanitize_text_field( $new_instance['author_pos'] ) : '';
		$instance['author_desc']          = ( ! empty( $new_instance['author_desc'] ) ) ? wp_kses_post( $new_instance['author_desc'] ) : '';
		$instance['author_img']           = ( ! empty( $new_instance['author_img'] ) ) ? absint( $new_instance['author_img'] ) : '';
		$instance['image_border_radius']  = ( ! empty( $new_instance['image_border_radius'] ) ) ? 1 : 0;
		$instance['style']                = ( ! empty( $new_instance['style'] ) ) ? sanitize_text_field( $new_instance['style'] ) : 'style_1';
		$instance['social_links_color']   = ( ! empty( $new_instance['social_links_color'] ) ) ? sanitize_text_field( $new_instance['social_links_color'] ) : 'theme_color';
		$instance['social_links_style']   = ( ! empty( $new_instance['social_links_style'] ) ) ? sanitize_text_field( $new_instance['social_links_style'] ) : 'style_1';
		$instance['inverted_block_color'] = ( ! empty( $new_instance['inverted_block_color'] ) ) ? 1 : 0;

		$social_networks = $this->social_networks;
		if ( ! empty( $social_networks ) && is_array( $social_networks ) ) {
			foreach ( $social_networks as $network ) {
				$instance[ $network ] = ( ! empty( $new_instance[ $network ] ) ) ? esc_url_raw( $new_instance[ $network ] ) : '';
			}
		}

		return $instance;
	}

	public function enqueue_assets() {
		if ( is_active_widget( false, false, $this->id_base ) ) {
			$file_prefix = is_rtl() ? '-rtl' : '';
			$css_file    = get_template_directory() . '/inc/widgets/css/author-info' . $file_prefix . '.css';
			if ( file_exists( $css_file ) ) {
				$styles = wp_strip_all_tags( file_get_contents( $css_file ) );
				wp_add_inline_style( 'blogprise-style', $styles );
			}
		}
	}
}
