<?php 

get_template_part( 'inc/admin-function');

//custom-style
get_template_part( 'inc/beauty-parlour-elementor-custom-style');

// theme-option
get_template_part( 'lib/texture-option/texture-option');

// customizer
get_template_part('customizer/models/class-beauty-parlour-elementor-singleton');
get_template_part('customizer/models/class-beauty-parlour-elementor-defaults-models');
get_template_part('customizer/repeater/class-beauty-parlour-elementor-repeater');

/*customizer*/

get_template_part('customizer/extend-customizer/class-beauty-parlour-elementor-wp-customize-panel');
get_template_part('customizer/extend-customizer/class-beauty-parlour-elementor-wp-customize-section');
get_template_part('customizer/customizer-radio-image/class/class-beauty-parlour-elementor-customize-control-radio-image');
get_template_part('customizer/customizer-range-value/class/class-beauty-parlour-elementor-customizer-range-value-control');

get_template_part('customizer/color/class-control-color');
get_template_part('customizer/customize-buttonset/class-control-buttonset');

get_template_part('customizer/background/class-beauty-parlour-elementor-background-image-control');

get_template_part('customizer/customizer-toggle/class-beauty-parlour-elementor-toggle-control');

get_template_part('customizer/custom-customizer');
get_template_part('customizer/customizer');

/******************************/
// woocommerce
/******************************/
get_template_part( 'inc/woocommerce/woo-core');
get_template_part( 'inc/woocommerce/woo-function');
get_template_part('inc/woocommerce/woocommerce-ajax');