<?php
/**
 * Displays header site branding
 *
 * @package Blogprise
 */

$blog_info     = get_bloginfo( 'name' );
$description   = get_bloginfo( 'description', 'display' );
$hide_title    = get_theme_mod( 'hide_title' );
$hide_tagline  = get_theme_mod( 'hide_tagline' );
$header_class  = $hide_title ? 'screen-reader-text' : 'site-title';
$tagline_style = get_theme_mod( 'site_tagline_style', 'style_3' );
?>

<div class="site-branding">

	<?php
	if ( has_custom_logo() ) {
		?>
		<div class="site-logo">
			<?php the_custom_logo(); ?>
		</div>
		<?php
	}
	if ( $blog_info ) {
		?>
		<h1 class="<?php echo esc_attr( $header_class ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a></h1>
		<?php
	}
	?>

	<?php if ( $description && ! $hide_tagline ) : ?>
		<div class="site-description <?php echo esc_attr( $tagline_style ); ?>">
			<span><?php echo $description; // phpcs:ignore WordPress.Security.EscapeOutput ?></span>
		</div>
	<?php endif; ?>
</div><!-- .site-branding -->
