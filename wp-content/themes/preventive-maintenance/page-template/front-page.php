<?php
/**
 * Template Name: Custom Home Page
 *
 * @package Preventive Maintenance
 * @subpackage preventive_maintenance
 */

get_header(); ?>

<main id="tp_content" role="main">
	<?php do_action( 'preventive_maintenance_before_slider' ); ?>

	<?php get_template_part( 'template-parts/home/slider' ); ?>
	<?php do_action( 'preventive_maintenance_after_slider' ); ?>

	<?php get_template_part( 'template-parts/home/about' ); ?>
	<?php do_action( 'preventive_maintenance_after_about' ); ?>

	<?php get_template_part( 'template-parts/home/home-content' ); ?>
	<?php do_action( 'preventive_maintenance_after_home_content' ); ?>
</main>

<?php get_footer();