<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Blogprise_Posts_Carousel extends Blogprise_Widget_Base {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'widget_blogprise_posts_carousel';
		$this->widget_description = __( 'Displays posts in carousel', 'blogprise' );
		$this->widget_id          = 'blogprise_posts_carousel';
		$this->widget_name        = __( 'Blogprise: Posts Carousel', 'blogprise' );
		$this->settings           = array(
			'title'                     => array(
				'type'  => 'text',
				'label' => __( 'Title', 'blogprise' ),
			),
			'post_settings_heading'     => array(
				'type'  => 'heading',
				'label' => __( 'Post Settings', 'blogprise' ),
			),
			'category'                  => array(
				'type'  => 'dropdown-taxonomies',
				'label' => __( 'Select Category', 'blogprise' ),
				'desc'  => __( 'Leave empty if you don\'t want the posts to be category specific', 'blogprise' ),
				'args'  => array(
					'taxonomy'        => 'category',
					'class'           => 'widefat',
					'hierarchical'    => true,
					'show_count'      => 1,
					'show_option_all' => __( '&mdash; Select &mdash;', 'blogprise' ),
				),
			),
			'number'                    => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => '',
				'std'   => 5,
				'label' => __( 'Number of posts to show', 'blogprise' ),
			),
			'offset'                    => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 0,
				'max'   => '',
				'std'   => '',
				'label' => __( 'Offset', 'blogprise' ),
				'desc'  => __( 'Can be useful if you want to skip certain number of posts. Leave as 0 if you do not want to use it.', 'blogprise' ),
			),
			'orderby'                   => array(
				'type'    => 'select',
				'std'     => 'date',
				'label'   => __( 'Order by', 'blogprise' ),
				'options' => array(
					'date'  => __( 'Date', 'blogprise' ),
					'ID'    => __( 'ID', 'blogprise' ),
					'title' => __( 'Title', 'blogprise' ),
					'rand'  => __( 'Random', 'blogprise' ),
				),
			),
			'order'                     => array(
				'type'    => 'select',
				'std'     => 'desc',
				'label'   => __( 'Order', 'blogprise' ),
				'options' => array(
					'asc'  => __( 'ASC', 'blogprise' ),
					'desc' => __( 'DESC', 'blogprise' ),
				),
			),
			'meta_settings_heading'     => array(
				'type'  => 'heading',
				'label' => __( 'Post Meta Settings', 'blogprise' ),
			),
			'post_meta'                 => array(
				'type'    => 'multi-checkbox',
				'label'   => __( 'Post Meta', 'blogprise' ),
				'options' => array(
					'author'    => __( 'Author', 'blogprise' ),
					'read_time' => __( 'Post Read Time', 'blogprise' ),
					'date'      => __( 'Date', 'blogprise' ),
					'comment'   => __( 'Comment', 'blogprise' ),
				),
				'std'     => array(),
			),
			'post_meta_icon'            => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Post Meta Icon', 'blogprise' ),
				'desc'  => __( 'Some Icons may show up regardless to provide better info.', 'blogprise' ),
				'std'   => true,
			),
			'date_format'               => array(
				'type'    => 'select',
				'label'   => __( 'Date Format', 'blogprise' ),
				'desc'    => __( 'Make sure to select Date from above for this to work.', 'blogprise' ),
				'options' => array(
					'format_1' => __( 'Times Ago', 'blogprise' ),
					'format_2' => __( 'Default Format', 'blogprise' ),
				),
				'std'     => 'format_1',
			),
			'author_image'              => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Author Image', 'blogprise' ),
				'desc'  => __( 'Make sure to select Author from above for this to work.', 'blogprise' ),
				'std'   => false,
			),
			'excerpt_settings_heading'  => array(
				'type'  => 'heading',
				'label' => __( 'Excerpt Settings', 'blogprise' ),
			),
			'show_excerpt'              => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Excerpt', 'blogprise' ),
				'std'   => false,
			),
			'excerpt_length'            => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 0,
				'max'   => '',
				'std'   => 20,
				'label' => __( 'Excerpt Length', 'blogprise' ),
			),
			'show_read_more'            => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Read More', 'blogprise' ),
				'std'   => false,
			),
			'read_more_text'            => array(
				'type'  => 'text',
				'label' => __( 'Read More Text', 'blogprise' ),
				'desc'  => __( 'Leave Empty if you want to use default text "Read More" ', 'blogprise' ),
			),
			'read_more_style'           => array(
				'type'    => 'select',
				'label'   => __( 'Read More Style', 'blogprise' ),
				'options' => blogprise_get_read_more_styles(),
				'std'     => 'style_2',
			),
			'read_more_icon'            => array(
				'type'    => 'select',
				'label'   => __( 'Read More Icon', 'blogprise' ),
				'options' => blogprise_get_read_more_icons_list(),
				'std'     => 'arrow-right',
			),
			'category_settings_heading' => array(
				'type'  => 'heading',
				'label' => __( 'Category Settings', 'blogprise' ),
			),
			'show_category'             => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Category', 'blogprise' ),
				'std'   => true,
			),
			'category_color'            => array(
				'type'    => 'select',
				'label'   => __( 'Category Color', 'blogprise' ),
				'options' => blogprise_get_category_color_display(),
				'std'     => 'as_bg',
			),
			'category_style'            => array(
				'type'    => 'select',
				'label'   => __( 'Category Style', 'blogprise' ),
				'options' => blogprise_get_category_styles(),
				'std'     => 'style_2',
			),
			'no_of_category'            => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 0,
				'max'   => '',
				'std'   => 1,
				'label' => __( 'Number of Category to Display', 'blogprise' ),
			),
			'widget_settings_heading'   => array(
				'type'  => 'heading',
				'label' => __( 'Widget Settings', 'blogprise' ),
			),
			'style'                     => array(
				'type'    => 'select',
				'label'   => __( 'Display Style', 'blogprise' ),
				'options' => array(
					'style_1' => __( 'Style 1', 'blogprise' ),
					'style_2' => __( 'Style 2', 'blogprise' ),
				),
				'std'     => 'style_1',
			),
			'justify_content'           => array(
				'type'  => 'checkbox',
				'label' => __( 'Center Content', 'blogprise' ),
				'std'   => false,
			),
			'margin'                    => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 0,
				'max'   => 100,
				'std'   => 24,
				'label' => __( 'Carousel margin', 'blogprise' ),
			),
			'autoplay'                  => array(
				'type'  => 'checkbox',
				'label' => __( 'Autoplay', 'blogprise' ),
				'std'   => false,
			),
			'arrows'                    => array(
				'type'  => 'checkbox',
				'label' => __( 'Enable Arrows', 'blogprise' ),
				'std'   => true,
			),
			'dots'                      => array(
				'type'  => 'checkbox',
				'label' => __( 'Enable Dots', 'blogprise' ),
				'std'   => false,
			),
			'column'                    => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => 5,
				'std'   => 3,
				'label' => __( 'Column', 'blogprise' ),
			),
			'enable_post_format_icon'   => array(
				'type'  => 'checkbox',
				'label' => __( 'Enable Post Format Icon', 'blogprise' ),
				'std'   => false,
			),
			'inverted_block_color'      => array(
				'type'  => 'checkbox',
				'label' => __( 'Inverted Color', 'blogprise' ),
				'desc'  => __( 'Can be used if you have dark background and want lighter color on the text.', 'blogprise' ),
				'std'   => false,
			),
			'title_limit'               => array(
				'type'    => 'select',
				'label'   => __( 'Post Title Limit', 'blogprise' ),
				'options' => blogprise_get_title_limit_choices(),
				'std'     => '',
			),
		);

		parent::__construct();

	}

	/**
	 * Query the posts and return them.
	 *
	 * @param  array $args
	 * @param  array $instance
	 * @return WP_Query
	 */
	public function get_posts( $args, $instance ) {
		$number  = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : $this->settings['number']['std'];
		$orderby = ! empty( $instance['orderby'] ) ? sanitize_title( $instance['orderby'] ) : $this->settings['orderby']['std'];
		$order   = ! empty( $instance['order'] ) ? sanitize_title( $instance['order'] ) : $this->settings['order']['std'];
		$offset  = ! empty( $instance['offset'] ) ? sanitize_text_field( $instance['offset'] ) : $this->settings['offset']['std'];

		$query_args = array(
			'posts_per_page'      => $number,
			'post_status'         => 'publish',
			'no_found_rows'       => 1,
			'orderby'             => $orderby,
			'order'               => $order,
			'ignore_sticky_posts' => 1,
		);

		if ( $offset && 0 != $offset ) {
			$query_args['offset'] = absint( $offset );
		}

		if ( ! empty( $instance['category'] ) && -1 != $instance['category'] && 0 != $instance['category'] ) {
			$query_args['tax_query'][] = array(
				'taxonomy' => 'category',
				'field'    => 'term_id',
				'terms'    => $instance['category'],
			);
		}

		return new WP_Query( apply_filters( 'blogprise_posts_carousel_query_args', $query_args ) );
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

		if ( ( $posts = $this->get_posts( $args, $instance ) ) && $posts->have_posts() ) {
			$this->widget_start( $args, $instance );

			do_action( 'blogprise_before_posts_carousel' );

			$overlay       = $wrapper_class = $slider_nav = '';
			$display_style = isset( $instance['style'] ) ? $instance['style'] : $this->settings['style']['std'];
			if ( 'style_2' == $display_style ) {
				$overlay = '<span aria-hidden="true" class="blogprise-block-overlay overlay_w_gradient"></span>';
			}

			$wrapper_class = $display_style;

			$img_class = '';
			$margin    = isset( $instance['margin'] ) ? absint( $instance['margin'] ) : $this->settings['margin']['std'];
			if ( $margin != 0 ) {
				$img_class .= ' blogprise-rounded-img';
			}
			$autoplay = isset( $instance['autoplay'] ) ? $instance['autoplay'] : $this->settings['autoplay']['std'];
			$dots     = isset( $instance['dots'] ) ? $instance['dots'] : $this->settings['dots']['std'];
			if ( $dots ) {
				$slider_nav    .= '<div class="swiper-pagination"></div>';
				$wrapper_class .= ' blogprise-swiper-outer-bullets';
			}
			$arrows = isset( $instance['arrows'] ) ? $instance['arrows'] : $this->settings['arrows']['std'];
			if ( $arrows ) {
				$slider_nav .= '<div class="swiper-button-next"></div><div class="swiper-button-prev"></div>';
			}
			$column = isset( $instance['column'] ) ? absint( $instance['column'] ) : $this->settings['column']['std'];

			$wrapper_class .= " column-$column";

			// Build attributes.
			$data_slider = array();

			$data_slider['spaceBetween'] = $margin;

			if ( $autoplay ) :
				$data_slider['autoplay'] = array(
					'delay' => 5000,
					'disableOnInteraction' => false,
				);
			endif;

			if ( $column == 2 ) {
				$data_slider['breakpoints'] = array(
					'576' => array(
						'slidesPerView' => 2,
					),
				);
			} elseif ( $column == 3 ) {
				$data_slider['breakpoints'] = array(
					'576' => array(
						'slidesPerView' => 2,
					),
					'768' => array(
						'slidesPerView' => 3,
					),
				);
			} elseif ( $column == 4 ) {
				$data_slider['breakpoints'] = array(
					'576' => array(
						'slidesPerView' => 2,
					),
					'768' => array(
						'slidesPerView' => 3,
					),
					'992' => array(
						'slidesPerView' => 4,
					),
				);
			} elseif ( $column == 5 ) {
				$data_slider['breakpoints'] = array(
					'576'  => array(
						'slidesPerView' => 2,
					),
					'768'  => array(
						'slidesPerView' => 3,
					),
					'992'  => array(
						'slidesPerView' => 4,
					),
					'1200' => array(
						'slidesPerView' => 5,
					),
				);
			}

			$show_category = isset( $instance['show_category'] ) ? $instance['show_category'] : $this->settings['show_category']['std'];
			if ( $show_category ) {
				$cat_style = isset( $instance['category_style'] ) ? $instance['category_style'] : $this->settings['category_style']['std'];
				$color     = isset( $instance['category_color'] ) ? $instance['category_color'] : $this->settings['category_color']['std'];
				$limit     = isset( $instance['no_of_category'] ) ? $instance['no_of_category'] : $this->settings['no_of_category']['std'];
			}
			$enabled_post_meta             = isset( $instance['post_meta'] ) ? $instance['post_meta'] : $this->settings['post_meta']['std'];
			$meta_settings['date_format']  = isset( $instance['date_format'] ) ? $instance['date_format'] : $this->settings['date_format']['std'];
			$meta_settings['author_image'] = isset( $instance['author_image'] ) ? $instance['author_image'] : $this->settings['author_image']['std'];
			$meta_settings['show_icons']   = isset( $instance['post_meta_icon'] ) ? $instance['post_meta_icon'] : $this->settings['post_meta_icon']['std'];
			$title_limit                   = isset( $instance['title_limit'] ) ? $instance['title_limit'] : $this->settings['title_limit']['std'];
			$enable_post_format_icon       = isset( $instance['enable_post_format_icon'] ) ? $instance['enable_post_format_icon'] : $this->settings['enable_post_format_icon']['std'];
			$show_excerpt                  = isset( $instance['show_excerpt'] ) ? $instance['show_excerpt'] : $this->settings['show_excerpt']['std'];
			if ( $show_excerpt ) {
				$excerpt_length = isset( $instance['excerpt_length'] ) ? $instance['excerpt_length'] : $this->settings['excerpt_length']['std'];
			}
			$show_read_more = isset( $instance['show_read_more'] ) ? $instance['show_read_more'] : $this->settings['show_read_more']['std'];
			if ( $show_read_more ) {
				$read_more_text  = isset( $instance['read_more_text'] ) ? $instance['read_more_text'] : '';
				$read_more_style = isset( $instance['read_more_style'] ) ? $instance['read_more_style'] : $this->settings['read_more_style']['std'];
				$read_more_icon  = isset( $instance['read_more_icon'] ) ? $instance['read_more_icon'] : $this->settings['read_more_icon']['std'];
			}
			$inverted_block_color = isset( $instance['inverted_block_color'] ) ? $instance['inverted_block_color'] : $this->settings['inverted_block_color']['std'];

			// Inverted Color.
			if ( $inverted_block_color ) {
				$wrapper_class .= ' saga-block-inverted-color';
			}
			
			// Justify Content.
			$justify_content = isset( $instance['justify_content'] ) ? $instance['justify_content'] : $this->settings['justify_content']['std'];
			if ( $justify_content ) {
				$wrapper_class .= ' blogprise-justify-article-contents';
			}
			?>

			<div class="blogprise-slider-wrapper-block as_carousel <?php echo esc_attr( $wrapper_class ); ?>">
				<div class="swiper" data-slider='<?php echo esc_attr( json_encode( $data_slider ) ); ?>'>
					<div class="swiper-wrapper">
						<?php
						while ( $posts->have_posts() ) :
							$posts->the_post();

							// Build article details here so that it can be used in different areas.
							ob_start();
							?>
							<div class="article-details">
								<?php
								if ( $show_category ) {
									echo '<div class="article-cat-info">';
									blogprise_post_categories( $cat_style, $color, $limit );
									echo '</div>';
								}
								?>
								<h3 class="article-title no-margin color-accent-hover blogprise-limit-lines <?php echo esc_attr( $title_limit ); ?>">
									<a href="<?php the_permalink(); ?>" class="text-decoration-none blogprise-title-line">
										<?php the_title(); ?>
									</a>
								</h3>
								<?php blogprise_post_meta_info( $enabled_post_meta, $meta_settings ); ?>
							</div>
							<?php
							$article_details = ob_get_clean();
							// End building article details.

							if ( has_post_thumbnail() ) {
								?>
								<div class="swiper-slide">
									<div class="blogprise-article-block-wrapper blogprise-card-box img-animate-zoom">
										<div class="article-image<?php echo esc_attr( $img_class ); ?>">
											<a href="<?php the_permalink(); ?>">
												<?php echo $overlay; ?>
												<?php
												if ( $enable_post_format_icon ) {
													blogprise_post_format_icon( 'center' );
												}
												?>
												<?php
												the_post_thumbnail(
													'blogprise-large-img',
													array(
														'alt' => the_title_attribute(
															array(
																'echo' => false,
															)
														),
													)
												);
												?>
											</a>
											<?php
											if ( 'style_2' == $display_style ) {
												echo $article_details;
											}
											?>
										</div>
										<?php
										if ( 'style_1' == $display_style ) {
											echo $article_details;
										}
										?>
										<div class="article-content">
											<?php
											if ( $show_excerpt && $excerpt_length > 0 ) {
												?>
												<div class="article-excerpt">
													<p class="no-margin">
														<?php echo wp_trim_words( get_the_excerpt(), $excerpt_length, '&hellip;' ); ?>
													</p>
												</div>
											<?php } ?>
											<?php
											if ( $show_read_more ) {
												?>
												<div class="article-read-more">
													<a href="<?php the_permalink(); ?>" class="blogprise-btn-link text-decoration-none <?php echo esc_attr( $read_more_style ); ?>">
														<?php
														if ( $read_more_text ) {
															echo esc_html( $read_more_text );
														} else {
															esc_html_e( 'Read More', 'blogprise' );
														}
														if ( $read_more_icon ) {
															?>
															<span><?php blogprise_the_theme_svg( $read_more_icon ); ?></span>
															<?php
														}
														?>
													</a>
												</div>
												<?php
											}
											?>
										</div>
									</div>
								</div>
								<?php
							}
						endwhile;
						wp_reset_postdata();
						?>
					</div>
				</div>
				<?php
				if ( $slider_nav ) :
					echo $slider_nav;
				endif;
				?>
			</div>

			<?php

			do_action( 'blogprise_after_posts_carousel' );

			$this->widget_end( $args );
		}

		echo ob_get_clean();
	}
}
