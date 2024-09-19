<?php
/**
 * Displays the site navigation.
 *
 * @package Blogprise
 */

$class     = blogprise_get_sticky_menu();
$class    .= blogprise_get_sub_menu_style();

$border_class = blogprise_get_menu_bar_border();
?>
<div class="site-header-row-wrapper blogprise-primary-bar-row<?php echo esc_attr( $class ); ?>">
	<div class="primary-bar-row-wrapper">
		<div class="uf-wrapper">
			<div class="blogprise-primary-bar-wrapper <?php echo esc_attr( $border_class ); ?>">

				<?php do_action( 'blogprise_primary_nav_items' ); ?>

				<div class="secondary-navigation blogprise-secondary-nav">
					<?php do_action( 'blogprise_secondary_nav_items' ); ?>
				</div>

			</div>
		</div>
	</div>
</div>