<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Blogprise_Grid_Posts extends Blogprise_Widget_Base {
	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'blogprise_grid_posts_widget';
		$this->widget_description = __( 'Displays posts in grid style', 'blogprise' );
		$this->widget_id          = 'blogprise_double_column_posts';
		$this->widget_name        = __( 'Blogprise: Grid Posts', 'blogprise' );
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
				'std'   => 6,
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
				'std'     => array( 'author', 'date' ),
			),
			'post_meta_icon'            => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Post Meta Icon', 'blogprise' ),
				'desc'  => __( 'Some Icons may show up regardless to provide better info.', 'blogprise' ),
				'std'   => false,
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
				'std'   => true,
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
			'no_of_column'              => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => 5,
				'std'   => 2,
				'label' => __( 'Number of Column', 'blogprise' ),
			),
			'justify_content'           => array(
				'type'  => 'checkbox',
				'label' => __( 'Justify Content', 'blogprise' ),
				'std'   => false,
			),
			'card_layout'               => array(
				'type'    => 'select',
				'label'   => __( 'Card Layout', 'blogprise' ),
				'options' => array(
					''              => __( '&mdash; Select &mdash;', 'blogprise' ),
					'card_layout_1' => __( 'Layout One', 'blogprise' ),
					'card_layout_2' => __( 'Layout Two', 'blogprise' ),
				),
				'std'     => '',
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
			'hide_image'                => array(
				'type'  => 'checkbox',
				'label' => __( 'Hide Image', 'blogprise' ),
				'std'   => false,
			),
			'post_counter_position'     => array(
				'type'    => 'select',
				'label'   => __( 'Post Counter', 'blogprise' ),
				'options' => array(
					''             => __( '&mdash; Select &mdash;', 'blogprise' ),
					'top_left'     => __( 'Top Left', 'blogprise' ),
					'top_right'    => __( 'Top Right', 'blogprise' ),
					'bottom_left'  => __( 'Bottom Left', 'blogprise' ),
					'bottom_right' => __( 'Bottom Right', 'blogprise' ),
				),
				'std'     => '',
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
	 * Query the posts and return them.
	 *
	 * @param  array $args
	 * @param  array $instance
	 * @return WP_Query
	 */
	public function get_posts( $args, $instance ) {
		$number  = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : $this->settings['number']['std'];
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

		return new WP_Query( apply_filters( 'blogprise_grid_posts_query_args', $query_args ) );
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

			do_action( 'blogprise_before_grid_posts' );

			$column                  = isset( $instance['no_of_column'] ) ? $instance['no_of_column'] : $this->settings['no_of_column']['std'];
			$title_limit             = isset( $instance['title_limit'] ) ? $instance['title_limit'] : $this->settings['title_limit']['std'];
			$enable_post_format_icon = isset( $instance['enable_post_format_icon'] ) ? $instance['enable_post_format_icon'] : $this->settings['enable_post_format_icon']['std'];
			$inverted_block_color    = isset( $instance['inverted_block_color'] ) ? $instance['inverted_block_color'] : $this->settings['inverted_block_color']['std'];
			$hide_image              = isset( $instance['hide_image'] ) ? $instance['hide_image'] : $this->settings['hide_image']['std'];
			$show_excerpt            = isset( $instance['show_excerpt'] ) ? $instance['show_excerpt'] : $this->settings['show_excerpt']['std'];
			$excerpt_length          = isset( $instance['excerpt_length'] ) ? $instance['excerpt_length'] : $this->settings['excerpt_length']['std'];
			$show_read_more          = isset( $instance['show_read_more'] ) ? $instance['show_read_more'] : $this->settings['show_read_more']['std'];
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
			$enabled_post_meta             = isset( $instance['post_meta'] ) ? $instance['post_meta'] : $this->settings['post_meta']['std'];
			$meta_settings['date_format']  = isset( $instance['date_format'] ) ? $instance['date_format'] : $this->settings['date_format']['std'];
			$meta_settings['author_image'] = isset( $instance['author_image'] ) ? $instance['author_image'] : $this->settings['author_image']['std'];
			$meta_settings['show_icons']   = isset( $instance['post_meta_icon'] ) ? $instance['post_meta_icon'] : $this->settings['post_meta_icon']['std'];

			$col_class = 'row row-cols-1 g-4';

			if ( 1 == $column ) {
				$col_class .= ' blogprise-grid-1';
			} elseif ( 2 == $column ) {
				$col_class .= ' row-cols-sm-2 blogprise-grid-2';
			} elseif ( 3 == $column ) {
				$col_class .= ' row-cols-md-3 blogprise-grid-3';
			} elseif ( 4 == $column ) {
				$col_class .= ' row-cols-sm-2 row-cols-xl-4 blogprise-grid-4';
			} elseif ( 5 == $column ) {
				$col_class .= ' row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 blogprise-grid-5';
			} else {
				$col_class .= ' row-cols-sm-2 blogprise-grid-2';
			}

			// Inverted Color.
			$widget_class = '';
			if ( $inverted_block_color ) {
				$widget_class .= ' saga-block-inverted-color';
			}

			// Card Layout.
			$card_layout = isset( $instance['card_layout'] ) ? $instance['card_layout'] : $this->settings['card_layout']['std'];
			if ( $card_layout ) {
				$widget_class .= ' is-active-card-layout ' . $card_layout;
			}

			// Justify Content.
			$justify_content = isset( $instance['justify_content'] ) ? $instance['justify_content'] : $this->settings['justify_content']['std'];
			if ( $justify_content ) {
				$widget_class .= ' blogprise-justify-article-contents';
			}

			$counter          = 1;
			$counter_position = isset( $instance['post_counter_position'] ) ? $instance['post_counter_position'] : $this->settings['post_counter_position']['std'];
			$counter_class    = $counter_position;

			?>

			<div class="blogprise-grid-posts-widget <?php echo esc_attr( $widget_class ); ?>">
				<div class="<?php echo esc_attr( $col_class ); ?>">
					<?php
					while ( $posts->have_posts() ) :
						$posts->the_post();
						?>
							<div class="col">
								<div class="blogprise-article-block-wrapper blogprise-card-box img-animate-zoom">
									<?php
									if ( ! $hide_image && has_post_thumbnail() ) {
										?>
										<div class="article-image blogprise-rounded-img">
											<a href="<?php the_permalink(); ?>">
												<?php if ( $counter_position ) : ?>
													<span class="article-counter bg-accent <?php echo esc_attr( $counter_class ); ?>"><?php echo esc_html( $counter ); ?></span>
												<?php endif; ?>
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
										</div>
										<?php
									}
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
										<?php
										blogprise_post_meta_info( $enabled_post_meta, $meta_settings );
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
						++$counter;
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</div>
			<?php

			do_action( 'blogprise_after_grid_posts' );

			$this->widget_end( $args );
		}

		echo ob_get_clean();
	}

	public function enqueue_assets() {
		if ( is_active_widget( false, false, $this->id_base ) ) {
			$file_prefix = is_rtl() ? '-rtl' : '';
			$css_file    = get_template_directory() . '/inc/widgets/css/grid-posts' . $file_prefix . '.css';
			if ( file_exists( $css_file ) ) {
				$styles = wp_strip_all_tags( file_get_contents( $css_file ) );
				wp_add_inline_style( 'blogprise-style', $styles );
			}
		}
	}
}
