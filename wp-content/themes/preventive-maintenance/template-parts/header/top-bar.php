<?php 
/*
* Display Top Bar
*/
?>

<div class="top-header px-lg-5">
  <div class="container-fluid">
    <div class="row">
      <div class="time-txt col-lg-4 col-md-4 align-self-center">
        <div class="timebox">
          <?php if( get_theme_mod( 'preventive_maintenance_timming') != '') { ?>
            <i class="<?php echo esc_attr(get_theme_mod('preventive_maintenance_timming_icon','fas fa-clock')); ?>"></i><span class="phone"><?php echo esc_html( get_theme_mod('preventive_maintenance_timming','')); ?></span>
           <?php } ?>
        </div>
      </div>
      <div class="col-lg-2 col-md-1"></div>
      <div class="col-lg-3 col-md-3 text-lg-end calender">
        <div class="timebox">
          <?php if( get_theme_mod( 'preventive_maintenance_calender') != '') { ?>
            <i class="<?php echo esc_attr(get_theme_mod('preventive_maintenance_calender_icon','fas fa-calendar-alt')); ?>"></i><span class="phone"><?php echo esc_html( get_theme_mod('preventive_maintenance_calender','')); ?></span>
           <?php } ?>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 text-lg-end align-self-center">
        <div class="social-media">
          <?php                 
            $preventive_maintenance_header_fb_new_tab = esc_attr(get_theme_mod('preventive_maintenance_header_fb_new_tab','true'));
            $preventive_maintenance_header_twt_new_tab = esc_attr(get_theme_mod('preventive_maintenance_header_twt_new_tab','true'));
            $preventive_maintenance_header_ins_new_tab = esc_attr(get_theme_mod('preventive_maintenance_header_ins_new_tab','true'));
            $preventive_maintenance_header_ut_new_tab = esc_attr(get_theme_mod('preventive_maintenance_header_ut_new_tab','true'));
            $preventive_maintenance_header_pint_new_tab = esc_attr(get_theme_mod('preventive_maintenance_header_pint_new_tab','true'));
            ?>
          <?php if( get_theme_mod( 'preventive_maintenance_facebook_url' ) != '') { ?>
            <a <?php if($preventive_maintenance_header_fb_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'preventive_maintenance_facebook_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('preventive_maintenance_facebook_icon','fab fa-facebook-f')); ?>"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'preventive_maintenance_twitter_url' ) != '') { ?>
            <a <?php if($preventive_maintenance_header_twt_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'preventive_maintenance_twitter_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('preventive_maintenance_twitter_icon','fab fa-twitter')); ?>"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'preventive_maintenance_instagram_url' ) != '') { ?>
            <a <?php if($preventive_maintenance_header_ins_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'preventive_maintenance_instagram_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('preventive_maintenance_instagram_icon','fab fa-instagram')); ?>"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'preventive_maintenance_youtube_url' ) != '') { ?>
            <a <?php if($preventive_maintenance_header_ut_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'preventive_maintenance_youtube_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('preventive_maintenance_youtube_icon','fab fa-youtube')); ?>"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'preventive_maintenance_pint_url' ) != '') { ?>
            <a <?php if($preventive_maintenance_header_pint_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'preventive_maintenance_pint_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('preventive_maintenance_pinterest_icon','fab fa-pinterest')); ?>"></i></a>
          <?php } ?>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>