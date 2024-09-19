<?php
/**
 * Displays progressbar
 *
 * @package Blogprise
 */

$progressbar_position = get_theme_mod( 'progressbar_position', 'top' );
?>
<div id="blogprise-progress-bar" class="<?php echo esc_attr( $progressbar_position ); ?>"></div>