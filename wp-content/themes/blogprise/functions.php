<?php
/**
 * Blogprise functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blogprise
 */

$theme_version = wp_get_theme()->get( 'Version' );
if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', $theme_version );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blogprise_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Blogprise, use a find and replace
		* to change 'blogprise' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'blogprise', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	/**
		 * Add post-formats support.
		 */
	add_theme_support(
		'post-formats',
		array(
			'gallery',
			'video',
			'audio',
		)
	);

	register_nav_menus(
		array(
			'top-menu'     => esc_html__( 'Top Menu', 'blogprise' ),
			'primary-menu' => esc_html__( 'Primary Menu', 'blogprise' ),
			'social-menu'  => esc_html__( 'Social Menu', 'blogprise' ),
			'footer-menu'  => esc_html__( 'Footer Menu', 'blogprise' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'blogprise_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'               => 100,
			'width'                => 350,
			'flex-width'           => true,
			'flex-height'          => true,
			'unlink-homepage-logo' => false,
		)
	);

	add_image_size( 'blogprise-cover-image', 1280, 720, true );
	add_image_size( 'blogprise-large-img', 800, 450, true );
	add_image_size( 'blogprise-medium-img', 750, 575, true );
	add_image_size( 'blogprise-square-img', 500, 500, true );

	// Theme supports wide images, galleries and videos.
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles' );
}
add_action( 'after_setup_theme', 'blogprise_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blogprise_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'blogprise_content_width', 640 );
}
add_action( 'after_setup_theme', 'blogprise_content_width', 0 );

/**
 * Get font url
 */
if ( ! function_exists( 'blogprise_font_url' ) ) :
	/**
	 * Return google font URL.
	 *
	 * @since 1.0.0
	 * @return string Font URL.
	 */
	function blogprise_font_url() {

		$font_url = '';
		$fonts    = $fonts_name = array();

		$primary_font      = get_theme_mod( 'primary_font', '"Montserrat", "100:200:300:regular:500:600:700:800:900:100italic:200italic:300italic:italic:500italic:600italic:700italic:800italic:900italic", sans-serif' );
		$primary_menu_font = get_theme_mod( 'primary_menu_font', '"Montserrat", "100:200:300:regular:500:600:700:800:900:100italic:200italic:300italic:italic:500italic:600italic:700italic:800italic:900italic", sans-serif' );
		$sub_menu_font     = get_theme_mod( 'sub_menu_font', '"Montserrat", "100:200:300:regular:500:600:700:800:900:100italic:200italic:300italic:italic:500italic:600italic:700italic:800italic:900italic", sans-serif' );
		$secondary_font    = get_theme_mod( 'secondary_font', '"Lato", "100:100italic:300:300italic:regular:italic:700:700italic:900:900italic", sans-serif' );

		$fonts[] = $primary_font;
		$fonts[] = $primary_menu_font;
		$fonts[] = $sub_menu_font;
		$fonts[] = $secondary_font;

		foreach ( $fonts as $font ) {
			$font_family         = str_replace( '"', '', $font );
			$font_family_explode = explode( ', ', $font_family );
			$fonts_name[]        = isset( $font_family_explode[0] ) ? $font_family_explode[0] : '';
		}

		// Check for same fonts
		$fonts_name = array_unique( $fonts_name );

		$font_final_string = implode( ':300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic|', $fonts_name );

		if ( 'off' !== _x( 'on', 'Google font: on or off', 'blogprise' ) ) {
			$font_url = add_query_arg(
				array(
					'family'  => urlencode( $font_final_string . ':300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,cyrillic-ext,greek,greek-ext,latin-ext' ),
					'display' => 'swap',
				),
				'https://fonts.googleapis.com/css'
			);
		}

		return $font_url;
	}
endif;

/**
 * Enqueue scripts and styles.
 */
function blogprise_scripts() {

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	// Font Loader.
	require_once get_theme_file_path( 'lib/font-loader/wptt-webfont-loader.php' );

	// Styles.
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/lib/swiper/swiper-bundle' . $min . '.css' );
	if ( is_child_theme() ) {
		wp_enqueue_style( 'blogprise-parent-style', trailingslashit( get_template_directory_uri() ) . 'style.css' );
	}
	wp_enqueue_style( 'blogprise-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'blogprise-style', 'rtl', 'replace' );
	wp_add_inline_style( 'blogprise-style', blogprise_get_inline_css() );

	// Fonts.
	$font_url = blogprise_font_url();
	if ( ! empty( $font_url ) ) {
		wp_enqueue_style( 'blogprise-google-fonts', wptt_get_webfont_url( $font_url ), array(), null );
	}

	// Scripts
	$dependencies = array( 'swiper' );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/lib/swiper/swiper-bundle' . $min . '.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'blogprise-script', get_template_directory_uri() . '/assets/custom/js/script' . $min . '.js', $dependencies, _S_VERSION, true );

	// Localized variables.
	global $wp_query;
	wp_localize_script(
		'blogprise-script',
		'BlogpriseVars',
		array(
			'load_post_nonce' => wp_create_nonce( 'blogprise-load-posts-nonce' ),
			'ajaxurl'         => admin_url( 'admin-ajax.php' ),
			'query_vars'      => wp_json_encode( $wp_query->query_vars ),
		)
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blogprise_scripts' );

// Admin scripts and styles.
function blogprise_admin_scripts() {

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_style( 'blogprise-admin-style', get_template_directory_uri() . '/assets/custom/css/admin' . $min . '.css', false, _S_VERSION );
}
add_action( 'admin_enqueue_scripts', 'blogprise_admin_scripts' );

/**
 * Load all required files.
 */
require get_template_directory() . '/inc/init.php';