<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Blogprise_List_Posts extends Blogprise_Widget_Base {
	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'blogprise_list_posts_widget';
		$this->widget_description = __( 'Displays posts in list style', 'blogprise' );
		$this->widget_id          = 'blogprise_express_posts';
		$this->widget_name        = __( 'Blogprise: List Posts', 'blogprise' );
		$this->settings           = array(
			'title'                                 => array(
				'type'  => 'text',
				'label' => __( 'Title', 'blogprise' ),
			),
			'post_settings_heading'                 => array(
				'type'  => 'heading',
				'label' => __( 'Post Settings', 'blogprise' ),
			),
			'category'                              => array(
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
			'no_of_posts'                           => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => '',
				'std'   => 5,
				'label' => __( 'Number of posts to show', 'blogprise' ),
			),
			'offset'                                => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 0,
				'max'   => '',
				'std'   => '',
				'label' => __( 'Offset', 'blogprise' ),
				'desc'  => __( 'Can be useful if you want to skip certain number of posts. Leave as 0 if you do not want to use it.', 'blogprise' ),
			),
			'orderby'                               => array(
				'type'    => 'select',
				'std'     => 'date',
				'label'   => __( 'Order By', 'blogprise' ),
				'options' => array(
					'date'  => __( 'Date', 'blogprise' ),
					'ID'    => __( 'ID', 'blogprise' ),
					'title' => __( 'Title', 'blogprise' ),
					'rand'  => __( 'Random', 'blogprise' ),
				),
			),
			'order'                                 => array(
				'type'    => 'select',
				'std'     => 'desc',
				'label'   => __( 'Order', 'blogprise' ),
				'options' => array(
					'asc'  => __( 'ASC', 'blogprise' ),
					'desc' => __( 'DESC', 'blogprise' ),
				),
			),
			'meta_settings_heading'                 => array(
				'type'  => 'heading',
				'label' => __( 'Post Meta Settings', 'blogprise' ),
			),
			'post_meta'                             => array(
				'type'    => 'multi-checkbox',
				'label'   => __( 'Post Meta', 'blogprise' ),
				'options' => array(
					'author'    => __( 'Author', 'blogprise' ),
					'read_time' => __( 'Post Read Time', 'blogprise' ),
					'date'      => __( 'Date', 'blogprise' ),
					'comment'   => __( 'Comment', 'blogprise' ),
				),
				'std'     => array( 'author', 'date' ),
			),
			'show_meta_on_express_only'             => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Post Metas on Express Post Only', 'blogprise' ),
				'desc'  => __( 'Make sure to select post meta from above for this to work.', 'blogprise' ),
				'std'   => false,
			),
			'post_meta_icon'                        => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Post Meta Icon', 'blogprise' ),
				'desc'  => __( 'Some Icons may show up regardless to provide better info.', 'blogprise' ),
				'std'   => false,
			),
			'date_format'                           => array(
				'type'    => 'select',
				'label'   => __( 'Date Format', 'blogprise' ),
				'desc'    => __( 'Make sure to select Date from above for this to work.', 'blogprise' ),
				'options' => array(
					'format_1' => __( 'Times Ago', 'blogprise' ),
					'format_2' => __( 'Default Format', 'blogprise' ),
				),
				'std'     => 'format_2',
			),
			'author_image'                          => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Author Image', 'blogprise' ),
				'desc'  => __( 'Make sure to select Author from above for this to work. Will only show up in express post.', 'blogprise' ),
				'std'   => false,
			),
			'category_settings_heading'             => array(
				'type'  => 'heading',
				'label' => __( 'Category Settings', 'blogprise' ),
			),
			'show_category'                         => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Category', 'blogprise' ),
				'std'   => false,
			),
			'category_color'                        => array(
				'type'    => 'select',
				'label'   => __( 'Category Color', 'blogprise' ),
				'options' => blogprise_get_category_color_display(),
				'std'     => 'none',
			),
			'category_style'                        => array(
				'type'    => 'select',
				'label'   => __( 'Category Style', 'blogprise' ),
				'options' => blogprise_get_category_styles(),
				'std'     => 'style_1',
			),
			'no_of_category'                        => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 0,
				'max'   => '',
				'std'   => 1,
				'label' => __( 'Number of Category to Display', 'blogprise' ),
			),
			'show_cat_on_express_only'              => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Categories on Express Post Only', 'blogprise' ),
				'desc'  => __( 'Make sure to select Show Category from above for this to work.', 'blogprise' ),
				'std'   => false,
			),
			'widget_settings_heading'               => array(
				'type'  => 'heading',
				'label' => __( 'Widget Settings', 'blogprise' ),
			),
			'style'                                 => array(
				'type'    => 'select',
				'label'   => __( 'Display Style', 'blogprise' ),
				'options' => array(
					'style_1'  => __( 'Left Express + Right List', 'blogprise' ),
					'style_3'  => __( 'Left Express + 2 Columns Right List', 'blogprise' ),
					'style_4'  => __( 'Left List + Center Express + Right List', 'blogprise' ),
					'style_5'  => __( 'Left List + Center Express + Inverted Right List', 'blogprise' ),
					'style_2'  => __( 'Top Express + Bottom List', 'blogprise' ),
					'style_7'  => __( 'Top Express + Bottom List Variation', 'blogprise' ),
					'style_9'  => __( 'Top Express + Bottom 2 Columns List', 'blogprise' ),
					'style_8'  => __( '1 Column List', 'blogprise' ),
					'style_10' => __( '2 Columns List', 'blogprise' ),
					'style_11' => __( '3 Columns List', 'blogprise' ),
					'style_6'  => __( '4 Columns List', 'blogprise' ),
				),
				'std'     => 'style_1',
			),
			'enable_post_format_icon'               => array(
				'type'  => 'checkbox',
				'label' => __( 'Enable Post Format Icon', 'blogprise' ),
				'std'   => false,
			),
			'inverted_block_color'                  => array(
				'type'  => 'checkbox',
				'label' => __( 'Inverted Color', 'blogprise' ),
				'desc'  => __( 'Can be used if you have dark background and want lighter color on the text.', 'blogprise' ),
				'std'   => false,
			),
			'express_post_display_settings_heading' => array(
				'type'  => 'message',
				'label' => __( 'Express Posts Settings', 'blogprise' ),
			),
			'express_post_style'                    => array(
				'type'    => 'select',
				'label'   => __( 'Express Post Style', 'blogprise' ),
				'options' => array(
					'style_1' => __( 'Style 1', 'blogprise' ),
					'style_2' => __( 'Style 2', 'blogprise' ),
				),
				'std'     => 'style_1',
			),
			'express_posts_title_limit'             => array(
				'type'    => 'select',
				'label'   => __( 'Express Post Title Limit', 'blogprise' ),
				'options' => blogprise_get_title_limit_choices(),
				'std'     => '',
			),
			'show_excerpt'                          => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Excerpt', 'blogprise' ),
				'std'   => true,
			),
			'excerpt_length'                        => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 0,
				'max'   => '',
				'std'   => 20,
				'label' => __( 'Excerpt Length', 'blogprise' ),
			),
			'show_read_more'                        => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Read More', 'blogprise' ),
				'std'   => false,
			),
			'read_more_text'                        => array(
				'type'  => 'text',
				'label' => __( 'Read More Text', 'blogprise' ),
				'desc'  => __( 'Leave Empty if you want to use default text "Read More" ', 'blogprise' ),
			),
			'read_more_style'                       => array(
				'type'    => 'select',
				'label'   => __( 'Read More Style', 'blogprise' ),
				'options' => blogprise_get_read_more_styles(),
				'std'     => 'style_1',
			),
			'read_more_icon'                        => array(
				'type'    => 'select',
				'label'   => __( 'Read More Icon', 'blogprise' ),
				'options' => blogprise_get_read_more_icons_list(),
				'std'     => '',
			),
			'list_post_display_settings_heading'    => array(
				'type'  => 'message',
				'label' => __( 'List Posts Settings', 'blogprise' ),
			),
			'invert_list_post'                      => array(
				'type'  => 'checkbox',
				'label' => __( 'Invert List Post', 'blogprise' ),
				'std'   => false,
			),
			'circle_list_image'                       => array(
				'type'  => 'checkbox',
				'label' => __( 'Circle Style List Post Image', 'blogprise' ),
				'std'   => false,
			),
			'hide_list_image'                       => array(
				'type'  => 'checkbox',
				'label' => __( 'Hide List Post Image', 'blogprise' ),
				'std'   => false,
			),
			'list_posts_title_limit'                => array(
				'type'    => 'select',
				'label'   => __( 'List Post Title Limit', 'blogprise' ),
				'options' => blogprise_get_title_limit_choices(),
				'std'     => '',
			),
			'enable_list_item_separator'            => array(
				'type'  => 'checkbox',
				'label' => __( 'Enable List Item Separator', 'blogprise' ),
				'std'   => false,
			),
		);

		parent::__construct();

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
	}

	/**
	 * Query the posts and return them.
	 *
	 * @param  array $args
	 * @param  array $instance
	 * @return WP_Query
	 */
	public function get_posts( $args, $instance ) {
		$number  = ! empty( $instance['no_of_posts'] ) ? absint( $instance['no_of_posts'] ) : $this->settings['no_of_posts']['std'];
		$orderby = ! empty( $instance['orderby'] ) ? sanitize_text_field( $instance['orderby'] ) : $this->settings['orderby']['std'];
		$order   = ! empty( $instance['order'] ) ? sanitize_text_field( $instance['order'] ) : $this->settings['order']['std'];
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

		return new WP_Query( apply_filters( 'blogprise_list_posts_query_args', $query_args ) );
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

			do_action( 'blogprise_before_list_posts' );

			$style                     = isset( $instance['style'] ) ? $instance['style'] : $this->settings['style']['std'];
			$invert_list_post          = isset( $instance['invert_list_post'] ) ? $instance['invert_list_post'] : $this->settings['invert_list_post']['std'];
			$hide_list_image           = isset( $instance['hide_list_image'] ) ? $instance['hide_list_image'] : $this->settings['hide_list_image']['std'];
			$circle_list_image         = isset( $instance['circle_list_image'] ) ? $instance['circle_list_image'] : $this->settings['circle_list_image']['std'];
			$meta_on_express_only      = isset( $instance['show_meta_on_express_only'] ) ? $instance['show_meta_on_express_only'] : $this->settings['show_meta_on_express_only']['std'];
			$cat_on_express_only       = isset( $instance['show_cat_on_express_only'] ) ? $instance['show_cat_on_express_only'] : $this->settings['show_cat_on_express_only']['std'];
			$express_posts_title_limit = isset( $instance['express_posts_title_limit'] ) ? $instance['express_posts_title_limit'] : $this->settings['express_posts_title_limit']['std'];
			$list_posts_title_limit    = isset( $instance['list_posts_title_limit'] ) ? $instance['list_posts_title_limit'] : $this->settings['list_posts_title_limit']['std'];
			$enable_post_format_icon   = isset( $instance['enable_post_format_icon'] ) ? $instance['enable_post_format_icon'] : $this->settings['enable_post_format_icon']['std'];
			$inverted_block_color      = isset( $instance['inverted_block_color'] ) ? $instance['inverted_block_color'] : $this->settings['inverted_block_color']['std'];
			$express_post_style        = isset( $instance['express_post_style'] ) ? $instance['express_post_style'] : $this->settings['express_post_style']['std'];
			$show_excerpt              = isset( $instance['show_excerpt'] ) ? $instance['show_excerpt'] : $this->settings['show_excerpt']['std'];
			if ( $show_excerpt ) {
				$excerpt_length = isset( $instance['excerpt_length'] ) ? $instance['excerpt_length'] : $this->settings['excerpt_length']['std'];
			}
			$show_read_more = isset( $instance['show_read_more'] ) ? $instance['show_read_more'] : $this->settings['show_read_more']['std'];
			if ( $show_read_more ) {
				$read_more_text  = isset( $instance['read_more_text'] ) ? $instance['read_more_text'] : '';
				$read_more_style = isset( $instance['read_more_style'] ) ? $instance['read_more_style'] : $this->settings['read_more_style']['std'];
				$read_more_icon  = isset( $instance['read_more_icon'] ) ? $instance['read_more_icon'] : $this->settings['read_more_icon']['std'];
			}
			$show_category = isset( $instance['show_category'] ) ? $instance['show_category'] : $this->settings['show_category']['std'];
			if ( $show_category ) {
				$cat_style = isset( $instance['category_style'] ) ? $instance['category_style'] : $this->settings['category_style']['std'];
				$color     = isset( $instance['category_color'] ) ? $instance['category_color'] : $this->settings['category_color']['std'];
				$limit     = isset( $instance['no_of_category'] ) ? $instance['no_of_category'] : $this->settings['no_of_category']['std'];
			}
			$enabled_post_meta   = isset( $instance['post_meta'] ) ? $instance['post_meta'] : $this->settings['post_meta']['std'];
			$date_format         = isset( $instance['date_format'] ) ? $instance['date_format'] : $this->settings['date_format']['std'];
			$post_meta_icon      = isset( $instance['post_meta_icon'] ) ? $instance['post_meta_icon'] : $this->settings['post_meta_icon']['std'];
			$list_item_separator = isset( $instance['enable_list_item_separator'] ) ? $instance['enable_list_item_separator'] : $this->settings['enable_list_item_separator']['std'];

			$widget_class = $style;

			if ( $invert_list_post ) {
				$widget_class .= ' saga-inverted-item';
			}

			if ( $hide_list_image ) {
				$widget_class .= ' saga-hidden-post-image';
			}

			if ( $circle_list_image ) {
				$widget_class .= ' saga-circle-list-post-image';
			}

			$counter     = 1;
			$show_image  = true;
			$total_posts = $posts->post_count;

			$mid_point           = floor( $total_posts / 2 );
			$mid_point_w_express = $mid_point + 1;

			switch ( $style ) {
				case 'style_1':
					$row_cols_class = ' row-cols-md-2';
					break;
				case 'style_4':
				case 'style_5':
					$row_cols_class = ' row-cols-lg-3';
					break;
				case 'style_6':
					$row_cols_class = ' row-cols-md-2 row-cols-lg-3 row-cols-xl-4';
					break;
				case 'style_10':
					$row_cols_class = ' row-cols-md-2';
					break;
				case 'style_11':
					$row_cols_class = ' row-cols-md-2 row-cols-lg-3';
					break;
				default:
					$row_cols_class = '';
			}

			// Check for list only styles.
			$list_only_style = false;
			if ( 'style_6' == $style || 'style_8' == $style || 'style_10' == $style || 'style_11' == $style ) {
				$list_only_style = true;
			}

			$express_cols_class = $list_cols_class = '';
			if ( 'style_3' == $style ) {
				$express_cols_class = '-lg-4';
				$list_cols_class    = '-lg-8';
			}

			if ( 'style_7' == $style ) {
				$list_post_image_size = 'blogprise-large-img';
			} else {
				$list_post_image_size = 'thumbnail';
			}

			// List Item Separator.
			if ( $list_item_separator ) {
				$widget_class .= ' saga-item-sep';
			}

			// Inverted Color.
			if ( $inverted_block_color ) {
				$widget_class .= ' saga-block-inverted-color';
			}
			?>

			<div class="blogprise-list-posts-widget <?php echo esc_attr( $widget_class ); ?>">
				<div class="row row-cols-1<?php echo esc_attr( $row_cols_class ); ?> g-4">
					<?php
					while ( $posts->have_posts() ) :
						$posts->the_post();

						$wrapper_class_start = $wrapper_class_end = $article_wrapper_start = $article_wrapper_end = '';

						if ( ! $list_only_style ) {
							if ( 1 == $counter ) {
								$wrapper_class_start = '<div class="col' . $express_cols_class . ' blogprise-express-posts ' . $express_post_style . '">';
								$wrapper_class_end   = '</div>';
								$image_size          = 'blogprise-large-img';
							} else {
								$image_size = $list_post_image_size;
								if ( 2 == $counter ) {
									$wrapper_class_start = '<div class="col' . $list_cols_class . ' blogprise-list-posts">';
								}

								if ( 'style_3' == $style || 'style_9' == $style ) {
									if ( 2 == $counter || ( $counter % 2 ) == 0 ) {
										$article_wrapper_start = '<div class="article-column">';
									}
									if ( $total_posts == $counter || ( $counter % 2 ) == 1 ) {
										$article_wrapper_end = '</div>';
									}
								}

								// Close the list post div at midpoint and open it up on the next post after midpoint.
								if ( 'style_4' == $style || 'style_5' == $style ) {
									if ( $counter == $mid_point_w_express ) {
										$wrapper_class_end = '</div>';
									}
									if ( $counter == ( $mid_point_w_express + 1 ) ) {
										$wrapper_class_start = '<div class="col' . $list_cols_class . ' blogprise-list-posts">';
									}
								}

								// Make sure to close on the last post.
								if ( $counter == $total_posts ) {
									$wrapper_class_end = '</div>';
								}
							}
						} else {
							$image_size          = $list_post_image_size;
							$wrapper_class_start = '<div class="col blogprise-list-posts">';
							$wrapper_class_end   = '</div>';
						}

						if ( $hide_list_image ) {
							if ( 1 != $counter || $list_only_style ) {
								$show_image = false;
							} else {
								$show_image = true;
							}
						}

						?>

						<?php echo wp_kses_post( $wrapper_class_start ); ?>

							<?php echo wp_kses_post( $article_wrapper_start ); ?>

							<div class="blogprise-article-block-wrapper blogprise-card-box img-animate-zoom">
								<?php
								if ( has_post_thumbnail() && $show_image ) :
									?>
									<div class="article-image blogprise-rounded-img">
										<a href="<?php the_permalink(); ?>">
											<?php
											if ( $enable_post_format_icon ) {
												blogprise_post_format_icon( 'center' );
											}
											?>
											<?php
											the_post_thumbnail(
												$image_size,
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
									</div>
									<?php
								endif;
								?>
								<div class="article-details">
									<?php
									if ( $show_category ) {
										if ( $cat_on_express_only ) {
											if ( 1 == $counter && ( ! $list_only_style ) ) {
												echo '<div class="article-cat-info">';
													blogprise_post_categories( $cat_style, $color, $limit );
												echo '</div>';
											}
										} else {
											echo '<div class="article-cat-info">';
												blogprise_post_categories( $cat_style, $color, $limit );
											echo '</div>';
										}
									}
									?>
									<h3 class="article-title no-margin color-accent-hover blogprise-limit-lines <?php echo esc_attr( 1 == $counter ? $express_posts_title_limit : $list_posts_title_limit ); ?>">
										<a href="<?php the_permalink(); ?>" class="text-decoration-none blogprise-title-line">
											<?php the_title(); ?>
										</a>
									</h3>

									<?php
									$meta_settings['date_format'] = $date_format;
									$meta_settings['show_icons']  = $post_meta_icon;
									// Author Image.
									if ( 1 == $counter && ( ! $list_only_style ) ) {
										$meta_settings['author_image'] = isset( $instance['author_image'] ) ? $instance['author_image'] : $this->settings['author_image']['std'];
									} else {
										$meta_settings['author_image'] = false;
									}

									if ( $meta_on_express_only ) {
										if ( 1 == $counter && ( ! $list_only_style ) ) {
											blogprise_post_meta_info( $enabled_post_meta, $meta_settings );
										}
									} else {
										blogprise_post_meta_info( $enabled_post_meta, $meta_settings );
									}
									?>
									
									<?php
									if ( 'style_7' == $style ) :
										if ( $show_excerpt && $excerpt_length > 0 ) :
											?>
												<div class="article-excerpt">
													<p class="no-margin">
														<?php echo wp_trim_words( get_the_excerpt(), $excerpt_length, '&hellip;' ); ?>
													</p>
												</div>
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
										endif;
									elseif ( 1 == $counter && ( ! $list_only_style ) ) :
										if ( $show_excerpt && $excerpt_length > 0 ) :
											?>
													<div class="article-excerpt">
														<p class="no-margin">
														<?php echo wp_trim_words( get_the_excerpt(), $excerpt_length, '&hellip;' ); ?>
														</p>
													</div>
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
											endif;
									endif;

									?>
								</div>
							</div><!--article-->

							<?php echo wp_kses_post( $article_wrapper_end ); ?>

						<?php echo wp_kses_post( $wrapper_class_end ); ?>

						<?php
						++$counter;
					endwhile;
					wp_reset_postdata();
					?>
				</div><!-- row -->
			</div>
			<?php

			do_action( 'blogprise_after_list_posts' );

			$this->widget_end( $args );
		}

		echo ob_get_clean();
	}

	public function enqueue_assets() {
		if ( is_active_widget( false, false, $this->id_base ) ) {
			$file_prefix = is_rtl() ? '-rtl' : '';
			$css_file = get_template_directory() . '/inc/widgets/css/list-posts' . $file_prefix . '.css';
			if ( file_exists( $css_file ) ) {
				$styles = wp_strip_all_tags( file_get_contents( $css_file ) );
				wp_add_inline_style( 'blogprise-style', $styles );
			}
		}
	}
}
