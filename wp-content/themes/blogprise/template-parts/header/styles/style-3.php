<?php

if ( get_theme_mod( 'enable_top_bar' ) ) :
	get_template_part( 'template-parts/header/top-bar' );
endif;

$class  = blogprise_get_sticky_menu();
$class .= blogprise_get_sub_menu_style();

$border_class = blogprise_get_menu_bar_border();
?>
<div class="site-header-row-wrapper blogprise-primary-bar-row<?php echo esc_attr( $class ); ?>">
	<div class="primary-bar-row-wrapper">
		<div class="uf-wrapper">
			<div class="blogprise-primary-bar-wrapper <?php echo esc_attr( $border_class ); ?>">
				<div class="saga-items items-left">
					<?php
					blogprise_primary_bar_offcanvas();
					blogprise_primary_bar_menu();
					?>
				</div>
				<div class="saga-items items-center centered has-text-align-center">
					<?php get_template_part( 'template-parts/header/site-branding' );?>
				</div>
				<div class="saga-items items-right">
					<div class="secondary-navigation blogprise-secondary-nav">
					<?php do_action( 'blogprise_secondary_nav_items' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>