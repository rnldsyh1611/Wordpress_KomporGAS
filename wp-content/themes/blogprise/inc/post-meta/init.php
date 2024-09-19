<?php
/**
 * Implement posts metabox.
 *
 * @package Blogprise
 */

if ( ! function_exists( 'blogprise_add_theme_meta_box' ) ) :

	/**
	 * Add the Meta Box
	 *
	 * @since 1.0.0
	 */
	function blogprise_add_theme_meta_box() {

		$post_types = array( 'post', 'page' );

		foreach ( $post_types as $post_type ) {
			add_meta_box(
				'blogprise-meta-box',
				sprintf(
					/* translators: %s: Post Type. */
					esc_html__( '%s Settings', 'blogprise' ),
					ucwords( $post_type )
				),
				'blogprise_meta_box_html',
				$post_type,
				'normal',
				'high'
			);
		}
	}

endif;
add_action( 'add_meta_boxes', 'blogprise_add_theme_meta_box' );

if ( ! function_exists( 'blogprise_meta_box_html' ) ) :

	/**
	 * Render theme settings meta box.
	 *
	 * @param mixed $post Post Object.
	 * @since 1.0.0
	 */
	function blogprise_meta_box_html( $post ) {

		global $post_type;

		wp_nonce_field( basename( __FILE__ ), 'blogprise_meta_box_nonce' );

		$page_layout             = get_post_meta( $post->ID, 'blogprise_page_layout', true );
		$sidebar_border_meta     = get_post_meta( $post->ID, 'blogprise_enable_sidebar_border', true );
		$center_page_header_meta = get_post_meta( $post->ID, 'center_align_page_header_meta', true );
		$disable_page_title      = get_post_meta( $post->ID, 'blogprise_disable_page_title', true );
		$disable_page_breadcrumb = get_post_meta( $post->ID, 'blogprise_disable_page_breadcrumb', true );
		$center_post_header_meta = get_post_meta( $post->ID, 'center_align_post_header_meta', true );
		$post_style              = get_post_meta( $post->ID, 'blogprise_single_post_style', true );
		$post_nav_style          = get_post_meta( $post->ID, 'blogprise_single_post_nav_style', true );
		$override_post_metas     = get_post_meta( $post->ID, 'blogprise_override_post_metas', true );
		$selected_postmetas      = get_post_meta( $post->ID, 'blogprise_single_post_metas', true );
		$show_post_meta_icons    = get_post_meta( $post->ID, 'show_post_meta_icons', true );
		$cat_color_display       = get_post_meta( $post->ID, 'blogprise_cat_color_display', true );
		$cat_style               = get_post_meta( $post->ID, 'blogprise_cat_style', true );
		$show_author_info        = get_post_meta( $post->ID, 'blogprise_show_author_info', true );
		$show_related_posts      = get_post_meta( $post->ID, 'blogprise_show_related_posts', true );
		$show_author_posts       = get_post_meta( $post->ID, 'blogprise_show_author_posts', true );
		$layouts                 = blogprise_get_general_layouts();

		$available_post_metas = array(
			'author'    => __( 'Author', 'blogprise' ),
			'category'  => __( 'Category', 'blogprise' ),
			'read_time' => __( 'Post Read Time', 'blogprise' ),
			'date'      => __( 'Date', 'blogprise' ),
			'comment'   => __( 'Comment', 'blogprise' ),
			'tags'      => __( 'Tags', 'blogprise' ),
		);

		?>
		<div id="blogprise-settings-metabox-container" class='inside be-meta-box'>
			<h3><?php esc_html_e( 'Override the customizer global settings from here. Leave as it is if you want it to be same as global settings.', 'blogprise' ); ?></h3>
			<div class="blogprise-meta-options-wrapper">

				<div class="blogprise-meta-tab-header">
					<a href="#" class="blogprise-tab-title is-active" data-tab="section-page-layout">
						<h3><?php esc_html_e( 'Page Layout', 'blogprise' ); ?></h3>
					</a>
					<a href="#" class="blogprise-tab-title" data-tab="section-metas">
						<h3><?php esc_html_e( 'Metas', 'blogprise' ); ?></h3>
					</a>

					<?php if ( 'post' == $post_type ) : ?>
						<a href="#" class="blogprise-tab-title" data-tab="section-category">
							<h3><?php esc_html_e( 'Category', 'blogprise' ); ?></h3>
						</a>
						<a href="#" class="blogprise-tab-title" data-tab="section-author-elements">
							<h3><?php esc_html_e( 'Author Elements', 'blogprise' ); ?></h3>
						</a>
						<a href="#" class="blogprise-tab-title" data-tab="section-related-posts">
							<h3><?php esc_html_e( 'Related Posts', 'blogprise' ); ?></h3>
						</a>
					<?php endif; ?>
					
				</div>

				<div class="blogprise-meta-tab-content">

					<?php if ( 'page' == $post_type ) : ?>

						<!-- Layout Tab -->
						<div class="blogprise-tab-content is-active" id="blogprise-tab-section-page-layout">
							<div class="blogprise-meta-row">
								<h4><label for="page-layout"><?php esc_html_e( 'Page Layout', 'blogprise' ); ?></label></h4>
								<div class="blogprise-radio-image">
									<?php
									if ( ! empty( $layouts ) && is_array( $layouts ) ) {
										foreach ( $layouts as $value => $option ) :
											?>
											<input class="image-select" type="radio" id="<?php echo esc_attr( $value ); ?>" name="blogprise_page_layout" value="<?php echo esc_attr( $value ); ?>" <?php checked( $value, $page_layout ); ?>>
											<label for="<?php echo esc_attr( $value ); ?>">
												<img src="<?php echo esc_html( $option['url'] ); ?>" alt="<?php echo esc_attr( $option['label'] ); ?>" title="<?php echo esc_attr( $option['label'] ); ?>">
											</label>
											<?php
										endforeach;
									}
									?>
								</div>
							</div>
							<div class="blogprise-meta-row">
								<h4><label for="sidebar-border-meta"><?php esc_html_e( 'Sidebar Border', 'blogprise' ); ?></label></h4>
								<div class="post-section-wrap">
									<select id="sidebar-border-meta" name="blogprise_enable_sidebar_border" class="widefat">
										<option value=""><?php esc_html_e( 'Inherit', 'blogprise' ); ?></option>
										<option value="1" <?php selected( $sidebar_border_meta, 1 ); ?>><?php esc_html_e( 'Yes', 'blogprise' ); ?></option>
										<option value="0" <?php selected( $sidebar_border_meta, 0 ); ?>><?php esc_html_e( 'No', 'blogprise' ); ?></option>
									</select>
								</div>
							</div>
							<div class="blogprise-meta-row">
								<p>
									<input  type="checkbox" id="disable-page-title" name="blogprise_disable_page_title" value="1" <?php checked( 1, $disable_page_title ); ?> />
									<label for="disable-page-title"><?php esc_html_e( 'Disable Page Title', 'blogprise' ); ?></label>
								</p>
							</div>
							<div class="blogprise-meta-row">
								<p>
									<input  type="checkbox" id="disable-page-breadcrumb" name="blogprise_disable_page_breadcrumb" value="1" <?php checked( 1, $disable_page_breadcrumb ); ?> />
									<label for="disable-page-breadcrumb"><?php esc_html_e( 'Disable Page Breadcrumb', 'blogprise' ); ?></label>
								</p>
							</div>
						</div>

						<!-- Meta Tab -->
						<div class="blogprise-tab-content" id="blogprise-tab-section-metas">
							<div class="blogprise-meta-row">
								<p>
									<input  type="checkbox" id="center-align-page-header-meta" name="center_align_page_header_meta" value="1" <?php checked( 1, $center_page_header_meta ); ?> />
									<label for="center-align-page-header-meta"><?php esc_html_e( 'Center Align Page Header Meta', 'blogprise' ); ?></label>
								</p>
							</div>
						</div>

					<?php endif; ?>

					<?php if ( 'post' == $post_type ) : ?>

						<!-- Layout Tab -->
						<div class="blogprise-tab-content is-active" id="blogprise-tab-section-page-layout">
							<div class="blogprise-meta-row">
								<h4><label for="page-layout"><?php esc_html_e( 'Page Layout', 'blogprise' ); ?></label></h4>
								<div class="blogprise-radio-image">
									<?php
									if ( ! empty( $layouts ) && is_array( $layouts ) ) {
										foreach ( $layouts as $value => $option ) :
											?>
											<input class="image-select" type="radio" id="<?php echo esc_attr( $value ); ?>" name="blogprise_page_layout" value="<?php echo esc_attr( $value ); ?>" <?php checked( $value, $page_layout ); ?>>
											<label for="<?php echo esc_attr( $value ); ?>">
												<img src="<?php echo esc_html( $option['url'] ); ?>" alt="<?php echo esc_attr( $option['label'] ); ?>" title="<?php echo esc_attr( $option['label'] ); ?>">
											</label>
											<?php
										endforeach;
									}
									?>
								</div>
							</div>
							<div class="blogprise-meta-row">
								<h4><label for="sidebar-border-meta"><?php esc_html_e( 'Sidebar Border', 'blogprise' ); ?></label></h4>
								<div class="post-section-wrap">
									<select id="sidebar-border-meta" name="blogprise_enable_sidebar_border" class="widefat">
										<option value=""><?php esc_html_e( 'Inherit', 'blogprise' ); ?></option>
										<option value="1" <?php selected( $sidebar_border_meta, 1 ); ?>><?php esc_html_e( 'Yes', 'blogprise' ); ?></option>
										<option value="0" <?php selected( $sidebar_border_meta, 0 ); ?>><?php esc_html_e( 'No', 'blogprise' ); ?></option>
									</select>
								</div>
							</div>
							<div class="blogprise-meta-row">
								<h4><label for="post-style"><?php esc_html_e( 'Post Style', 'blogprise' ); ?></label></h4>
								<div class="post-style-wrap">
									<?php $post_layouts = blogprise_get_single_layouts(); ?>
									<select id="post-style" name="blogprise_single_post_style" class="widefat">
										<option><?php esc_html_e( 'Inherit', 'blogprise' ); ?></option>
										<?php foreach ( $post_layouts as $key => $value ) : ?>
											<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $post_style, $key ); ?>>
												<?php echo $value; ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="blogprise-meta-row">
								<h4><label for="post-navigation-style"><?php esc_html_e( 'Post Navigation Style', 'blogprise' ); ?></label></h4>
								<div class="post-navigation-style-wrap">
									<?php $navigation_styles = blogprise_get_single_navigation_styles(); ?>
									<select id="post-navigation-style" name="blogprise_single_post_nav_style" class="widefat">
										<option><?php esc_html_e( 'Inherit', 'blogprise' ); ?></option>
										<?php foreach ( $navigation_styles as $key => $value ) : ?>
											<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $post_nav_style, $key ); ?>>
												<?php echo $value; ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>

						<!-- Meta Tab -->
						<div class="blogprise-tab-content" id="blogprise-tab-section-metas">
							<div class="blogprise-meta-row">
								<h4><label for="center-align-post-header-meta"><?php esc_html_e( 'Center Align Post Header Meta', 'blogprise' ); ?></label></h4>
								<div class="post-section-wrap">
									<select id="center-align-post-header-meta" name="center_align_post_header_meta" class="widefat">
										<option value=""><?php esc_html_e( 'Inherit', 'blogprise' ); ?></option>
										<option value="1" <?php selected( $center_post_header_meta, 1 ); ?>><?php esc_html_e( 'Yes', 'blogprise' ); ?></option>
										<option value="0" <?php selected( $center_post_header_meta, 0 ); ?>><?php esc_html_e( 'No', 'blogprise' ); ?></option>
									</select>
								</div>
							</div>
							<div class="blogprise-meta-row g-0">
								<h4><legend><?php esc_html_e( 'Post Metas', 'blogprise' ); ?></legend></h4>
								<p>
									<input  type="checkbox" id="blogprise-override-post-metas" name="blogprise_override_post_metas" value="1" <?php checked( 1, $override_post_metas ); ?> />
									<label for="blogprise-override-post-metas"><?php esc_html_e( 'Override displayed post metas from the customizer on single post page?', 'blogprise' ); ?></label>
								</p>
								<div class="blogprise-available-post-metas" <?php echo ( ! $override_post_metas ? ' style="display:none"' : '' ); ?>>
									<?php
									foreach ( $available_post_metas as $id => $element ) {
										if ( is_array( $selected_postmetas ) && in_array( $id, $selected_postmetas ) ) {
											$checked = 'checked="checked"';
										} else {
											$checked = null;
										}
										?>
										<p>
											<input  type="checkbox" id="<?php echo esc_attr( $id ); ?>" name="blogprise_single_post_metas[]" value="<?php echo esc_attr( $id ); ?>" <?php echo esc_attr( $checked ); ?> />
											<label for="<?php echo esc_attr( $id ); ?>"><?php echo $element; ?></label>
										</p>
										<?php
									}
									?>
								</div>
							</div>
							<div class="blogprise-meta-row">
								<h4><label for="post-meta-icons"><?php esc_html_e( 'Show Post Meta Icons', 'blogprise' ); ?></label></h4>
								<div class="post-section-wrap">
									<select id="post-meta-icons" name="blogprise_show_post_meta_icons" class="widefat">
										<option value=""><?php esc_html_e( 'Inherit', 'blogprise' ); ?></option>
										<option value="1" <?php selected( $show_post_meta_icons, 1 ); ?>><?php esc_html_e( 'Yes', 'blogprise' ); ?></option>
										<option value="0" <?php selected( $show_post_meta_icons, 0 ); ?>><?php esc_html_e( 'No', 'blogprise' ); ?></option>
									</select>
								</div>
							</div>
						</div>

						<!-- Category Tab -->
						<div class="blogprise-tab-content" id="blogprise-tab-section-category">
							<div class="blogprise-meta-row">
								<h4><label for="category-color-display"><?php esc_html_e( 'Category Color Display', 'blogprise' ); ?></label></h4>
								<div class="post-section-wrap">
									<?php $cat_color_display_options = blogprise_get_category_color_display(); ?>
									<select id="category-color-display" name="blogprise_cat_color_display" class="widefat">
										<option value=""><?php esc_html_e( 'Inherit', 'blogprise' ); ?></option>
										<?php foreach ( $cat_color_display_options as $key => $value ) : ?>
											<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $cat_color_display, $key ); ?>>
												<?php echo $value; ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="blogprise-meta-row">
								<h4><label for="category-style"><?php esc_html_e( 'Category Style', 'blogprise' ); ?></label></h4>
								<div class="post-section-wrap">
									<?php $cat_styles = blogprise_get_category_styles(); ?>
									<select id="category-style" name="blogprise_cat_style" class="widefat">
										<option value=""><?php esc_html_e( 'Inherit', 'blogprise' ); ?></option>
										<?php foreach ( $cat_styles as $key => $value ) : ?>
											<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $cat_style, $key ); ?>>
												<?php echo $value; ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>

						<!-- Author Tab -->
						<div class="blogprise-tab-content" id="blogprise-tab-section-author-elements">
							<div class="blogprise-meta-row">
								<h4><label for="author-info"><?php esc_html_e( 'Show Author Info Box', 'blogprise' ); ?></label></h4>
								<div class="post-section-wrap">
									<select id="author-info" name="blogprise_show_author_info" class="widefat">
										<option value=""><?php esc_html_e( 'Inherit', 'blogprise' ); ?></option>
										<option value="1" <?php selected( $show_author_info, 1 ); ?>><?php esc_html_e( 'Yes', 'blogprise' ); ?></option>
										<option value="0" <?php selected( $show_author_info, 0 ); ?>><?php esc_html_e( 'No', 'blogprise' ); ?></option>
									</select>
								</div>
							</div>
							<div class="blogprise-meta-row">
								<h4><label for="author-posts"><?php esc_html_e( 'Show Author Posts', 'blogprise' ); ?></label></h4>
								<div class="post-section-wrap">
									<select id="author-posts" name="blogprise_show_author_posts" class="widefat">
										<option value=""><?php esc_html_e( 'Inherit', 'blogprise' ); ?></option>
										<option value="1" <?php selected( $show_author_posts, 1 ); ?>><?php esc_html_e( 'Yes', 'blogprise' ); ?></option>
										<option value="0" <?php selected( $show_author_posts, 0 ); ?>><?php esc_html_e( 'No', 'blogprise' ); ?></option>
									</select>
								</div>
							</div>
						</div>

						<!-- Related Posts -->
						<div class="blogprise-tab-content" id="blogprise-tab-section-related-posts">
							<div class="blogprise-meta-row">
								<h4><label for="related-posts"><?php esc_html_e( 'Show Related Posts', 'blogprise' ); ?></label></h4>
								<div class="post-section-wrap">
									<select id="related-posts" name="blogprise_show_related_posts" class="widefat">
										<option value=""><?php esc_html_e( 'Inherit', 'blogprise' ); ?></option>
										<option value="1" <?php selected( $show_related_posts, 1 ); ?>><?php esc_html_e( 'Yes', 'blogprise' ); ?></option>
										<option value="0" <?php selected( $show_related_posts, 0 ); ?>><?php esc_html_e( 'No', 'blogprise' ); ?></option>
									</select>
								</div>
							</div>
						</div>

					<?php endif; ?>

				</div>

			</div>
		</div>
		<?php
	}

