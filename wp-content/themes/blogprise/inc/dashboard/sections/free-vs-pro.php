<?php
/**
 * Free v Pro
 *
 * @package Blogprise
 */

$icons = array(
	'0' => '<span class="dashicons dashicons-no"></span>',
	'1' => '<span class="dashicons dashicons-yes"></span>',
);
?>
<div class="blogprise-dashboard-body">
	<div class="free-vs-pro-wrapper">
		<div class="section-cta-upgrade">
			<span><?php esc_html_e( 'PREMIUM', 'blogprise' ); ?></span>
			<h2><?php esc_html_e( 'Unlock More with Blogprise Pro', 'blogprise' ); ?></h2>
			<p><?php esc_html_e( 'Unlock all the possibilties and true potential with premium version of this theme', 'blogprise' ); ?></p>
			<a href="<?php echo esc_url( $this->theme_url . '?utm_source=wp&utm_medium=theme-dashboard&utm_campaign=fvp' ); ?>" target="_blank" class="button button-primary button-plus"><?php esc_html_e( 'Upgrade To Pro', 'blogprise' ); ?></a>
		</div>
		<table>
			<thead>
				<tr>
					<th class="blogprise-text-left"><?php esc_html_e( 'Features', 'blogprise' ); ?></th>
					<th class="blogprise-text-center"><?php esc_html_e( 'Free', 'blogprise' ); ?></th>
					<th class="blogprise-text-center"><?php esc_html_e( 'Pro', 'blogprise' ); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$free_vs_pro = array(
					array(
						'feature' => __( 'Help and support', 'blogprise' ),
						'free'    => __( 'Standard support', 'blogprise' ),
						'pro'     => __( 'High priority support', 'blogprise' ),
					),
					array(
						'feature' => __( 'Predesigned website templates', 'blogprise' ),
						'free'    => __( '1', 'blogprise' ),
						'pro'     => __( '4', 'blogprise' ),
					),
					array(
						'feature' => __( 'Seo optimized', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Translation ready', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'RTL ready', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Post formats support', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'WooCommerce ready', 'blogprise' ),
						'free'    => 1,
						'pro'     => __( 'With more options', 'blogprise' ),
					),
					array(
						'feature' => __( 'Preloader option', 'blogprise' ),
						'free'    => 1,
						'pro'     => __( '20+ Preloaders', 'blogprise' ),
					),
					array(
						'feature' => __( 'Progressbar option', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Typography font option', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Typography color option', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Primary menu font option', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Primary menu responisve font sizes', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Sub menu font option', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Sub menu responisve font sizes', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Headings font option', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'H1 - H6 color options', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'H1 - H6 responisve font sizes', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Body font option', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Body responisve font sizes', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Primary color option', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Menu color option', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Sub-menu color option', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage ticker posts', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Multiple ticker labels', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Multiple ticker styles', 'blogprise' ),
						'free'    => 0,
						'pro'     => __( '5+', 'blogprise' ),
					),
					array(
						'feature' => __( 'Homepage banner slider option', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Banner slider multiple style', 'blogprise' ),
						'free'    => 0,
						'pro'     => __( '4', 'blogprise' ),
					),
					array(
						'feature' => __( 'Homepage banner thumbnail option', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage banner thumbnail style', 'blogprise' ),
						'free'    => 0,
						'pro'     => __( '2', 'blogprise' ),
					),
					array(
						'feature' => __( 'Homepage banner carousel option', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Banner carousel multiple style', 'blogprise' ),
						'free'    => 0,
						'pro'     => __( '4', 'blogprise' ),
					),
					array(
						'feature' => __( 'Homepage pinned posts', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage banner section visibility options', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage banner section dimensions', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage banner section dividers', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage trending posts', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage trending post style', 'blogprise' ),
						'free'    => __( '1', 'blogprise' ),
						'pro'     => __( '2', 'blogprise' ),
					),
					array(
						'feature' => __( 'Homepage trending post visibility options', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage trending post section dimensions', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage trending post section dividers', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage layout option', 'blogprise' ),
						'free'    => 1,
						'pro'     => __( 'With more options', 'blogprise' ),
					),
					array(
						'feature' => __( 'Homepage custom sidebar', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Darkmode option', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Topbar option', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Topbar color option', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Header style', 'blogprise' ),
						'free'    => __( '3', 'blogprise' ),
						'pro'     => __( '5', 'blogprise' ),
					),
					array(
						'feature' => __( 'Header ad banner', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Sticky header', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Sticky header on scroll up', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Header section dimensions', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Menu Bar option', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
				
					array(
						'feature' => __( 'Sticky sidebar', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Offcanvas', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Offcanvas light/dark theme', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Offcanvas logo', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Offcanvas widgets title style', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Archive style', 'blogprise' ),
						'free'    => __( '4', 'blogprise' ),
						'pro'     => __( '9', 'blogprise' ),
					),
					array(
						'feature' => __( 'Archive post metas', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Ajax load posts on click', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Infinite scroll load posts', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Related posts', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Floating related posts', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Author posts', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Author info box', 'blogprise' ),
						'free'    => 1,
						'pro'     => __( 'With social links option', 'blogprise' ),
					),
					array(
						'feature' => __( 'Integrated social share option', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Single posts social share position', 'blogprise' ),
						'free'    => 0,
						'pro'     =>  __( '8+', 'blogprise' ),
					),
					array(
						'feature' => __( 'Page layout option', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Category image option', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Category color option', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Category banner image option', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Category different pagination', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Category post metas option', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Different design style for each category', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Different design style for each tags', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Tags different pagination', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Tags post metas option', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Custom widgets', 'blogprise' ),
						'free'    => __( '16+', 'blogprise' ),
						'pro'     => __( '22+', 'blogprise' ),
					),
					array(
						'feature' => __( 'Widgets title style & align options', 'blogprise' ),
						'free'    =>  __( '10+', 'blogprise' ),
						'pro'     =>  __( '20+', 'blogprise' ),
					),
					array(
						'feature' => __( 'Widgetareas', 'blogprise' ),
						'free'    =>  __( '12+', 'blogprise' ),
						'pro'     =>  __( '12+', 'blogprise' ),
					),
					array(
						'feature' => __( 'Widgetareas visibility options', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Widgetareas dimension options', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Widgetareas dividers', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Single post layout', 'blogprise' ),
						'free'    =>  __( '3', 'blogprise' ),
						'pro'     =>  __( '6', 'blogprise' ),
					),
					array(
						'feature' => __( 'Single post navigation style', 'blogprise' ),
						'free'    => __( '3', 'blogprise' ),
						'pro'     => __( '5', 'blogprise' ),
					),
					array(
						'feature' => __( 'Post primary category option', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Post subtitle option', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Extended gallery format support', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Extended video format support', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Extended audio format support', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( '404 page options', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Footer layouts', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Footer widgets title style & align options', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Footer light/dark theme', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Hide theme credit link', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Sub footer', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Sub footer light/dark theme', 'blogprise' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Sub footer multiple layout', 'blogprise' ),
						'free'    => 0,
						'pro'     => __( '2', 'blogprise' ),
					),
					array(
						'feature' => __( 'Sub footer logo', 'blogprise' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Scroll to top', 'blogprise' ),
						'free'    => 1,
						'pro'     => __( 'With more options', 'blogprise' ),
					),
				);
				foreach ( $free_vs_pro as $features ) :
					?>
					<tr>
						<td class="blogprise-text-left"><?php echo esc_html( $features['feature'] ); ?></td>
						<td class="blogprise-text-center">
							<?php
							if ( 1 === $features['free'] ) {
								echo $icons[1];
							} elseif ( 0 === $features['free'] ) {
								echo $icons[0];
							} else {
								echo esc_html( $features['free'] );
							}
							?>
						</td>
						<td class="blogprise-text-center">
							<?php
							if ( 1 === $features['pro'] ) {
								echo $icons[1];
							} elseif ( 0 === $features['pro'] ) {
								echo $icons[0];
							} else {
								echo esc_html( $features['pro'] );
							}
							?>
						</td>
					</tr>
					<?php
				endforeach;
				?>
			</tbody>
		</table>
		<div class="free-vs-pro-footer">
			<a href="<?php echo esc_url( $this->theme_url . '?utm_source=wp&utm_medium=theme-dashboard&utm_campaign=fvp' ); ?>" target="_blank"><?php esc_html_e( 'And many more features', 'blogprise' ); ?><span class="dashicons dashicons-external"></span></a>
		</div>
	</div>
</div>
