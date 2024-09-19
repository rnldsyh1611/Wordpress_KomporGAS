<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Blogprise_Post_Ids_Special_Grid extends Blogprise_Widget_Base {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'blogprise_post_ids_special_grid';
		$this->widget_description = __( 'Displays posts in special grid style', 'blogprise' );
		$this->widget_id          = 'blogprise_post_ids_special_grid';
		$this->widget_name        = __( 'Blogprise: Overlay Grid Posts', 'blogprise' );

		$this->settings = array(
			'title'                     => array(
				'type'  => 'text',
				'label' => __( 'Title', 'blogprise' ),
			),
			'post_settings_heading'     => array(
				'type'  => 'heading',
				'label' => __( 'Post Settings', 'blogprise' ),
			),
			'post_ids'                  => array(
				'type'  => 'text',
				'label' => __( 'Enter Post ID\'s', 'blogprise' ),
				'desc'  => __( 'Post IDs, separated by commas. Eg: 1, 2, 3', 'blogprise' ),
			),
			'or'                        => array(
				'type'  => 'subtitle',
				'label' => __( '&mdash; Or &mdash;', 'blogprise' ),
			),
			'post_cat'                  => array(
				'type'  => 'dropdown-taxonomies',
				'label' => __( 'Select Category', 'blogprise' ),
				'desc'  => __( 'Only select category if you want the posts to be category specific instead of using post IDs from above.', 'blogprise' ),
				'args'  => array(
					'taxonomy'        => 'category',
					'class'           => 'widefat',
					'hierarchical'    => true,
					'show_count'      => 1,
					'show_option_all' => __( '&mdash; Select &mdash;', 'blogprise' ),
				),
			),
			'no_of_posts'               => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => '',
				'std'   => 4,
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
				'label'   => __( 'Order By', 'blogprise' ),
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
				'std'     => array( 'date' ),
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
				'desc'  => __( 'Make sure to select Author from above for this to work. Will only show up in express post.', 'blogprise' ),
				'std'   => false,
			),
			'widget_settings_heading'   => array(
				'type'  => 'heading',
				'label' => __( 'Widget Settings', 'blogprise' ),
			),
			'special_grid_style'        => array(
				'type'    => 'select',
				'label'   => __( 'Grid Style', 'blogprise' ),
				'options' => array(
					'grid_style_1' => __( 'Style 1', 'blogprise' ),
					'grid_style_2' => __( 'Style 2', 'blogprise' ),
					'grid_style_3' => __( 'Style 3', 'blogprise' ),
					'grid_style_4' => __( 'Style 4', 'blogprise' ),
					'grid_style_5' => __( 'Style 5', 'blogprise' ),
					'grid_style_6' => __( 'Style 6', 'blogprise' ),
					'grid_style_7' => __( 'Style 7', 'blogprise' ),
				),
				'std'     => 'grid_style_1',
			),
			'enable_post_format_icon'   => array(
				'type'  => 'checkbox',
				'label' => __( 'Enable Post Format Icon', 'blogprise' ),
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

		$is_cat = false;
		if ( ! empty( $instance['post_cat'] ) && -1 != $instance['post_cat'] && 0 != $instance['post_cat'] ) {
			$is_cat = true;
		}

		if ( ! empty( $instance['post_ids'] ) || $is_cat ) {

			$query_args = array(
				'post_type'           => 'post',
				'post_status'         => 'publish',
				'no_found_rows'       => 1,
				'ignore_sticky_posts' => 1,
			);

			if ( $is_cat ) {

				$number  = ! empty( $instance['no_of_posts'] ) ? absint( $instance['no_of_posts'] ) : $this->settings['no_of_posts']['std'];
				$orderby = ! empty( $instance['orderby'] ) ? sanitize_text_field( $instance['orderby'] ) : $this->settings['orderby']['std'];
				$order   = ! empty( $instance['order'] ) ? sanitize_text_field( $instance['order'] ) : $this->settings['order']['std'];
				$offset  = ! empty( $instance['offset'] ) ? sanitize_text_field( $instance['offset'] ) : $this->settings['offset']['std'];

				$query_args['posts_per_page'] = $number;
				$query_args['orderby']        = $orderby;
				$query_args['order']          = $order;

				if ( $offset && 0 != $offset ) {
					$query_args['offset'] = absint( $offset );
				}

				$query_args['tax_query'][] = array(
					'taxonomy' => 'category',
					'field'    => 'term_id',
					'terms'    => $instance['post_cat'],
				);

			} else {

				$post_ids = explode( ',', esc_attr( $instance['post_ids'] ) );

				$query_args['post__in']       = $post_ids;
				$query_args['orderby']        = 'post__in';
				$query_args['posts_per_page'] = count( $post_ids );

			}

			$query = new WP_Query( $query_args );

			if ( $query->have_posts() ) {

				$this->widget_start( $args, $instance );

				$counter = 1;
				$j       = 0;

				$found_post = $query->post_count;

				$style                   = isset( $instance['special_grid_style'] ) ? $instance['special_grid_style'] : $this->settings['special_grid_style']['std'];
				$title_limit             = isset( $instance['title_limit'] ) ? $instance['title_limit'] : $this->settings['title_limit']['std'];
				$enable_post_format_icon = isset( $instance['enable_post_format_icon'] ) ? $instance['enable_post_format_icon'] : $this->settings['enable_post_format_icon']['std'];
				$col_arr_class           = array( 'col-lg-6', 'col-sm-6 col-lg-3', 'col-sm-6 col-lg-3' );

				if ( 'grid_style_6' == $style ) {
					$col_arr_class = array( 'col-lg-8', 'col-lg-4' );
				}

				do_action( 'blogprise_before_post_ids_special_grid' );
				?>
				<div class="blogprise-post-ids-special-grid <?php echo esc_attr( $style ); ?>">
					<div class="row g-4">
						<?php
						while ( $query->have_posts() ) :
							$query->the_post();

							$grid_wrapper_start = $grid_wrapper_end = '';

							switch ( $style ) {
								case 'grid_style_1':
									if ( 1 == $counter ) {
										$col_class = 'col-lg-6 first-col';
									} elseif ( $counter == 2 ) {
										$grid_wrapper_start = '<div class="col-lg-6 second-col"><div class="row g-4">';
										$col_class          = 'col-md-6';
										if ( $found_post == $counter ) {
											$grid_wrapper_end = '</div></div>';
										}
									} elseif ( $counter == 3 ) {
										$col_class = 'col-md-6';
										if ( $found_post == $counter ) {
											$grid_wrapper_end = '</div></div>';
										}
									} elseif ( $counter == 4 ) {
										$col_class        = 'col-md-12';
										$grid_wrapper_end = '</div></div>';
									} else {
										$col_class = 'col-md-4';
									}
									break;
								case 'grid_style_2':
									if ( 1 == $counter ) {
										$col_class = 'col-lg-6 first-col';
									} elseif ( $counter == 2 ) {
										$grid_wrapper_start = '<div class="col-lg-6 second-col"><div class="row g-4">';
										$col_class          = 'col-md-6';
										if ( $found_post == $counter ) {
											$grid_wrapper_end = '</div></div>';
										}
									} elseif ( $counter == 3 ) {
										$col_class = 'col-md-6';
										if ( $found_post == $counter ) {
											$grid_wrapper_end = '</div></div>';
										}
									} elseif ( $counter == 4 ) {
										$col_class = 'col-md-6';
										if ( $found_post == $counter ) {
											$grid_wrapper_end = '</div></div>';
										}
									} elseif ( $counter == 5 ) {
										$col_class        = 'col-md-6';
										$grid_wrapper_end = '</div></div>';
									} else {
										$col_class = 'col-md-4';
									}
									break;
								case 'grid_style_3':
								case 'grid_style_6':
									$col_class = $col_arr_class[ $j ];
									break;
								case 'grid_style_4':
									if ( 1 == $counter ) {
										$grid_wrapper_start = '<div class="col-lg-3 first-col"><div class="row g-4">';
										$col_class          = 'col-sm-6 col-lg-12';
										if ( $found_post == $counter ) {
											$grid_wrapper_end = '</div></div>';
										}
									} elseif ( $counter == 2 ) {
										$col_class        = 'col-sm-6 col-lg-12';
										$grid_wrapper_end = '</div></div>';
									} elseif ( $counter == 3 ) {
										$grid_wrapper_start = '<div class="col-lg-6 mid-col">';
										$col_class          = '';
										$grid_wrapper_end   = '</div>';
									} elseif ( $counter == 4 ) {
										$grid_wrapper_start = '<div class="col-lg-3 last-col"><div class="row g-4">';
										$col_class          = 'col-sm-6 col-lg-12';
										if ( $found_post == $counter ) {
											$grid_wrapper_end = '</div></div>';
										}
									} elseif ( $counter == 5 ) {
										$col_class        = 'col-sm-6 col-lg-12';
										$grid_wrapper_end = '</div></div>';
									} else {
										$col_class = 'col-md-4';
									}
									break;
								case 'grid_style_7':
									$col_class = 'col-md-6';
									break;
								default:
									$col_class = 'col-md-4';
							}

							?>
							
							<?php echo wp_kses_post( $grid_wrapper_start ); ?>

							<div class="<?php echo esc_attr( $col_class ); ?>">
								<div class="saga-block-item-w-overlay img-animate-zoom">
									<div class="saga-block-image-w-overlay blogprise-rounded-img">
										<a href="<?php the_permalink(); ?>" class="">
											<?php
											if ( $enable_post_format_icon ) {
												blogprise_post_format_icon( 'right' );
											}
											?>
											<span aria-hidden="true" class="blogprise-block-overlay overlay_w_gradient"></span>
											<?php the_post_thumbnail( 'blogprise-large-img' ); ?>
										</a>
									</div>
									<div class="saga-block-overlay-content">
										<?php
										$show_category = isset( $instance['show_category'] ) ? $instance['show_category'] : $this->settings['show_category']['std'];

										if ( $show_category ) {
											$cat_style = isset( $instance['category_style'] ) ? $instance['category_style'] : $this->settings['category_style']['std'];
											$color     = isset( $instance['category_color'] ) ? $instance['category_color'] : $this->settings['category_color']['std'];
											$limit     = isset( $instance['no_of_category'] ) ? $instance['no_of_category'] : $this->settings['no_of_category']['std'];
											blogprise_post_categories( $cat_style, $color, $limit );
										}

										?>
										<h3 class="saga-block-overlay-title blogprise-limit-lines <?php echo esc_attr( $title_limit ); ?>">
											<a href="<?php the_permalink(); ?>" class="text-decoration-none blogprise-title-line">
												<?php the_title(); ?>
											</a>
										</h3>
										<?php
										// Post Meta.
										$enabled_post_meta            = isset( $instance['post_meta'] ) ? $instance['post_meta'] : $this->settings['post_meta']['std'];
										$meta_settings['date_format'] = isset( $instance['date_format'] ) ? $instance['date_format'] : $this->settings['date_format']['std'];
										$meta_settings['show_icons']  = isset( $instance['post_meta_icon'] ) ? $instance['post_meta_icon'] : $this->settings['post_meta_icon']['std'];

										// Author Image.
										$meta_settings['author_image'] = false;
										if ( 1 == $counter ) {
											$meta_settings['author_image'] = isset( $instance['author_image'] ) ? $instance['author_image'] : $this->settings['author_image']['std'];
										}
										if ( 'grid_style_3' == $style || 'grid_style_4' == $style || 'grid_style_6' == $style ) {
											$meta_settings['author_image'] = false;
										}
										if ( 'grid_style_4' == $style && 3 == $counter ) {
											$meta_settings['author_image'] = isset( $instance['author_image'] ) ? $instance['author_image'] : $this->settings['author_image']['std'];
										}
										if ( 'grid_style_5' == $style || 'grid_style_7' == $style ) {
											$meta_settings['author_image'] = isset( $instance['author_image'] ) ? $instance['author_image'] : $this->settings['author_image']['std'];
										}
										blogprise_post_meta_info( $enabled_post_meta, $meta_settings );
										?>
									</div>
								</div>
							</div><!-- col -->
							
							<?php echo wp_kses_post( $grid_wrapper_end ); ?>

							<?php
							if ( 'grid_style_3' == $style ) {
								++$j;
								if ( $counter % 3 == 0 ) {
									$j             = 0;
									$col_arr_class = array_reverse( $col_arr_class );
								}
							}
							if ( 'grid_style_6' == $style ) {
								++$j;
								if ( $counter % 2 == 0 ) {
									$j             = 0;
									$col_arr_class = array_reverse( $col_arr_class );
								}
							}
							++$counter;
							endwhile;
						wp_reset_postdata();
						?>
					</div>
				</div><!--.blogprise-post-ids-special-grid-->
				<?php
				do_action( 'blogprise_after_post_ids_special_grid' );

				$this->widget_end( $args );
			}
		}
		echo ob_get_clean();
	}

	public function enqueue_assets() {
		if ( is_active_widget( false, false, $this->id_base ) ) {
			$file_prefix = is_rtl() ? '-rtl' : '';
			$css_file = get_template_directory() . '/inc/widgets/css/post-ids-special-grid' . $file_prefix . '.css';
			if ( file_exists( $css_file ) ) {
				$styles = wp_strip_all_tags( file_get_contents( $css_file ) );
				wp_add_inline_style( 'blogprise-style', $styles );
			}
		}
	}
}
