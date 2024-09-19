<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blogprise
 */

$class = 'blogprise-card-box';

// Use custom query if available.
global $wp_query;
$custom_archive_query = isset( $archive_query ) ? $archive_query : $wp_query;
while ( $custom_archive_query->have_posts() ) :
	$custom_archive_query->the_post();
	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>

		<div class="blogprise-article-block-wrapper">

			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<?php if ( 'post' === get_post_type() ) : ?>
					<ul class="blogprise-entry-meta">
						<li class="blogprise-meta post-author">
							<span class="meta-text">
								<?php
									printf(
										/* translators: %s: Author name. */
										__( 'By %s', 'blogprise' ),
										'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author_meta( 'display_name' ) ) . '</a>'
									);
								?>
							</span>
						</li>
						<li class="blogprise-meta post-date">
							<span class="meta-text">
								<?php echo esc_html( get_the_date() ); ?>
							</span>
						</li>
					</ul>
				<?php endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-summary">
				<?php blogprise_the_archive_excerpt(); ?>
			</div><!-- .entry-summary -->
			
		</div>

	</article><!-- #post-<?php the_ID(); ?> -->

<?php
endwhile;
wp_reset_postdata();
