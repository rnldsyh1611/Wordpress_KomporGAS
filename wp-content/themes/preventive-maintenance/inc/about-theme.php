<?php
/**
 * Preventive Maintenance Theme Page
 *
 * @package Preventive Maintenance
 */

function preventive_maintenance_admin_scripts() {
	wp_dequeue_script('preventive-maintenance-custom-scripts');
}
add_action( 'admin_enqueue_scripts', 'preventive_maintenance_admin_scripts' );

if ( ! defined( 'PREVENTIVE_MAINTENANCE_FREE_THEME_URL' ) ) {
	define( 'PREVENTIVE_MAINTENANCE_FREE_THEME_URL', 'https://www.themespride.com/products/free-maintenance-wordpress-theme' );
}
if ( ! defined( 'PREVENTIVE_MAINTENANCE_PRO_THEME_URL' ) ) {
	define( 'PREVENTIVE_MAINTENANCE_PRO_THEME_URL', 'https://www.themespride.com/products/maintenance-wordpress-theme' );
}
if ( ! defined( 'PREVENTIVE_MAINTENANCE_DEMO_THEME_URL' ) ) {
	define( 'PREVENTIVE_MAINTENANCE_DEMO_THEME_URL', 'https://page.themespride.com/preventive-maintenance-pro/' );
}
if ( ! defined( 'PREVENTIVE_MAINTENANCE_DOCS_THEME_URL' ) ) {
    define( 'PREVENTIVE_MAINTENANCE_DOCS_THEME_URL', 'https://page.themespride.com/demo/docs/preventive-maintenance/' );
}
if ( ! defined( 'PREVENTIVE_MAINTENANCE_RATE_THEME_URL' ) ) {
    define( 'PREVENTIVE_MAINTENANCE_RATE_THEME_URL', 'https://wordpress.org/support/theme/preventive-maintenance/reviews/#new-post' );
}
if ( ! defined( 'PREVENTIVE_MAINTENANCE_CHANGELOG_THEME_URL' ) ) {
    define( 'PREVENTIVE_MAINTENANCE_CHANGELOG_THEME_URL', get_template_directory() . '/readme.txt' );
}
if ( ! defined( 'PREVENTIVE_MAINTENANCE_SUPPORT_THEME_URL' ) ) {
    define( 'PREVENTIVE_MAINTENANCE_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/preventive-maintenance/' );
}
if ( ! defined( 'PREVENTIVE_MAINTENANCE_THEME_BUNDLE' ) ) {
    define( 'PREVENTIVE_MAINTENANCE_THEME_BUNDLE', 'https://www.themespride.com/products/wordpress-theme-bundle' );
}

/**
 * Add theme page
 */
function preventive_maintenance_menu() {
	add_theme_page( esc_html__( 'About Theme', 'preventive-maintenance' ), esc_html__( 'About Theme', 'preventive-maintenance' ), 'edit_theme_options', 'preventive-maintenance-about', 'preventive_maintenance_about_display' );
}
add_action( 'admin_menu', 'preventive_maintenance_menu' );

/**
 * Display About page
 */
function preventive_maintenance_about_display() {
	$preventive_maintenance_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">
		<h1><?php echo esc_html( $preventive_maintenance_theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text">
					<?php
					// Remove last sentence of description.
					$preventive_maintenance_description = explode( '. ', $preventive_maintenance_theme->get( 'Description' ) );

					array_pop( $preventive_maintenance_description );

					$preventive_maintenance_description = implode( '. ', $preventive_maintenance_description );

					echo esc_html( $preventive_maintenance_description . '.' );
				?></p>
				<p class="actions">
					<a target="_blank" href="<?php echo esc_url( PREVENTIVE_MAINTENANCE_FREE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'preventive-maintenance' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( PREVENTIVE_MAINTENANCE_DEMO_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'preventive-maintenance' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( PREVENTIVE_MAINTENANCE_DOCS_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'preventive-maintenance' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( PREVENTIVE_MAINTENANCE_RATE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Rate this theme', 'preventive-maintenance' ); ?></a>

					<a target="_blank" href="<?php echo esc_url( PREVENTIVE_MAINTENANCE_PRO_THEME_URL ); ?>" class="green button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'preventive-maintenance' ); ?></a>
				</p>
			</div>

			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $preventive_maintenance_theme->get_screenshot() ); ?>" />
			</div>

		</div>

		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'preventive-maintenance' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'preventive-maintenance-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'preventive-maintenance-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'preventive-maintenance' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'preventive-maintenance-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'preventive-maintenance' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'preventive-maintenance-about', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Changelog', 'preventive-maintenance' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'preventive-maintenance-about', 'tab' => 'get_bundle' ), 'themes.php' ) ) ); ?>" class="blink wp-bundle nav-tab<?php echo ( isset( $_GET['tab'] ) && 'get_bundle' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Get WordPress Theme Bundle', 'preventive-maintenance' ); ?></a>
		</nav>

		<?php
			preventive_maintenance_main_screen();

			preventive_maintenance_changelog_screen();

			preventive_maintenance_free_vs_pro();

			preventive_maintenance_get_bundle();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'preventive-maintenance' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'preventive-maintenance' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'preventive-maintenance' ) : esc_html_e( 'Go to Dashboard', 'preventive-maintenance' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function preventive_maintenance_main_screen() {
	if ( isset( $_GET['page'] ) && 'preventive-maintenance-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="feature-section two-col">
			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'preventive-maintenance' ); ?></h2>
				<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'preventive-maintenance' ) ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'preventive-maintenance' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'preventive-maintenance' ); ?></h2>
				<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'preventive-maintenance' ) ?></p>
				<p><a target="_blank" href="<?php echo esc_url( PREVENTIVE_MAINTENANCE_SUPPORT_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'preventive-maintenance' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Upgrade To Premium With Straight 20% OFF.', 'preventive-maintenance' ); ?></h2>
				<p><?php esc_html_e( 'Get our amazing WordPress theme with exclusive 20% off use the coupon', 'preventive-maintenance' ) ?>"<input type="text" value="GETPro20" id="myInput">".</p>
				<button class="button button-primary"><?php esc_html_e( 'GETPro20', 'preventive-maintenance' ); ?></button>
			</div>
		</div>
	<?php
	}
}

