<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Blogprise_Popular_Posts extends Blogprise_Widget_Base {
	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'widget_blogprise_popular_posts';
		$this->widget_description = __( 'Displays popular posts with an image', 'blogprise' );
		$this->widget_id          = 'blogprise_popular_posts';
		$this->widget_name        = __( 'Blogprise: Popular Posts', 'blogprise' );
		$this->settings           = array(
			'title'                   => array(
				'type'  => 'text',
				'label' => __( 'Title', 'blogprise' ),
			),
			'post_settings_heading'   => array(
				'type'  => 'heading',
				'label' => __( 'Post Settings', 'blogprise' ),
			),
			'category'                => array(
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
			'number'                  => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => '',
				'std'   => 5,
				'label' => __( 'Number of posts to show', 'blogprise' ),
			),
			'offset'                  => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 0,
				'max'   => '',
				'std'   => '',
				'label' => __( 'Offset', 'blogprise' ),
				'desc'  => __( 'Can be useful if you want to skip certain number of posts. Leave as 0 if you do not want to use it.', 'blogprise' ),
			),
			'orderby'                 => array(
				'type'    => 'select',
				'std'     => 'comment_count',
				'label'   => __( 'Order by', 'blogprise' ),
				'options' => array(
					'date'          => __( 'Date', 'blogprise' ),
					'ID'            => __( 'ID', 'blogprise' ),
					'title'         => __( 'Title', 'blogprise' ),
					'rand'          => __( 'Random', 'blogprise' ),
					'comment_count' => __( 'Comment Count', 'blogprise' ),
				),
			),
			'order'                   => array(
				'type'    => 'select',
				'std'     => 'desc',
				'label'   => __( 'Order', 'blogprise' ),
				'options' => array(
					'asc'  => __( 'ASC', 'blogprise' ),
					'desc' => __( 'DESC', 'blogprise' ),
				),
			),
			'meta_settings_heading'   => array(
				'type'  => 'heading',
				'label' => __( 'Post Meta Settings', 'blogprise' ),
			),
			'post_meta'               => array(
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
			'post_meta_icon'          => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Post Meta Icon', 'blogprise' ),
				'desc'  => __( 'Some Icons may show up regardless to provide better info.', 'blogprise' ),
				'std'   => true,
			),
			'date_format'             => array(
				'type'    => 'select',
				'label'   => __( 'Date Format', 'blogprise' ),
				'desc'    => __( 'Make sure to select Date from above for this to work.', 'blogprise' ),
				'options' => array(
					'format_1' => __( 'Times Ago', 'blogprise' ),
					'format_2' => __( 'Default Format', 'blogprise' ),
				),
				'std'     => 'format_1',
			),
			'author_image'            => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Author Image', 'blogprise' ),
				'desc'  => __( 'Make sure to select Author from above for this to work.', 'blogprise' ),
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
			'widget_settings_heading' => array(
				'type'  => 'heading',
				'label' => __( 'Widget Settings', 'blogprise' ),
			),
			'post_counter_position'   => array(
				'type'    => 'select',
				'label'   => __( 'Post Counter Position', 'blogprise' ),
				'options' => array(
					'center'       => __( 'Center', 'blogprise' ),
					'top_left'     => __( 'Top Left', 'blogprise' ),
					'top_right'    => __( 'Top Right', 'blogprise' ),
					'bottom_left'  => __( 'Bottom Left', 'blogprise' ),
					'bottom_right' => __( 'Bottom Right', 'blogprise' ),
				),
				'std'     => 'center',
			),
			'style'                   => array(
				'type'    => 'select',
				'label'   => __( 'Style', 'blogprise' ),
				'options' => array(
					'style_1' => __( 'Default', 'blogprise' ),
					'style_2' => __( 'Circled Image', 'blogprise' ),
				),
				'std'     => 'style_1',
			),
			'bg_overlay_color'        => array(
				'type'  => 'color',
				'label' => __( 'Overlay Color', 'blogprise' ),
				'std'   => '#000000',
			),
			'overlay_opacity'         => array(
				'type'  => 'number',
				'step'  => 10,
				'min'   => 0,
				'max'   => 100,
				'std'   => 50,
				'label' => __( 'Overlay Opacity', 'blogprise' ),
			),
			'invert_list_post'        => array(
				'type'  => 'checkbox',
				'label' => __( 'Invert List Post', 'blogprise' ),
				'std'   => false,
			),
			'inverted_block_color'    => array(
				'type'  => 'checkbox',
				'label' => __( 'Inverted Color', 'blogprise' ),
				'desc'  => __( 'Can be used if you have dark background and want lighter color on the text.', 'blogprise' ),
				'std'   => false,
			),
			'title_limit'             => array(
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

		if ( ! empty( $instance['category'] ) && -1 !== $instance['category'] && 0 !== $instance['category'] ) {
			$query_args['tax_query'][] = array(
				'taxonomy' => 'category',
				'field'    => 'term_id',
				'terms'    => $instance['category'],
			);
		}

		return new WP_Query( apply_filters( 'blogprise_popular_posts_query_args', $query_args ) );
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

			do_action( 'blogprise_before_popular_posts_with_image' );

			$style            = isset( $instance['style'] ) ? $instance['style'] : $this->settings['style']['std'];
			$widget_class     = $style;
			$title_limit      = isset( $instance['title_limit'] ) ? $instance['title_limit'] : $this->settings['title_limit']['std'];
			$invert_list_post = isset( $instance['invert_list_post'] ) ? $instance['invert_list_post'] : $this->settings['invert_list_post']['std'];
			if ( $invert_list_post ) {
				$widget_class .= ' saga-inverted-item';
			}
			$enabled_post_meta             = isset( $instance['post_meta'] ) ? $instance['post_meta'] : $this->settings['post_meta']['std'];
			$meta_settings['date_format']  = isset( $instance['date_format'] ) ? $instance['date_format'] : $this->settings['date_format']['std'];
			$meta_settings['author_image'] = isset( $instance['author_image'] ) ? $instance['author_image'] : $this->settings['author_image']['std'];
			$meta_settings['show_icons']   = isset( $instance['post_meta_icon'] ) ? $instance['post_meta_icon'] : $this->settings['post_meta_icon']['std'];
			$inverted_block_color          = isset( $instance['inverted_block_color'] ) ? $instance['inverted_block_color'] : $this->settings['inverted_block_color']['std'];

			$show_category = isset( $instance['show_category'] ) ? $instance['show_category'] : $this->settings['show_category']['std'];
			if ( $show_category ) {
				$cat_style = isset( $instance['category_style'] ) ? $instance['category_style'] : $this->settings['category_style']['std'];
				$color     = isset( $instance['category_color'] ) ? $instance['category_color'] : $this->settings['category_color']['std'];
				$limit     = isset( $instance['no_of_category'] ) ? $instance['no_of_category'] : $this->settings['no_of_category']['std'];
			}

			// Inverted Color.
			if ( $inverted_block_color ) {
				$widget_class .= ' saga-block-inverted-color';
			}
			?>

			<div class="blogprise-popular-posts-widget <?php echo esc_attr( $widget_class ); ?>">
				<div class="blogprise-list-posts">
					<?php
					$counter       = 1;
					$wrapper_class = $counter_class = '';

					$counter_position = isset( $instance['post_counter_position'] ) ? $instance['post_counter_position'] : $this->settings['post_counter_position']['std'];
					$counter_class    = $counter_position;

					$bg_overlay_color = isset( $instance['bg_overlay_color'] ) ? $instance['bg_overlay_color'] : $this->settings['bg_overlay_color']['std'];
					$overlay_opacity  = isset( $instance['overlay_opacity'] ) ? $instance['overlay_opacity'] : $this->settings['overlay_opacity']['std'];

					$style  = 'background-color:' . $bg_overlay_color . ';';
					$style .= 'opacity:' . ( $overlay_opacity / 100 ) . ';';

					while ( $posts->have_posts() ) :
						$posts->the_post();
						?>
							<div class="blogprise-article-block-wrapper<?php echo esc_attr( $wrapper_class ); ?>">
								<?php if ( has_post_thumbnail() ) : ?>
									<div class="article-image blogprise-rounded-img">
										<a href="<?php the_permalink(); ?>">
											<span class="article-counter bg-accent <?php echo esc_attr( $counter_class ); ?>"><?php echo esc_html( $counter ); ?></span>
											<span aria-hidden="true" class="blogprise-block-overlay" style="<?php echo esc_attr( $style ); ?>"></span>
											<?php
											the_post_thumbnail(
												'thumbnail',
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
								<?php endif; ?>
								<div class="article-details">
									<?php if ( $show_category ) : ?>
										<div class="article-cat-info">
											<?php blogprise_post_categories( $cat_style, $color, $limit ); ?>
										</div>
									<?php endif; ?>
									<h3 class="article-title no-margin color-accent-hover blogprise-limit-lines <?php echo esc_attr( $title_limit ); ?>">
										<a href="<?php the_permalink(); ?>" class="text-decoration-none blogprise-title-line">
											<?php the_title(); ?>
										</a>
									</h3>
									<?php blogprise_post_meta_info( $enabled_post_meta, $meta_settings ); ?>
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

			do_action( 'blogprise_after_popular_posts_with_image' );

			$this->widget_end( $args );
		}

		echo ob_get_clean();
	}

	public function enqueue_assets() {
		if ( is_active_widget( false, false, $this->id_base ) ) {
			$file_prefix = is_rtl() ? '-rtl' : '';
			$css_file    = get_template_directory() . '/inc/widgets/css/popular-posts' . $file_prefix . '.css';
			if ( file_exists( $css_file ) ) {
				$styles = wp_strip_all_tags( file_get_contents( $css_file ) );
				wp_add_inline_style( 'blogprise-style', $styles );
			}
		}
	}
}
