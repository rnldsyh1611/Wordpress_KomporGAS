<?php
/**
 * Template part for displaying about section
 *
 * @package Preventive Maintenance
 * @subpackage preventive_maintenance
 */

?>

<?php $preventive_maintenance_static_image = get_stylesheet_directory_uri() . '/assets/images/sliderimage.png'; ?>

<?php if( get_theme_mod( 'preventive_maintenance_about_show_hide') != '') { ?>
<section id="about">
  <div class="container">
    <div class="row">
      <?php $preventive_maintenance_about_page = array();
        $preventive_maintenance_mod = absint( get_theme_mod( 'preventive_maintenance_about_page' ));
        if ( 'page-none-selected' != $preventive_maintenance_mod ) {
          $preventive_maintenance_about_page[] = $preventive_maintenance_mod;
        }
      if( !empty($preventive_maintenance_about_page) ) :
        $preventive_maintenance_args = array(
          'post_type' => 'page',
          'post__in' => $preventive_maintenance_about_page,
          'orderby' => 'post__in'
        );
        $preventive_maintenance_query = new WP_Query( $preventive_maintenance_args );
        if ( $preventive_maintenance_query->have_posts() ) :
          while ( $preventive_maintenance_query->have_posts() ) : $preventive_maintenance_query->the_post(); ?>
            <div class="col-lg-5 col-md-6 align-self-center position-relative">
              <?php if(has_post_thumbnail()){ ?>
                <img src="<?php the_post_thumbnail_url('full'); ?>"/> <?php 
              }else { ?>
                <img src="<?php echo esc_url($preventive_maintenance_static_image); ?>">
          <?php } ?>
               <?php if( get_theme_mod( 'preventive_maintenance_about_us_exp_no' ) != '' || get_theme_mod( 'preventive_maintenance_about_us_exp_text' ) != '') { ?>
                  <div class="media align-items-center">
                    <div class="row">
                      <?php if( get_theme_mod( 'preventive_maintenance_about_us_exp_no',true) != '') { ?>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-4 px-0 align-self-center">
                          <div class="exp-no"><?php echo esc_html(get_theme_mod('preventive_maintenance_about_us_exp_no')); ?></div>
                        </div>
                      <?php } ?>
                      <div class="media-body col-lg-9 col-md-9 col-sm-9 col-8 align-self-center">
                        <?php if( get_theme_mod( 'preventive_maintenance_about_us_exp_text',true) != '') { ?>
                          <span class="exp-text"><?php echo esc_html(get_theme_mod('preventive_maintenance_about_us_exp_text')); ?></span>
                        <?php }?>
                      </div>
                    </div>
                  </div>
                <?php } ?>
            </div>
            <div class="col-lg-7 col-md-6 about-box align-self-center">
              <?php if( get_theme_mod('preventive_maintenance_about_short_heading') != ''){ ?>
                <span class="short-box"></span>
                <p class="abt-title"><?php echo esc_html(get_theme_mod('preventive_maintenance_about_short_heading','')); ?></p>
              <?php }?>
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <p><?php echo wp_trim_words( get_the_content(),20 );?></p>
              <?php if( get_theme_mod('preventive_maintenance_about_sub_heading') != ''){ ?>
                <p><?php echo esc_html(get_theme_mod('preventive_maintenance_about_sub_heading','')); ?></p>
              <?php }?>
              <div class="row">
                <?php $preventive_maintenance_about_point = get_theme_mod('preventive_maintenance_about_points','');
                for ( $preventive_maintenance_m = 1; $preventive_maintenance_m <= $preventive_maintenance_about_point; $preventive_maintenance_m++ ){ ?>
                  <div class="col-lg-6 col-md-6">
                    <?php if(get_theme_mod('preventive_maintenance_about_points_text'.$preventive_maintenance_m,'') != ''){ ?>
                    <p><i class="fas fa-check me-2"></i><?php echo esc_html(get_theme_mod('preventive_maintenance_about_points_text'.$preventive_maintenance_m,'')); ?></p>
                  <?php } ?>
                  </div>
              <?php } ?>
              </div>
           <div class="more-btn">
              <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','preventive-maintenance'); ?></a>
            </div> 
            </div>
          <?php endwhile; ?>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
      endif;
      wp_reset_postdata()?>
      <div class="clearfix"></div>
    </div>
  </div>
</section>
 <?php } ?>