/**
 * Output the changelog screen.
 */
function preventive_maintenance_changelog_screen() {
	if ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) {
		global $wp_filesystem;
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View changelog below:', 'preventive-maintenance' ); ?></p>

			<?php
				$changelog_file = apply_filters( 'preventive_maintenance_changelog_file', PREVENTIVE_MAINTENANCE_CHANGELOG_THEME_URL );
				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = preventive_maintenance_parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
	<?php
	}
}

/**
 * Parse changelog from readme file.
 * @param  string $content
 * @return string
 */
function preventive_maintenance_parse_changelog( $content ) {
	// Explode content with ==  to juse separate main content to array of headings.
	$content = explode ( '== ', $content );

	$changelog_isolated = '';

	// Get element with 'Changelog ==' as starting string, i.e isolate changelog.
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}

	// Now Explode $changelog_isolated to manupulate it to add html elements.
	$changelog_array = explode( '= ', $changelog_isolated );

	// Unset first element as it is empty.
	unset( $changelog_array[0] );

	$changelog = '<pre class="changelog">';

	foreach ( $changelog_array as $value) {
		// Replace all enter (\n) elements with </span><span> , opening and closing span will be added in next process.
		$value = preg_replace( '/\n+/', '</span><span>', $value );

		// Add openinf and closing div and span, only first span element will have heading class.
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div>';

		// Remove empty <span></span> element which newr formed at the end.
		$changelog .= str_replace( '<span></span>', '', $value );
	}

	$changelog .= '</pre>';

	return wp_kses_post( $changelog );
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function preventive_maintenance_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'preventive-maintenance' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'preventive-maintenance' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'preventive-maintenance' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'Theme Demo Set Up', 'preventive-maintenance' ); ?></span></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Templates, Color options and Fonts', 'preventive-maintenance' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Included Demo Content', 'preventive-maintenance' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Section Ordering', 'preventive-maintenance' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Multiple Sections', 'preventive-maintenance' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Plugins', 'preventive-maintenance' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Premium Technical Support', 'preventive-maintenance' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access to Support Forums', 'preventive-maintenance' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Free updates', 'preventive-maintenance' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Unlimited Domains', 'preventive-maintenance' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Responsive Design', 'preventive-maintenance' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Live Customizer', 'preventive-maintenance' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a  href="<?php echo esc_url( PREVENTIVE_MAINTENANCE_PRO_THEME_URL ); ?>" target="_blank"><?php esc_html_e( 'Go For Premium', 'preventive-maintenance' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}
}

function preventive_maintenance_get_bundle() {
	if ( isset( $_GET['tab'] ) && 'get_bundle' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'Get WordPress Theme Bundle', 'preventive-maintenance' ); ?></p>
			<div class="col card">
				<h2 class="title"><?php esc_html_e( ' WordPress Theme Bundle of 65+ Themes At 15% Discount. ', 'preventive-maintenance' ); ?></h2>
				<p><?php esc_html_e( 'Spring Offer Is To Get WP Bundle of 65+ Themes At 15% Discount use the coupon', 'preventive-maintenance' ) ?>"<input type="text" value=" TPRIDE15 "  id="myInput">".</p>
				<p><a target="_blank" href="<?php echo esc_url( PREVENTIVE_MAINTENANCE_THEME_BUNDLE ); ?>" class="button button-primary"><?php esc_html_e( 'Theme Bundle', 'preventive-maintenance' ); ?></a></p>
			</div>
		</div>
	<?php
	}
}