endif;


if ( ! function_exists( 'blogprise_save_postdata' ) ) :

	/**
	 * Save posts meta box value.
	 *
	 * @since 1.0.0
	 *
	 * @param int $post_id Post ID.
	 */
	function blogprise_save_postdata( $post_id ) {

		// Verify nonce.
		if ( ! isset( $_POST['blogprise_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['blogprise_meta_box_nonce'], basename( __FILE__ ) ) ) {
			return;
		}

		// Bail if auto save or revision.
		if ( defined( 'DOING_AUTOSAVE' ) || is_int( wp_is_post_revision( $post_id ) ) || is_int( wp_is_post_autosave( $post_id ) ) ) {
			return;
		}

		// Check the post being saved == the $post_id to prevent triggering this call for other save_post events.
		if ( empty( $_POST['post_ID'] ) || $_POST['post_ID'] != $post_id ) {
			return;
		}

		// Check permission.
		if ( 'page' === $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return;
			}
		} elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		// Page layout.
		if ( isset( $_POST['blogprise_page_layout'] ) ) {

			$valid_layout_values = array_keys( blogprise_get_general_layouts() );
			$layout_value        = sanitize_text_field( $_POST['blogprise_page_layout'] );
			if ( in_array( $layout_value, $valid_layout_values ) ) {
				update_post_meta( $post_id, 'blogprise_page_layout', $layout_value );
			} else {
				delete_post_meta( $post_id, 'blogprise_page_layout' );
			}
		}

		// Sidebar Border.
		if ( isset( $_POST['blogprise_enable_sidebar_border'] ) ) {
			if ( '1' == $_POST['blogprise_enable_sidebar_border'] ) {
				update_post_meta( $post_id, 'blogprise_enable_sidebar_border', 1 );
			} elseif ( '0' == $_POST['blogprise_enable_sidebar_border'] ) {
				update_post_meta( $post_id, 'blogprise_enable_sidebar_border', 0 );
			} else {
				delete_post_meta( $post_id, 'blogprise_enable_sidebar_border' );
			}
		}

		// Post style.
		if ( isset( $_POST['blogprise_single_post_style'] ) ) {
			$valid_post_styles = array_keys( blogprise_get_single_layouts() );
			$post_style_value  = sanitize_text_field( $_POST['blogprise_single_post_style'] );
			if ( in_array( $post_style_value, $valid_post_styles ) ) {
				update_post_meta( $post_id, 'blogprise_single_post_style', $post_style_value );
			} else {
				delete_post_meta( $post_id, 'blogprise_single_post_style' );
			}
		}

		// Center Align Page meta.
		if ( isset( $_POST['center_align_page_header_meta'] ) ) {
			update_post_meta( $post_id, 'center_align_page_header_meta', true );
		} else {
			delete_post_meta( $post_id, 'center_align_page_header_meta' );
		}

		// Disable Page title.
		if ( isset( $_POST['blogprise_disable_page_title'] ) ) {
			update_post_meta( $post_id, 'blogprise_disable_page_title', true );
		} else {
			delete_post_meta( $post_id, 'blogprise_disable_page_title' );
		}

		// Disable Page breadcrumb.
		if ( isset( $_POST['blogprise_disable_page_breadcrumb'] ) ) {
			update_post_meta( $post_id, 'blogprise_disable_page_breadcrumb', true );
		} else {
			delete_post_meta( $post_id, 'blogprise_disable_page_breadcrumb' );
		}

		// Center Align Post meta.
		if ( isset( $_POST['center_align_post_header_meta'] ) ) {
			if ( '1' == $_POST['center_align_post_header_meta'] ) {
				update_post_meta( $post_id, 'center_align_post_header_meta', 1 );
			} elseif ( '0' == $_POST['center_align_post_header_meta'] ) {
				update_post_meta( $post_id, 'center_align_post_header_meta', 0 );
			} else {
				delete_post_meta( $post_id, 'center_align_post_header_meta' );
			}
		}

		// Post Navigation style.
		if ( isset( $_POST['blogprise_single_post_nav_style'] ) ) {
			$valid_nav_styles = array_keys( blogprise_get_single_navigation_styles() );
			$post_nav_style   = sanitize_text_field( $_POST['blogprise_single_post_nav_style'] );
			if ( in_array( $post_nav_style, $valid_nav_styles ) ) {
				update_post_meta( $post_id, 'blogprise_single_post_nav_style', $post_nav_style );
			} else {
				delete_post_meta( $post_id, 'blogprise_single_post_nav_style' );
			}
		}

		// Post metas.
		if ( isset( $_POST['blogprise_override_post_metas'] ) ) {
			update_post_meta( $post_id, 'blogprise_override_post_metas', true );
			if ( isset( $_POST['blogprise_single_post_metas'] ) && ! empty( $_POST['blogprise_single_post_metas'] ) ) {
				$available_post_metas = array( 'author', 'category', 'read_time', 'date', 'comment', 'tags' );
				if ( ! array_diff( $_POST['blogprise_single_post_metas'], $available_post_metas ) ) {
					update_post_meta( $post_id, 'blogprise_single_post_metas', $_POST['blogprise_single_post_metas'] );
				}
			} else {
				delete_post_meta( $post_id, 'blogprise_single_post_metas' );
			}
		} else {
			delete_post_meta( $post_id, 'blogprise_override_post_metas' );
			delete_post_meta( $post_id, 'blogprise_single_post_metas' );
		}

		// Post Meta Icons.
		if ( isset( $_POST['blogprise_show_post_meta_icons'] ) ) {
			if ( '1' == $_POST['blogprise_show_post_meta_icons'] ) {
				update_post_meta( $post_id, 'blogprise_show_post_meta_icons', 1 );
			} elseif ( '0' == $_POST['blogprise_show_post_meta_icons'] ) {
				update_post_meta( $post_id, 'blogprise_show_post_meta_icons', 0 );
			} else {
				delete_post_meta( $post_id, 'blogprise_show_post_meta_icons' );
			}
		}

		// Category Color Display.
		if ( isset( $_POST['blogprise_cat_color_display'] ) ) {
			$valid_cat_color_options = array_keys( blogprise_get_category_color_display() );
			$cat_color_display       = sanitize_text_field( $_POST['blogprise_cat_color_display'] );
			if ( in_array( $cat_color_display, $valid_cat_color_options ) ) {
				update_post_meta( $post_id, 'blogprise_cat_color_display', $cat_color_display );
			} else {
				delete_post_meta( $post_id, 'blogprise_cat_color_display' );
			}
		}

		// Category Display Style.
		if ( isset( $_POST['blogprise_cat_style'] ) ) {
			$valid_cat_styles = array_keys( blogprise_get_category_styles() );
			$cat_style        = sanitize_text_field( $_POST['blogprise_cat_style'] );
			if ( in_array( $cat_style, $valid_cat_styles ) ) {
				update_post_meta( $post_id, 'blogprise_cat_style', $cat_style );
			} else {
				delete_post_meta( $post_id, 'blogprise_cat_style' );
			}
		}

		// Author info.
		if ( isset( $_POST['blogprise_show_author_info'] ) ) {
			if ( '1' == $_POST['blogprise_show_author_info'] ) {
				update_post_meta( $post_id, 'blogprise_show_author_info', 1 );
			} elseif ( '0' == $_POST['blogprise_show_author_info'] ) {
				update_post_meta( $post_id, 'blogprise_show_author_info', 0 );
			} else {
				delete_post_meta( $post_id, 'blogprise_show_author_info' );
			}
		}

		// Related posts.
		if ( isset( $_POST['blogprise_show_related_posts'] ) ) {
			if ( '1' == $_POST['blogprise_show_related_posts'] ) {
				update_post_meta( $post_id, 'blogprise_show_related_posts', 1 );
			} elseif ( '0' == $_POST['blogprise_show_related_posts'] ) {
				update_post_meta( $post_id, 'blogprise_show_related_posts', 0 );
			} else {
				delete_post_meta( $post_id, 'blogprise_show_related_posts' );
			}
		}

		// Author posts.
		if ( isset( $_POST['blogprise_show_author_posts'] ) ) {
			if ( '1' == $_POST['blogprise_show_author_posts'] ) {
				update_post_meta( $post_id, 'blogprise_show_author_posts', 1 );
			} elseif ( '0' == $_POST['blogprise_show_author_posts'] ) {
				update_post_meta( $post_id, 'blogprise_show_author_posts', 0 );
			} else {
				delete_post_meta( $post_id, 'blogprise_show_author_posts' );
			}
		}
	}

endif;
add_action( 'save_post', 'blogprise_save_postdata' );

if ( ! function_exists( 'blogprise_post_meta_admin_scripts' ) ) :
	/**
	 * Styles and Scripts for meta box
	 *
	 * @since 1.0.0
	 */
	function blogprise_post_meta_admin_scripts( $hook ) {
		global $post_type;

		if ( $hook != 'post-new.php' && $hook != 'post.php' ) {
			return;
		}
		if ( $post_type != 'post' && $post_type != 'page' ) {
			return;
		}

		$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		wp_enqueue_script( 'blogprise-post-meta-js', get_template_directory_uri() . '/inc/post-meta/js/script' . $min . '.js', array( 'jquery' ), _S_VERSION, true );
	}
endif;
add_action( 'admin_enqueue_scripts', 'blogprise_post_meta_admin_scripts' );
