<?php
/**
 * Template part for displaying slider section
 *
 * @package Preventive Maintenance
 * @subpackage preventive_maintenance
 */

?>
<?php $preventive_maintenance_static_image = get_stylesheet_directory_uri() . '/assets/images/sliderimage.png'; ?>
<?php if( get_theme_mod( 'preventive_maintenance_slider_arrows') != '') { ?>

<section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <?php $preventive_maintenance_slide_pages = array();
      for ( $preventive_maintenance_count = 1; $preventive_maintenance_count <= 4; $preventive_maintenance_count++ ) {
        $preventive_maintenance_mod = intval( get_theme_mod( 'preventive_maintenance_slider_page' . $preventive_maintenance_count ));
        if ( 'page-none-selected' != $preventive_maintenance_mod ) {
          $preventive_maintenance_slide_pages[] = $preventive_maintenance_mod;
        }
      }
      if( !empty($preventive_maintenance_slide_pages) ) :
        $preventive_maintenance_args = array(
          'post_type' => 'page',
          'post__in' => $preventive_maintenance_slide_pages,
          'orderby' => 'post__in'
        );
        $preventive_maintenance_query = new WP_Query( $preventive_maintenance_args );
        if ( $preventive_maintenance_query->have_posts() ) :
          $i = 1;
    ?>
    <div class="carousel-inner" role="listbox">
      <?php  while ( $preventive_maintenance_query->have_posts() ) : $preventive_maintenance_query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <?php if(has_post_thumbnail()){ ?>
            <img src="<?php the_post_thumbnail_url('full'); ?>"/> <?php 
          }else { ?>
            <img src="<?php echo esc_url($preventive_maintenance_static_image); ?>">
          <?php } ?>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <?php if( get_theme_mod( 'preventive_maintenance_slider_short_heading' ) != '' ) { ?>
                <p class="slider-top"><?php echo esc_html( get_theme_mod( 'preventive_maintenance_slider_short_heading','' ) ); ?></p>
              <?php } ?>
              <h1 class="mt-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
              <p><?php echo wp_trim_words( get_the_content(),20 );?></p>
              <div class="more-btn">
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('LEARN MORE','preventive-maintenance'); ?></a>
              </div>
            </div>
          </div>
        </div>
      <?php $i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
    endif;?>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-angle-left"></i></span>
      <span class="screen-reader-text"><?php esc_html_e('Previous','preventive-maintenance'); ?></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-angle-right"></i></span>
      <span class="screen-reader-text"><?php esc_html_e('Next','preventive-maintenance'); ?></span>
    </a>
  </div>
  <div class="clearfix"></div>
</section>

<?php } ?>
